<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button onclick="login()">登入</button><button onclick="location=location">清除</button>
            </td>
            <td>
                <a href="index.php?do=forget">忘記密碼</a>|
                <a href="index.php?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function login() {
        let acc = $('#acc').val();
        let pw = $('#pw').val();
        $.get('./api/chkacc.php', {
            acc
        }, function(res) {
            if (res == 0) {
                alert("查無帳號");
            } else {
                $.get('./api/chkpw.php', {
                    acc,
                    pw
                }, function(res) {
                    if (res == 1 && acc == 'admin') {
                        location.href = "admin.php";
                    } else if (res == 1) {
                        location.href = "index.php";
                    } else {
                        alert("密碼錯誤");
                    }
                })
            }
        })
    }
</script>