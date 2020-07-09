<?php
$q = $Que->find($_GET['id']);


?>
<form action="./api/vote.php" method="post">
    <fieldset>
        <legend>目前位置:首頁 > 問卷調查 > <?= $q['text']; ?></legend>
        <h4><?= $q['text']; ?></h4>
        <?php
        $opt = $Que->all(['parent' => $q['id']]);
        foreach ($opt as $o) {
            echo "<div>";
            echo "<input type='radio' name='opt' value='".$o['id']."'>" . $o['text'] . "</div>";
    
        }
    
        ?>
        <input type="hidden" name="parent" value="<?=$q['id'];?>">
    <div class="ct"><input type="submit" value="我要投票"></div>
    </fieldset>
</form>