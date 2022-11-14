<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <style>
        body,input,button{font-size:20px}
        form{width:450px;margin:auto}
        h2{text-align:center}
    </style>
    <script>
        function login_form_check(){
            var u_id = document.getElementById("u_id");
            var pwd = document.getElementById("pwd");

            if(!u_id.value){
                alert("아이디를 입력하세요.");
                u_id.focus();
                return false;
            };
            if(!pwd.value){
                alert("비밀번호를 입력하세요.");
                pwd.focus();
                return false;
            };
        };
    </script>
</head>
<body>
    <h2>관리자 로그인</h2>
    <form name="login_form" action="login_ok.php" method="post" onsubmit="return login_form_check()">
        <fieldset>
            <legend>로그인</legend>
                <p>
                    <label for="u_id">아이디</label>
                    <input type="text" name="u_id" id="u_id" autofocus>
                </p>
                <p>
                    <label for="pwd">비밀번호</label>
                    <input type="text" name="pwd" id="pwd">
                </p>
                <p>
                    <button type="button" onclick="history.back();">돌아가기</button>
                    <button type="submit">로그인</button>
                </p>
        </fieldset>
    </form>
</body>
</html>