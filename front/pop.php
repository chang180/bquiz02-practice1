<style>
    .all {
        display: none;
    }

    .clo {
        cursor: pointer;
        color: blue;
    }
    .alerr{
        background:rgba(51,51,51,0.8); 
        color:#FFF; 
        height:300px; 
        width:350px; 
        position:fixed; 
        display:none; 
        z-index:9999; 
        overflow:auto;
        padding:10px;
    }
</style>

<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>
    <table>
        <tr class="ct">
            <td>標題</td>
            <td>內容</td>
            <td>人氣</td>
        </tr>
        <?php
        $all = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? '1';
        $start = ($now - 1) * $div;
        $pop = $News->all(['sh' => 1], " ORDER BY good DESC LIMIT $start,$div");
        foreach ($pop as $n) {
        ?>
            <tr>
                <td width="30%" class="clo"><?= $n['title']; ?></td>
                <td width="50%">
                    <div class="tt" id="t<?= $n['id']; ?>"><?= mb_substr($n['text'], 0, 20, "utf8"); ?>...</div>
                    <div class="all alerr" id="a<?= $n['id']; ?>"><h3 style="color:skyblue"><?=$n['title'];?></h3><?= nl2br($n['text']); ?></div>
                </td>
                <td><span id="vie<?=$n['id'];?>"><?=$n['good'];?></span>個人說<img src="./icon/02B03.jpg" style="width:25px">-
                <?php
                    if (!empty($_SESSION['login'])) {
                        $chk = $Log->count(['news' => $n['id'], 'user' => $_SESSION['login']]);
                        if ($chk > 0) {
                    ?>
                            <a id="good<?=$n['id'];?>" href='#' onclick="good('<?=$n['id'];?>','2','<?=$_SESSION['login'];?>')">收回讚</a>
                        <?php
                        } else {
                        ?>
                            <a id="good<?=$n['id'];?>" href='#' onclick="good('<?=$n['id'];?>','1','<?=$_SESSION['login'];?>')">讚</a>
                    <?php
                        }
                    }
                    ?>
            </td>
            </tr>

        <?php
        }
        ?>

    </table>
    <div>
        <?php
        if (($now - 1) > 0) {
            echo "<a href='index.php?do=pop&p=" . ($now - 1) . "'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? "24px" : "18px";
            echo "<a href='index.php?do=pop&p=$i' style='font-size:$size'>" . $i . " </a>";
        }
        if (($now + 1) <= $pages) {
            echo "<a href='index.php?do=pop&p=" . ($now + 1) . "'> >  </a>";
        }

        ?>
    </div>
</fieldset>

<script>
    $(".clo").hover(function() {
        $(this).next("td").children(".all").toggle();
    })
</script>