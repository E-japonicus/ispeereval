<?php
// グループ情報の取得
$groupid = groups_get_user_groups($course->id, $userid)[0][0];
$group_menbers_sql =
'SELECT PR.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username FROM
(SELECT userid, PE.user_id as entry_user_id, rubric_1, rubric_2, rubric_3, comment  FROM (SELECT * FROM {groups_members} WHERE groupid = ?) UG LEFT OUTER JOIN 
(SELECT * FROM {ispeereval_rubrics} WHERE user_id = ? AND ispeereval_id = ?) PE ON UG.userid = PE.peer_id) PR
INNER JOIN {user} ON {user}.id = PR.userid WHERE NOT EXISTS (SELECT * FROM {user} WHERE PR.userid = ?)';
$group_menbers_records= $DB->get_records_sql($group_menbers_sql, array($groupid, $USER->id, $ispeereval->id, $USER->id));
// // グループ情報の取得
// $groupid = groups_get_user_groups($course->id, $userid)[0][0];
// $group_menbers_sql =
// 'SELECT PR.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username FROM
// (SELECT userid, PE.user_id as entry_user_id, rubric_1, rubric_2, rubric_3, comment  FROM (SELECT * FROM {groups_members} WHERE groupid = ?) UG LEFT OUTER JOIN 
// (SELECT * FROM {ispeereval_rubrics} WHERE user_id = ? AND ispeereval_id = ?) PE ON UG.userid = PE.peer_id) PR
// INNER JOIN {user} ON {user}.id = PR.userid';
// $group_menbers_records= $DB->get_records_sql($group_menbers_sql, array($groupid, $USER->id, $ispeereval->id));

// グループがない場合コース内のユーザー情報を取得
if (!isset($groupid)) {
    $group_menbers_sql = 
    'SELECT DISTINCT {user}.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username FROM 
    (SELECT ROLE.userid FROM (SELECT userid FROM {role_assignments} WHERE contextid = ? AND roleid = 
    (SELECT id FROM {role} WHERE shortname = "student")) ROLE INNER JOIN 
    (SELECT userid FROM {user_enrolments} WHERE enrolid = 
    (SELECT id FROM {enrol} WHERE enrol = "manual" AND courseid = ?)) ENROL ON ROLE.userid = ENROL.userid) USER INNER JOIN {user} ON USER.userid = {user}.id';
    $group_menbers_records = $DB->get_records_sql($group_menbers_sql, array($context->id, $course->id));
}

// 自分が登録した評価
// $you_entry_records = $DB->get_records('ispeereval_rubrics', $composite_key);
$you_entry_records_sql = 'SELECT A.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username
                            from (SELECT * from {ispeereval_rubrics} WHERE ispeereval_id = ? AND user_id = ?) A
                            inner join {user} on A.peer_id = {user}.id';
$you_entry_records = $DB->get_records_sql($you_entry_records_sql, array($ispeereval->id, $USER->id));
?>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>

<?php if (isset($groupid)) :?>
<h1>グループメンバーの評価を登録してください</h1>
<table class="table table-bordered">
	<tbody>
		<tr>
			<th>グループメンバー</th>
			<th>登録した評価の確認</th>
		</tr>
        <?php foreach ($group_menbers_records as $group_menbers_record) :?>
        <tr>
            <td>
                <?php echo $group_menbers_record->name ?>
            </td>
            <?php if (isset($group_menbers_record->entry_user_id)) :?>
            <td><a href="#entry_records">登録した評価を確認する</a></td>
            <?php else:?>
            <td>未登録</td>
            <?php endif;?>
            
        </tr>
        <?php endforeach; ?>
	</tbody>
</table>
<?php endif;?>

<div>
<h1>評価の登録</h1>
<form action="" method="post" name="peereval_rubrics">
    <table class="table table-bordered table-checked" style="height:200px;">
        <tbody>
            <tr>
                <th style="text-align:center" colspan="2">評価する相手</th>     
                <td colspan="4" style="background-color: white;">
                    <select name="peer_id">
                        <option value="default" selected>評価する相手の名前を選択してください</option>
                    <?php foreach ($group_menbers_records as $group_menbers_record) :?>
                        <option value="<?php echo $group_menbers_record->userid ?>"><?php echo $group_menbers_record->name ?></option>
                    <?php endforeach;?>
                    </select>
                </td>       
            </tr>
            <tr>
                <th style="text-align:center" rowspan="2" colspan="2" width="15%">規準</th>
                <th style="text-align:center" colspan="4">基準</th>
            </tr>
            <tr>
                <th style="text-align:center" width="15%">レベル０</th>
                <th style="text-align:center" width="15%">レベル１</th>
                <th style="text-align:center" width="15%">レベル２</th>
                <th style="text-align:center" width="15%">レベル３</th>
            </tr>
            <?php for ($i=1; $i <= 3 ; $i++): ?>
                <tr height="150">
                    <th width="2%">
                        <?php echo $i ?>
                    </th>
                    <th>
                        <?php echo get_string("rubric[{$i}]", 'ispeereval')?>
                    </th>
                    <?php for ($j=0; $j < 4; $j++) :?>
                        <?php if (get_string("rubric[{$i}]_score{$j}", 'ispeereval') === '') :?>
                            <td></td>
                        <?php else:?>
                        <td>
                            <label style="display: block; width:100%; height:100%;">
                                <input type="radio" name="rubric_<?php echo $i?>" value="<?php echo $j?>" required>
                                <?php echo get_string("rubric[{$i}]_suffix", 'ispeereval').get_string("rubric[{$i}]_score{$j}", 'ispeereval') ?>
                            </label>
                        </td>
                        <?php endif;?>                    
                    <?php endfor; ?>
                </tr>              
            <?php endfor; ?>
            <tr>
                <th style="text-align:center" colspan="2">評価コメント</th>     
                <td colspan="4">
                    <textarea name="comment" cols="120" rows="4" required></textarea>
                </td>       
            </tr>
        </tbody>
    </table>
    <button class="submit-button" name="rubrics_submit">他者評価結果を登録する</button>
</form>
</div>

<script>
// ラジオボタン背景色
$(function(){
    $('.table-checked :radio').change(
        function() { 
            $('.table-checked td :radio').closest('td').removeClass('this-time');
            $('.table-checked td :checked').closest('td').addClass('this-time');
        }
    ).trigger('change');
});
</script>