<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <style type="text/css">
        body,input,button,select,option{font-size:20px}
        input[type=checkbox]{width:20px;height:20px}
        input[type=radio]{width:20px;height:20px}
        .blueText{color:rgb(40, 92, 188)}
        .redText{color:red}
    </style>
    <script>
        function join_form_check(){
            var u_name = document.getElementById("u_name");
            var u_id = document.getElementById("u_id");
            var pwd = document.getElementById("pwd");
            var repwd = document.getElementById("repwd");
            var apply = document.getElementById("apply");

            if(!u_name.value){
                alert("이름을 입력하세요.");
                u_name.focus();
                return false;
            };

            if(!u_id.value){
                alert("아이디를 입력하세요.");
                u_id.focus();
                return false;
            };
            var id_len = u_id.value.length;
            if(id_len < 4 || id_len > 12){
                alert("아이디는 4~12글자만 입력할 수 있습니다.");
                u_id.focus();
                return false;
            };

            if(!pwd.value){
                alert("비밀번호를 입력하세요.");
                pwd.focus();
                return false;
            };
            var pw_len = pwd.value.length;
            if(pw_len < 4 || pw_len > 12){
                alert("비밀번호는 4~12글자만 입력할 수 있습니다.");
                pwd.focus();
                return false;
            };

            if(pwd.value != repwd.value){
                alert("비밀번호를 확인해 주세요.");
                repwd.focus();
                return false;
            };

            if(!apply.checked){
                alert("약관동의가 필요합니다.");
                apply.focus();
                return false;
            };
        };

        function change_email(){
            var email_dns = document.getElementById("email_dns");
            var email_sel = document.getElementById("email_sel");
            
            var idx = email_sel.options.selectedIndex;
            var g_txt = email_sel.options[idx].value;
            email_dns.value = g_txt;
        };
//------------------------비동기식으로 아이디 중복 검사//제이쿼리로도 가능 //자바스크립트 async() 가능

        function getCont( g_id ){
            var dsp  = document.getElementById('dsp');
            
            if(g_id.length < 4 || g_id.length > 12){
                dsp.innerHTML = '아이디는 4~12글자만 입력할 수 있습니다..';
                dsp.className = 'redText';
            } else{
                var xmlhttp = fncGetXMLHttpRequest();

                // 아이디를 체크할 php 페이지에 체크 하려하는 id 값을 파라미터로 전송
                xmlhttp.open('GET', 'id_check_ajax.php?u_id='+g_id, false);

                xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');

                xmlhttp.onreadystatechange = function (){
                    if( xmlhttp.readyState=='4' && xmlhttp.status==200 ){
                        if( xmlhttp.status==500 || xmlhttp.status==404 || xmlhttp.status==403 )
                            alert( xmlhttp.status );
                        else{
                            var txt= xmlhttp.responseText;
                            txt = txt.replace(/\n/g,"");//행바꿈
                            txt = txt.replace(/\r/g,"");//엔터값 제거
                            txt = txt.replace(/\s+/g,"");//왼쪽 공백 제거
                            txt = txt.replace(/\s+$/g,"");//오른쪽 공백 제거

                            // alert("페이지에서 입력된 값: "+g_id+"\r처리 페이지에서 반환된 값: "+txt);
                            if(txt=='Y') {
                                dsp.innerHTML = '이미 가입된 아이디입니다.';
                                dsp.className = 'redText';
                            } else{
                                dsp.innerHTML = '사용할 수 있는 아이디입니다.';
                                dsp.className = 'blueText';
                            }

                        }
                    }
                }
            }
            xmlhttp.send();
        }
//-----------------호환성 검사
        function fncGetXMLHttpRequest(){
            if (window.ActiveXObject){
                try{
                    return new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e){
                    try{
                        return new ActiveXObject("Microsoft.XMLHTTP");
                    } 
                catch(e1) { return null; }
                }
                //IE 외 파이어폭스 오페라 같은 브라우저에서 XMLHttpRequest 객체 구하기
            } else if (window.XMLHttpRequest){
                return new XMLHttpRequest();
            } else{
                return null;
            }
        }
        // function key_up_test(txt){
        //     var dsp = document.getElementById("dsp");
        //     // dsp.innerHTML = txt;
        //     if(txt==1){
        //         dsp.innerHTML = "aaaaa";
        //     }else{
        //         dsp.innerHTML = "bbbb";
        //     }
            
        // }
    </script>
</head>
<body>
    <form name="join_form" action="insert.php" method="post" onsubmit="return join_form_check()">
        <fieldset>
            <legend>회원가입</legend>
            <p>
                <label for="u_name">이름</label>
                <input type="text" name="u_name" id="u_name">
            </p>

            <p>
                <label for="u_id">아이디</label>
                <input type="text" name="u_id" id="u_id" onkeyup="getCont(this.value)">
                <!-- <button type="button" onclick="id_search()">아이디 중복 확인</button> -->
                <br>* 아이디는 4~12글자만 입력할 수 있습니다.
                <br><span id="dsp"></span>
            </p>

            <p>
                <label for="pwd">비밀번호</label>
                <input type="text" name="pwd" id="pwd">
                <br>* 비밀번호는 4~12글자만 입력할 수 있습니다.
            </p>

            <p>
                <label for="repwd">비밀번호 확인</label>
                <input type="text" name="repwd" id="repwd">
            </p>

            <p>
                <label for="mobile">전화번호</label>
                <input type="text" name="mobile" id="mobile">
                <br>* "-" 없이 숫자만 입력
            </p>

            <p>
                <label for="birth">생년월일</label>
                <input type="text" name="birth" id="birth">
                <br>ex)20221031
            </p>

            <p>
                <label for="email_id">이메일</label>
                <input type="text" name="email_id" id="email_id"> @
                <input type="text" name="email_dns" id="email_dns">
                <select name="email_sel" id="email_sel" onchange="change_email()">
                    <option value="">직접입력</option>
                    <option value="naver.com">네이버</option>
                    <option value="hanmail.net">다음</option>
                    <option value="gmail.com">구글</option>
                </select>
            </p>

            <p>
                <label for="ps_code">주소</label>
                <input type="text" name="ps_code" id="ps_code">
                <button type="text">주소검색</button><br>
                <label for="addr_b">기본주소</label>
                <input type="text" name="addr_b" id="addr_b"><br>
                <label for="addr_d">상세주소</label>
                <input type="text" name="addr_d" id="addr_d">
            </p>

            <p>
                성별
                <input type="radio" name="gender" id="male" value="m">
                <label for="male">남</label>
                <input type="radio" name="gender" id="female" value="f">
                <label for="male">여</label>
            </p>

            <p>
                <input type="checkbox" name="apply" id="apply">
                <label for="apply">약관 동의 </label>
            </p>

            <p>
                <button type="button" onclick="history.back()">이전 페이지</button>
                <button type="submit">회원가입</button>
            </p>
        </fieldset>
    </form>
</body>
</html>