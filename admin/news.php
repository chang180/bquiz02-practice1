<form action="./api/editnews.php" method="post">
    <table>
        <tr class="ct" style="width:80%;margin:auto">
            <td style="width:10%">編號</td>
            <td style="width:70%">標題</td>
            <td style="width:10%">顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $all = $News->count();
        $div = 3;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? '1';
        $start = ($now - 1) * $div;
        $no = $start + 1;
        $news = $News->all("", " LIMIT $start,$div");

        foreach ($news as $n) {
        ?>
            <tr>
                <td class="clo"><?= $no; ?>.</td>
                <td><?= $n['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $n['id']; ?>" <?=($n['sh']==1)?"checked":"";?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $n['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?= $n['id']; ?>">
            </tr>
        <?php
            $no++;
        }
        ?>

    </table>
    <div class="ct">
        <?php
        if (($now - 1) > 0) {
            echo "<a href='admin.php?do=news&p=" . ($now - 1) . "'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $size = ($now == $i) ? "24px" : "18px";
            echo "<a href='admin.php?do=news&p=$i' style='font-size:$size'>" . $i . " </a>";
        }
        if (($now + 1) <= $pages) {
            echo "<a href='admin.php?do=news&p=" . ($now + 1) . "'> >  </a>";
        }

        ?>
    </div>
    <div class="ct">
        <input type="submit" value="確定修改">
    </div>
</form>