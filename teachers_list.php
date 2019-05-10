<?php
$sql = 'SELECT A.*, concat(s1.lastname, " ", s1.firstname) name, concat(s2.lastname, " ", s2.firstname) peer_name
FROM (select * from {ispeereval_rubrics} where ispeereval_id = ?) A
INNER JOIN {user} s1 ON A.user_id = s1.id
INNER JOIN {user} s2 ON A.peer_id = s2.id';
$rubric_records = $DB->get_records_sql($sql,  array($ispeereval->id));

?>

<div>
    <span><?php echo count($rubric_records); ?>件</span>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>名前</th>
          <th>評価相手</th>

          <th>ﾙｰﾌﾞﾘｯｸ[1]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[2]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[3]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[4]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[5]</th>
          <th>ﾙｰﾌﾞﾘｯｸ[6]</th>
          <th>コメント</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rubric_records as $record): ?>
          <tr>
            <th><?php echo $record->name      ; ?></th>
            <th><?php echo $record->peer_name  ; ?></th>

            <?php
            for ($i=1; $i <= 6; $i++) {
              echo "<th>".$record->{"rubric_{$i}"}."</th>";
            }
            ?>
            <th><?php echo $record->comment  ; ?></th>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</div>