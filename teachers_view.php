<link rel="stylesheet" type="text/css" href="./style.css">

<!-- タブボタン部分 -->
<div class="tab-button">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a href="#form" class="nav-link active" data-toggle="tab">フォーム</a>
    </li>
    <li class="nav-item">
      <a href="#list" class="nav-link" data-toggle="tab">登録一覧</a>
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
</div>