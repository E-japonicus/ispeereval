<?php

// groupidからグループメンバーを取得
$group_members_sql = 'SELECT * FROM {groups_members} WHERE groupid = ?';
// グループメンバーのidをuserと結合
$group_menbers_info_sql = "SELECT USER.*, MEMBERS.groupid FROM {user} USER INNER JOIN (${group_members_sql}) MEMBERS ON USER.id = MEMBERS.userid";
$group_menbers_info = $DB->get_records_sql($group_menbers_info_sql, array($_POST['groupid']));

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
                <th style="text-align:center" width="20%">相互評価用チェックリスト</th>
                <td><?php echo get_string('good_quiz_help', 'ispeereval')?></td>
            </tr>
        </tbody>
    </table>
</div>

<form action="" method="post" name="tasa_rubrics">
    <?php foreach ($group_menbers_info as $group_member) :?>
    <fieldset name="<?php echo $group_member->id; ?>">
    <legend style="background-color:#e6f7ff">
        <?php echo $group_member->lastname." ".$group_member->firstname."　(".$group_member->username.")"; ?>
        <input type="hidden" name="user_<?php echo $group_member->id; ?>[userid]" value="<?php echo $group_member->id; ?>">
        <input type="hidden" name="user_<?php echo $group_member->id; ?>[groupid]" value="<?php echo $group_member->groupid; ?>">
    </legend>
    <table class="table table-bordered table-checked" style="height:200px;">
        <tbody>
            <tr>
                <th style="text-align:center" rowspan="2">規準</th>
                <th style="text-align:center" colspan="4">基準</th>
            </tr>
            <tr>
                <th style="text-align:center" width="20%">レベル０</th>
                <th style="text-align:center" width="20%">レベル１</th>
                <th style="text-align:center" width="20%">レベル２</th>
                <th style="text-align:center" width="20%">レベル３</th>
            </tr>
            <?php for ($i=1; $i <= 2 ; $i++): ?>
            <tr height="150">
                <th>
                    <?php echo get_string("rubric[{$i}]", 'ispeereval')?>
                </th>
                <?php for ($j=0; $j < 4; $j++) :?>
                <td>
                    <label style="display: block; width:100%; height:100%;">
                        <input type="radio" name="user_<?php echo $group_member->id; ?>[rubric_<?php echo $i?>]" value="<?php echo $j?>" required>
                        <?php echo get_string("rubric[{$i}]_score{$j}", 'ispeereval') ?>
                    </label>
                </td>
                <?php endfor; ?>
            </tr>              
            <?php endfor; ?>
            <tr>
                <th style="text-align:center">コメント</th>
                <td colspan="4">
                    <textarea style="width:90%;" name="user_<?php echo $group_member->id; ?>[comment]" cols="120" rows="4"></textarea>
                </td> 
            </tr>
        </tbody>
    </table>
    </fieldset>
    <?php endforeach; ?>
    <button class="submit-button" name="tasa_submit">他者評価結果を登録する</button>
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

<!-- form入力途中のページ遷移を制限する -->
<script>
$(function(){
var form_change_flg = false;
	window.onbeforeunload = function(e) {
		if (form_change_flg) {
			e.returnValue = "入力画面を閉じようとしています。入力中の情報がありますがよろしいですか？";
		}
	}
    //フォームの内容が変更されたらフラグを立てる
    $("form textarea").change(function() {
  		form_change_flg = true;
  	});
    // フォーム送信時はアラートOFF
    $('form[name=tasa_submit]').submit(function(){
        form_change_flg = false;
    });
});
</script>