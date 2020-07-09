<style>
    .all {
        display: none;
    }

    .clo {
        cursor: pointer;
        color: blue;
    }
</style>

<fieldset>
    <legend>目前位置:首頁 > 最新文章區</legend>
    <table>
        <tr class="ct">
            <td>標題</td>
            <td>內容</td>
            <td>
            </td>
        </tr>
        <?php
        $all = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? '1';
        $start = ($now - 1) * $div;
        $news = $News->all(['sh' => 1], " LIMIT $start,$div");
        foreach ($news as $n) {
        ?>
            <tr>
                <td width="30%" class="clo"><?= $n['title']; ?></td>
                <td width="50%">
                    <div class="tt" id="t<?= $n['id']; ?>"><?= mb_substr($n['text'], 0, 20, "utf8"); ?>...</div>
                    <div class="all" id="a<?= $n['id']; ?>"><?= nl2br($n['text']); ?></div>
                </td>
                <td>
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
            echo "<a href='index.php?do=news&p=" . ($now - 1) . "'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? "24px" : "18px";
            echo "<a href='index.php?do=news&p=$i' style='font-size:$size'>" . $i . " </a>";
        }
        if (($now + 1) <= $pages) {
            echo "<a href='index.php?do=news&p=" . ($now + 1) . "'> >  </a>";
        }

        ?>
    </div>
</fieldset>

<script>
    $(".clo").on("click", function() {
        $(this).next("td").children(".tt,.all").toggle();
    })
</script>