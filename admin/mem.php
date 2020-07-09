<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/deluser.php" method="post">
        <table>
            <tr class="ct" style="width:50%;margin:auto">
                <td class="clo">帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
    <?php
    $users=$User->all();
    foreach($users as $u){
        if($u['acc']!='admin'){
    
            ?>
            <tr>
                <td><?=$u['acc'];?></td>
                <td><?=str_repeat("*",strlen($u['acc']));?></td>
                <td><input type="checkbox" name="del[]" value="<?=$u['id'];?>"></td>
            </tr>
            <?php
    }
    }
    
    ?>
    
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除"><input type="reset" value="清空選取">
        </div>
    </form>

    <h1>新增會員</h1>
    <div style="color:red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table>
        <tr>
            <td>Step:1登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step:2登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step:3再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step:4信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button onclick="reg()">新增</button>
                <button onclick="location=location">清除</button>
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>

<script>
    function reg() {
        let acc = $('#acc').val()
        let pw = $('#pw').val()
        let pw2 = $('#pw2').val()
        let email = $('#email').val()

        if (acc == "" || pw == "" || pw2 == "" || email == "") {
            alert("不可空白");
        } else if (pw != pw2) {
            alert("密碼錯誤");
        } else {
            $.get("./api/chkacc.php", { // 神奇的ajax，即時處理，不需重新導回頁面
                acc
            }, function(res) {
                if (res == 1) {
                    alert("帳號重複");
                } else {
                    $.post("./api/reg.php", {
                        acc,
                        pw,
                        email
                    }, function() {
                        // alert("註冊完成，歡迎加入");
                        // location.href = "index.php?do=login";
                        location.reload();
                    })
                }
            })
        }
    }
</script>