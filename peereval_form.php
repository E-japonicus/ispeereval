<?php
// グループ情報の取得
$groupid = groups_get_user_groups($course->id, $userid)[0][0];
// --------------------v1.0
// $group_menbers_sql =
// 'SELECT PR.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username FROM
// (SELECT userid, PE.user_id as entry_user_id, rubric_1, rubric_2, rubric_3, rubric_4, rubric_5, rubric_6 comment  FROM (SELECT * FROM {groups_members} WHERE groupid = ?) UG LEFT OUTER JOIN 
// (SELECT * FROM {ispeereval_rubrics} WHERE user_id = ? AND ispeereval_id = ?) PE ON UG.userid = PE.peer_id) PR
// INNER JOIN {user} ON {user}.id = PR.userid WHERE NOT EXISTS (SELECT * FROM {user} WHERE PR.userid = ?)';
// $group_menbers_records= $DB->get_records_sql($group_menbers_sql, array($groupid, $USER->id, $ispeereval->id, $USER->id));

// --------------------v2.0
// // コースに登録されている自分以外の学生ロールのユーザーid　par = $context->id, $course->id, $USER->id
// $user = "SELECT DISTINCT ROLES.userid FROM (${roles}) ROLES INNER JOIN (${enrol}) ENROL ON ROLES.userid = ENROL.userid WHERE NOT EXISTS (SELECT * FROM {user} WHERE ENROL.userid = ?)";
// // 自分のグループのユーザー(自分を除く，学生ロール)　par = $context->id, $course->id, $USER->id, $groupid
// $mygroup = "SELECT USER.* FROM (${user}) USER INNER JOIN (SELECT userid FROM {groups_members} WHERE groupid = ?) MYGROUP ON MYGROUP.userid = USER.userid";
// // 自分のグループのユーザーの情報(自分を除く，学生ロール) par = $context->id, $course->id, $USER->id, $groupid
// $mygroup_info = "SELECT {user}.id, concat({user}.lastname, ' ', {user}.firstname) name, {user}.username FROM (${mygroup}) MYGROUP INNER JOIN {user} ON MYGROUP.userid = {user}.id";
// // 自分が登録したルーブリック par = $USER->id, $ispeereval->id
// $rubrics = "SELECT * FROM {ispeereval_rubrics} WHERE user_id = ? AND ispeereval_id = ?";
// // par = $context->id, $course->id, $USER->id, $groupid, $USER->id, $ispeereval->id
// $group_menbers_sql = "SELECT * FROM (${mygroup_info}) MYGROUP LEFT OUTER JOIN (${rubrics}) RUBRICS ON MYGROUP.id = RUBRICS.peer_id OR RUBRICS.peer_id is NULL";
// $group_menbers_records = $DB->get_records_sql($group_menbers_sql, array($context->id, $course->id, $USER->id, $groupid, $USER->id, $ispeereval->id));


// --------------------v3.0
$roles = 'SELECT userid FROM {role_assignments} WHERE contextid = ? AND roleid = (SELECT id FROM {role} WHERE shortname = "student")';
$enrol = 'SELECT userid FROM {user_enrolments} WHERE enrolid = (SELECT id FROM {enrol} WHERE enrol = "manual" AND courseid = ?)';
// コースに登録されている学生ロールのユーザーid
// $context->id, $course->id
$users = "SELECT DISTINCT ROLES.userid FROM (${roles}) ROLES INNER JOIN (${enrol}) ENROL ON ROLES.userid = ENROL.userid";
// 自分のグループのユーザー(自分を除く，学生ロール) 
// $context->id, $course->id, $groupid, $USER->id
$mygroup = "SELECT USERS.* FROM (${users}) USERS INNER JOIN (SELECT userid FROM {groups_members} WHERE groupid = ?) MYGROUP ON MYGROUP.userid = USERS.userid AND USERS.userid != ?";
// 自分のグループのユーザー情報(自分を除く，学生ロール) 
// $context->id, $course->id, $groupid, $USER->id
$mygroup_info = "SELECT {user}.id as userid, concat({user}.lastname, ' ', {user}.firstname) name FROM (${mygroup}) MYGROUP INNER JOIN {user} ON MYGROUP.userid = {user}.id";
// 自分が登録した評価一覧
// $USER->id, $ispeereval->id
$rubrics = "SELECT * FROM {ispeereval_rubrics} WHERE user_id = ? AND ispeereval_id = ?";
// グループメンバーの評価一覧
// $context->id, $course->id, $groupid, $USER->id, $USER->id, $ispeereval->id
$gropu_rubrics = "SELECT * FROM (${mygroup_info}) MYGROUPINFO LEFT OUTER JOIN (${rubrics}) RUBRICS ON MYGROUPINFO.userid = RUBRICS.peer_id";
$group_menbers_records = $DB->get_records_sql($gropu_rubrics, array($context->id, $course->id, $groupid, $USER->id, $USER->id, $ispeereval->id));


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
$you_entry_records = $group_menbers_records;

