<link rel="stylesheet" type="text/css" href="./style.css">

<h1 id="entry_records">登録した評価</h1>
<ul class="nav nav-tabs">
<?php foreach ($you_entry_records as $record) :?>
<li><a data-toggle="tab" href="#<?php echo $record->username ?>"><?php echo $record->name; ?></a></li>
<?php endforeach; ?>
</ul>

<div class="tab-content">
<?php foreach ($you_entry_records as $record) :?>
<div id="<?php echo $record->username ?>" class="tab-pane fade">

    <table class="table table-bordered">
        <tbody>
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
            <?php for ($i=1; $i <= 6; $i++) :?>
            <tr height="150">
                <th width="2%">
                    <?php echo $i ?>
                </th>
                <th>
                    <?php echo get_string("rubric[{$i}]", 'ispeereval')?>
                </th>
                <?php for ($j=0; $j < 4; $j++) :?>
				    <!-- 今回の結果のセルの色を変える -->
				    <?php $this_time_class = ($record->{"rubric_{$i}"} === "{$j}") ? 'this-time' : '' ?> 
                    <?php if (get_string("rubric[{$i}]_score{$j}", 'ispeereval') === '') :?>
                        <td></td>
                    <?php else:?>
                    <td class=<?php echo $this_time_class ?>>
                        <?php echo get_string("rubric[{$i}]_suffix", 'ispeereval').get_string("rubric[{$i}]_score{$j}", 'ispeereval') ?>
                    </td>
                    <?php endif;?>                    
                <?php endfor; ?>
            </tr>
            <?php endfor;?>
            <tr height="100">
                <th style="text-align:center" colspan="2">評価コメント</th>     
                <td colspan="4">
                    <?php echo $record->comment ?>
                </td>       
            </tr>
        </tbody>
    </table>
</div>
<?php endforeach; ?>
</div>