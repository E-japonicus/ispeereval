<h1 id="entry_records">登録した評価</h1>

<!-- タブボタン部分 -->
<ul class="nav nav-tabs">
    <?php $active = 'active'; ?>
    <?php foreach ($you_entry_records as $record) :?>
        <?php if(isset($record->timecreated)) : ?>
        <li class="nav-item">
            <a data-toggle="tab" href="#peer_<?php echo $record->userid ?>" class="nav-link <?php echo $active ?>"><?php echo $record->name; ?></a>
        </li>
        <?php unset($active); ?>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<!--タブのコンテンツ部分-->
<div class="tab-content">
    <?php $active = 'active'; ?>
    <?php foreach ($you_entry_records as $record) :?>
        <?php if(isset($record->timecreated)) : ?>
        <div id="peer_<?php echo $record->userid ?>" class="tab-pane <?php echo $active ?>">
            <table class="table table-bordered">
                <thead style="background: #f8f8f8;">
                    <tr>
                        <th style="text-align:center" rowspan="2" width="15%">規準</th>
                        <th style="text-align:center" colspan="4">基準</th>
                    </tr>
                    <tr>
                        <th style="text-align:center" width="15%">レベル０</th>
                        <th style="text-align:center" width="15%">レベル１</th>
                        <th style="text-align:center" width="15%">レベル２</th>
                        <th style="text-align:center" width="15%">レベル３</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=1; $i <= 6; $i++) :?>
                    <tr height="150">
                        <th>
                            <?php echo get_string("rubric[{$i}]", 'ispeereval')?>
                        </th>
                        <?php for ($j=0; $j < 4; $j++) :?>
                        <!-- 今回の結果のセルの色を変える -->
                            <?php $this_time_class = ($record->{"rubric_{$i}"} === "{$j}") ? 'this-time' : '' ?> 
                            <td class=<?php echo $this_time_class ?>>
                                <?php echo get_string("rubric[{$i}]_score{$j}", 'ispeereval') ?>
                            </td>                 
                        <?php endfor; ?>
                    </tr>
                    <?php endfor;?>
                    <tr height="100">
                        <th style="text-align:center">評価コメント</th>     
                        <td colspan="4">
                            <?php echo $record->comment ?>
                        </td>       
                    </tr>
                </tbody>
            </table>
        </div>
        <?php unset($active); ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
