<fieldset>
    <legend>忘記密碼</legend>
    <table>
        <tr>
            <td>請輸入信箱以查詢密碼</td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td id="result"></td>
        </tr>
        <tr>
            <td><button onclick="forget()">尋找</button></td>
        </tr>
    </table>
</fieldset>
<script>
    function forget(){
        let email=$("#email").val();
        $.get("./api/findpw.php",{email},function(res){
            $("#result").html(res);
        })
    }
</script>