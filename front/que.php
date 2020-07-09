<fieldset>
    <legend>目前位置:首頁 > 問卷調查</legend>
    <table>
        <tr>
            <td class="ct" width="10%">編號</td>
            <td class="ct" width="60%">問卷題目</td>
            <td class="ct" width="10%">投票總數</td>
            <td class="ct" width="10%">結果</td>
            <td class="ct">狀態</td>
        </tr>
        <?php
        include_once "base.php";
        $que = $Que->all(['parent' => 0]);
        foreach ($que as $k => $q) {

        ?>

            <tr>
                <td class="ct"><?= $k + 1; ?>.</td>
                <td class="ct"><?= $q['text']; ?></td>
                <td class="ct"><?= $q['count']; ?></td>
                <td class="ct"><a href='index.php?do=result&id=<?=$q['id'];?>'>結果</a></td>
                <td class="ct">
                    <?php
                    if (!empty($_SESSION['login'])) {
                    ?>
<a href="index.php?do=vote&id=<?=$q['id'];?>">參與投票</a>
                    <?php
                    } else {
                    ?>
請先登入
                    <?php
                    }
                    ?>

                </td>
            </tr>
        <?php
        }

        ?>
    </table>
</fieldset>