?>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

<h2>注意事項</h2>
<div>
    <ul>
        <li><b>評価を登録する時は評価相手の作成した問題を見ながら評価をしてください。</b></li>
        <li><b>評価者の氏名は評価相手に表示されません。</b></li>
    </ul>
</div>

<div class="sticky">
    <table class="table table-bordered sticky" style="background-color:#fcfff9">
        <tbody>
            <tr>
                <th style="text-align:center" width="50%">相互評価用チェックリスト</th>
                <th style="text-align:center" width="50%">演習目標(作問の要件)</th>
            </tr>
            <tr>
                <td><?php echo get_string('good_quiz_help', 'ispeereval')?></td>
                <td><?php echo nl2br($ispeereval->target);?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php if (isset($groupid)) :?>
<h1>グループメンバーの評価を登録してください</h1>
<table class="table table-bordered">
    <thead style="background: #f8f8f8;">
        <tr>
			<th>グループメンバー</th>
			<th>登録した評価の確認</th>
		</tr>
    </thead>
	<tbody>
        <?php foreach ($group_menbers_records as $group_menbers_record) :?>
        <tr>
            <td>
                <?php echo $group_menbers_record->name ?>
            </td>
            <?php if (isset($group_menbers_record->timecreated)) :?>
            <td>
                <a href="#entry_records">登録した評価を確認する</a>
            </td>
            <?php else:?>
            <td>
                未登録
            </td>
            <?php endif;?>
        </tr>
        <?php endforeach; ?>
	</tbody>
</table>
<?php endif;?>

<h1>評価の登録</h1>
<form action="" method="post" name="peereval_rubrics">
    <table class="table table-bordered table-checked" style="height:200px;">
        <tbody>
            <tr>
                <th style="text-align:center">評価する相手</th>     
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
                <th style="text-align:center" rowspan="2" width="20%">規準</th>
                <th style="text-align:center" colspan="4">基準</th>
            </tr>
            <tr>
                <th style="text-align:center" width="20%">レベル０</th>
                <th style="text-align:center" width="20%">レベル１</th>
                <th style="text-align:center" width="20%">レベル２</th>
                <th style="text-align:center" width="20%">レベル３</th>
            </tr>
            <?php for ($i=1; $i <= 6 ; $i++): ?>
            <tr height="150">
                <th>
                    <?php echo get_string("rubric[{$i}]", 'ispeereval')?>
                </th>
                <?php for ($j=0; $j < 4; $j++) :?>
                <td>
                    <label style="display: block; width:100%; height:100%;">
                        <input type="radio" name="rubric_<?php echo $i?>" value="<?php echo $j?>" required>
                        <?php echo get_string("rubric[{$i}]_score{$j}", 'ispeereval') ?>
                    </label>
                </td>
                <?php endfor; ?>
            </tr>              
            <?php endfor; ?>
            <tr>
                <th style="text-align:center">評価コメント</th>     
                <td colspan="4">
                    <textarea name="comment" cols="120" rows="4" required></textarea>
                </td>       
            </tr>
        </tbody>
    </table>
    <button class="submit-button" name="rubrics_submit">他者評価結果を登録する</button>
</form>

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