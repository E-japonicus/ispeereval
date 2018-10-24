<link rel="stylesheet" type="text/css" href="./style.css">

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#form">フォーム</a></li>
  <li><a data-toggle="tab" href="#list">ルーブリック登録一覧</a></li>
</ul>

<div class="tab-content">
  <div id="form" class="tab-pane fade fade in active">
    <?php require_once("{$CFG->dirroot}/mod/ispeereval/peereval_form.php"); ?>
  </div>

  <div id="list" class="tab-pane fade">
    <?php require_once("{$CFG->dirroot}/mod/ispeereval/teachers_list.php"); ?>
  </div>
</div>