<?php
// 세션
include "../inc/session.php";

// 데이터 가져오기
// $g_idx = $_GET["g_idx"]; // 관리자가 선택한 사용자 idx를 form action으로 전송
$g_idx = $_POST["g_idx"]; // 관리자가 선택한 사용자 idx를 hidden 필드로 전송
$pwd = $_POST["pwd"];
$mobile = $_POST["mobile"];
$email_id = $_POST["email_id"];
$email_dns = $_POST["email_dns"];
$email = $email_id."@".$email_dns;
$birth = $_POST["birth"];
$ps_code = $_POST["ps_code"];
$addr_b = $_POST["addr_b"];
$addr_d = $_POST["addr_d"];
$gender = $_POST["gender"];

// 값 확인
/* echo "<p> 비밀번호 : ".$pwd."</p>";
echo "<p> 전화번호 : ".$mobile."</p>";
echo "<p> 이메일 : ".$email."</p>";
echo "<p> 생년월일 : ".$birth."</p>";
echo "<p> 우편번호 : ".$ps_code."</p>";
echo "<p> 기본주소 : ".$addr_b."</p>";
echo "<p> 상세주소 : ".$addr_d."</p>";
echo "<p> 성별 : ".$gender."</p>"; */

// DB 접속
include "../inc/dbcon.php";

// 쿼리 작성
// update 테이블명 set 필드명='값', 필드명='값',,,, where 필드명='값';

// 비밀번호를 입력한 경우
$sql = "update members set ";
$sql .= "pwd='$pwd', ";
$sql .= "mobile='$mobile', ";
$sql .= "email='$email', ";
$sql .= "birth='$birth', ";
$sql .= "ps_code='$ps_code', ";
$sql .= "addr_b='$addr_b', ";
$sql .= "addr_d='$addr_d', ";
$sql .= "gender='$gender' ";
$sql .= "where idx=$g_idx;";
// echo $sql;

// 비밀번호를 입력하지 않은 경우
$sql_nPwd = "update members set mobile='$mobile', email='$email', birth='$birth', ps_code='$ps_code', addr_b='$addr_b', addr_d='$addr_d', gender='$gender' where idx=$g_idx;";
// echo $sql_nPwd;


// 쿼리 전송
// mysqli_query(DB 연결객체, 전송할 쿼리)
if($pwd){ //비밀번호 입력한 경우
    mysqli_query($dbcon, $sql);
} else{ //비밀번호 입력하지 않은 경우
    mysqli_query($dbcon, $sql_nPwd);
};

// DB 종료
mysqli_close($dbcon);

// 페이지 이동
echo "
    <script type=\"text/javascript\">
        alert(\"수정되었습니다.\");
        location.href = \"member_info.php?g_idx=$g_idx\";
    </script>
    ";
?>