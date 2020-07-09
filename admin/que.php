<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/addque.php" method="post">
        <table style="width:70%">
            <tr>
                <td class="clo">問卷名稱</td>
                <td><input type="text" name="subject"></td>
            </tr>
            <tr class="clo" id="more">
                <td colspan="2">
                    選項<input type="text" name="option[]">
                    <input type="button" value="更多" onclick="moreOpt()">
                </td>
            </tr>
        </table>
        <div>
            <input type="submit" value="新增"><input type="reset" value="清空">
        </div>
    </form>
</fieldset>

<script>
    function moreOpt() {
        let el = `    <tr class="clo">
        <td colspan="2">
            選項<input type="text" name="option[]">
        </td>
    </tr>`;
    $("#more").before(el);
    }
</script>