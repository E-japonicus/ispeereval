<?php
// $user_sql = 'SELECT {user}.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username FROM (SELECT * FROM {user_enrolments} WHERE enrolid = (SELECT id FROM {enrol} WHERE enrol = "manual" AND courseid = ?)) B INNER JOIN {user} ON B.userid = {user}.id';
$user_sql = 
'SELECT DISTINCT {user}.*, concat({user}.lastname, " ", {user}.firstname) name, {user}.username FROM 
(SELECT ROLE.userid FROM (SELECT userid FROM {role_assignments} WHERE contextid = ? AND roleid = 
(SELECT id FROM {role} WHERE shortname = "student")) ROLE INNER JOIN 
(SELECT userid FROM {user_enrolments} WHERE enrolid = 
(SELECT id FROM {enrol} WHERE enrol = "manual" AND courseid = ?)) ENROL ON ROLE.userid = ENROL.userid) USER INNER JOIN {user} ON USER.userid = {user}.id;';
$user_records = $DB->get_records_sql($user_sql, array($context->id, $course->id));
?>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>

<div>
<form action="" method="post" name="peereval_rubrics">
    <table class="table table-bordered table-checked" style="height:200px;">
        <tbody>
            <tr>
                <th style="text-align:center" colspan="2">評価する相手</th>     
                <td colspan="4" style="background-color: white;">
                    <select name="peer_id">
                        <option value="default" selected>評価する相手の名前を選択してください</option>
                    <?php foreach ($user_records as $user_record) :?>
                        <option value="<?php echo $user_record->id ?>"><?php echo $user_record->name ?></option>
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