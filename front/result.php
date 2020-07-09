<style>
    .line{
        display:inline-block;
        height:30px;
        background:#ccc;
    }
</style>

<?php
$q = $Que->find($_GET['id']);


?>
    <fieldset>
        <legend>目前位置:首頁 > 問卷調查 > <?= $q['text']; ?></legend>
        <h4><?= $q['text']; ?></h4>
        <table style="width:95%;margin:auto">
        <?php
        $opt = $Que->all(['parent' => $q['id']]);
        foreach ($opt as $o) {
            $total=($q['count']==0)?1:$q['count'];
            $rate=$o['count']/$total;
            ?>
<tr>
    <td width="50%"><?=$o['text'];?></td>
    <td width="50%">
        <div class="line" style="width:<?=round((0.8*$rate)*100);?>%"></div>
        <?=$o['count'];?>票(<?=round($rate*100);?>%)</td>
</tr>
            <?php
        }
    
        ?>
        </table>
    <div class="ct"><button onclick="location.href='index.php?do=que'">返回</button></div>
    </fieldset>