<link rel="stylesheet" type="text/css" href="./style.css">

<!-- タブボタン部分 -->
<div class="tab-button">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a href="#form" class="nav-link active" data-toggle="tab">フォーム</a>
    </li>
    <li class="nav-item">
      <a href="#list" class="nav-link" data-toggle="tab">学生他者評価一覧</a>
    </li>
    <li class="nav-item">
      <a href="#tasa_list" class="nav-link" data-toggle="tab">TA/SA評価一覧</a>
    </li>
  </ul>
</div>
  
<!--タブのコンテンツ部分-->
<div class="tab-content">
  <div id="form" class="tab-pane active">
    <?php require_once("{$CFG->dirroot}/mod/ispeereval/peereval_form.php"); ?>
  </div>
  <div id="list" class="tab-pane">
    <?php require_once("{$CFG->dirroot}/mod/ispeereval/teachers_list.php"); ?>
  </div>
  <div id="tasa_list" class="tab-pane">
    <?php require_once("{$CFG->dirroot}/mod/ispeereval/teachers_tasa_list"); ?>
  </div>
</div>