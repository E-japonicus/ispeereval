<?php

// グループ情報の取得
$groups_info_sql = "SELECT * FROM {groups} WHERE courseid = ?";
$groups_info     = $DB->get_records_sql($groups_info_sql, array($course->id));

// 自分が登録した評価一覧
$groupname_sql  = "SELECT BASE.*, GROUPS.name as group_name FROM {ispeereval_tasa_rubrics} BASE INNER JOIN {groups} GROUPS ON BASE.group_id = GROUPS.id";
$rubrics_sql    = "SELECT RUBRICS.*, USER.username as peer_username, concat(USER.lastname, ' ', USER.firstname) peer_name FROM (${groupname_sql}) RUBRICS INNER JOIN {user} USER ON RUBRICS.peer_id = USER.id WHERE user_id = ? AND ispeereval_id = ?";
$rubrics        = $DB->get_records_sql($rubrics_sql, array($USER->id, $ispeereval->id));

?>

<link rel="stylesheet" type="text/css" href="./style.css">
<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
<script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

<form action="" method="post">
    <input type="hidden" name="choose_group">
    <table class="table table-bordered" width="50%">
        <tbody>
        <?php foreach ($groups_info as $group_info) :?>
            <tr>
                <th width="20%">
                    <?php echo $group_info->name ?>
                </th>
                <td width="20%">
                    <?php 
                        if ($DB->get_record('ispeereval_tasa_rubrics', array('group_id'=>$group_info->id), 'id')) :
                            echo "登録済み";
                        else:
                            echo "未登録";
                        endif;
                    ?>
                </td>
                <td width="20%">
                  <button type=submit name=groupid value="<?php echo $group_info->id; ?>">このグループを評価する</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>


<h2>評価一覧</h2>
<div>
    <span><?php echo count($rubrics); ?>件</span>
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="15%">評価相手</th>
          <th width="15%">評価相手ユーザ名</th>
          <th width="15%">評価相手グループ名</th>

          <th width="10%">ﾙｰﾌﾞﾘｯｸ[1]</th>
          <th width="10%">ﾙｰﾌﾞﾘｯｸ[2]</th>

          <th width="35%">コメント</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rubrics as $record): ?>
          <tr>
            <th><?php echo $record->peer_name  ; ?></th>
            <th><?php echo $record->peer_username  ; ?></th>
            <th><?php echo $record->group_name  ; ?></th>

            <?php
            for ($i=1; $i <= 2; $i++) {
              echo "<th>".$record->{"rubric_{$i}"}."</th>";
            }
            ?>
            <th><?php echo $record->comment  ; ?></th>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>