<?php
include "../inc/session.php";

// 관리자가 선택한 사용자의 데이터 가져오기
$g_idx = $_GET["g_idx"];

// 로그인 사용자만 접근
include "../inc/login_check.php";

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select * from members where idx=$g_idx;";

// 쿼리 실행
$result = mysqli_query($dbcon, $sql);

// DB에서 데이터 가져오기
// mysqi_fetch_row(쿼리실행문) -- 필드순서
// mysqi_fetch_array(쿼리실행문) -- 필드이름
// mysqi_num_rows(쿼리실행문) -- 전체 행 개수
$array = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보</title>
    <style>
        body,input,button,select,option{font-size:20px}
        input[type=radio]{width:20px;height:20px}
    </style>
    <script>
        function edit_form_check(){
            var pwd = document.getElementById("pwd");
            var repwd = document.getElementById("repwd");

            if(pwd.value){
                var pw_len = pwd.value.length;
                if(pw_len < 4 || pw_len > 12){
                    alert("비밀번호는 4~12글자만 입력할 수 있습니다.");
                    pwd.focus();
                    return false;
                };
            };
            
            if(pwd.value){
                if(pwd.value != repwd.value){
                    alert("비밀번호를 확인해 주세요.");
                    repwd.focus();
                    return false;
                };
            };           
        };

        function change_email(){
            var email_dns = document.getElementById("email_dns");
            var email_sel = document.getElementById("email_sel");
            
            var idx = email_sel.options.selectedIndex;
            var g_txt = email_sel.options[idx].value;
            email_dns.value = g_txt;
        };
        
        function mem_del(){
            var rtn_val = confirm("정말 삭제하시겠습니까?");
            if(rtn_val == true){
                location.href = "member_delete.php?g_idx=<?php echo $g_idx; ?>";
                // location.href = "member_delete.php";
            };
        };
    </script>
</head>
<body>
    <?php include "../inc/sub_header.html"; ?>
    <!-- <form name="edit_form" action="edit.php?g_idx=<?php echo $g_idx; ?>" method="post" onsubmit="return edit_form_check()"> -->
    <form name="edit_form" action="edit.php" method="post" onsubmit="return edit_form_check()">
        <fieldset>
            <legend>회원정보</legend>
            <input type="hidden" name="g_idx" value="<?php echo $array["idx"]; ?>">
            <p>
                이름 <?php echo $array["u_name"]; ?>
            </p>

            <p>
                아이디 <?php echo $array["u_id"]; ?>
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
                <input type="text" name="mobile" id="mobile" value="<?php echo $array["mobile"]; ?>">
                <br>* "-" 없이 숫자만 입력
            </p>

            <?php
                // 문자 치환 : str_replace
                // 변수 = str_replace("어떤 문자를", "어떤 문자로", "어떤 값에서");
                // DB에 입력된 YYYY-MM-DD 형식을 YYYYMMDD로 치환
                $birth = str_replace("-", "", $array["birth"]);
            ?>
            <p>
                <label for="birth">생년월일</label>
                <input type="text" name="birth" id="birth" value="<?php echo $birth; ?>">
                <br>ex)20221031
            </p>

            <?php
                // 문자 분리 : explode
                // 변수 = explode("기준문자", "어떤 값에서");
                // 변수가 배열처리되어 분리된 값 사용
                // DB에서 가져온 이메일을 @ 기준으로 분리
                $email = explode("@", $array["email"]);
            ?>
            <p>
                <label for="email_id">이메일</label>
                <input type="text" name="email_id" id="email_id" value="<?php echo $email[0]; ?>"> @
                <input type="text" name="email_dns" id="email_dns" value="<?php echo $email[1]; ?>">
                <select name="email_sel" id="email_sel" onchange="change_email()">
                    <option value="">직접입력</option>
                    <option value="naver.com">네이버</option>
                    <option value="hanmail.net">다음</option>
                    <option value="gmail.com">구글</option>
                </select>
            </p>

            <p>
                <label for="ps_code">주소</label>
                <input type="text" name="ps_code" id="ps_code" value="<?php echo $array["ps_code"]; ?>">
                <button type="text">주소검색</button><br>
                <label for="addr_b">기본주소</label>
                <input type="text" name="addr_b" id="addr_b" value="<?php echo $array["addr_b"]; ?>"><br>
                <label for="addr_d">상세주소</label>
                <input type="text" name="addr_d" id="addr_d" value="<?php echo $array["addr_d"]; ?>">
            </p>

            <p>
                성별
                <input type="radio" name="gender" id="male" value="m"<?php if($array["gender"] == "m") echo " checked";?>>
                <label for="male">남</label>
                <input type="radio" name="gender" id="female" value="f"<?php if($array["gender"] == "f") echo " checked";?>>
                <label for="male">여</label>
            </p>

            <p>
                <button type="button" onclick="history.back()">이전 페이지</button>
                <button type="submit">정보수정</button>
                <button type="button" onclick="mem_del()">회원삭제</button>
            </p>
        </fieldset>
    </form>
</body>
</html>