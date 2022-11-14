<?php

//세션 시작
include "../inc/session.php";

//데이터 가져오기
// $g_idx=$_GET["g_idx"]; //관리자가 선택한 사용자 idx를 form action으로 전송
$g_idx=$_POST["g_idx"]; //관리자가 선택한 사용자 idx를 hidden 필드로 전송

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

//값 확인

// echo "<p> 비밀번호 : ".$pwd."</p>";
// echo "<p> 전화번호 : ".$mobile."</p>";
// echo "<p> 이메일 : ".$email."</p>";
// echo "<p> 생년월일 : ".$birth."</p>";
// echo "<p> 우편번호 : ".$ps_code."</p>";
// echo "<p> 기본주소 : ".$addr_b."</p>";
// echo "<p> 상세주소 : ".$addr_d."</p>";
// echo "<p> 성별 : ".$gender."</p>";
//DB 접속
include "../inc/dbcon.php";

//쿼리 작성

$sql = "update members set pwd='$pwd', mobile='$mobile',email='$email', birth='$birth', ps_code='$ps_code', addr_b='$addr_b', addr_d='$addr_d', gender='$gender' where idx='$g_idx';";

// echo $sql;
$sql_nPwd="update members set mobile='$mobile',email='$email', birth='$birth', ps_code='$ps_code', addr_b='$addr_b', addr_d='$addr_d', gender='$gender' where idx='$g_idx';";
// echo $sql_nPwd;

// 쿼리 전송
if($pwd){
    mysqli_query($dbcon,$sql);
}else{
    mysqli_query($dbcon,$sql_nPwd);
}
// DB종료
mysqli_close($dbcon);

//페이지 이동
echo "
    <script type=\"text/javascript\">
    alert(\"수정되었습니다.\");
    location.href=\"mem_info.php?g_idx=$g_idx\";
    </script>
";


?>