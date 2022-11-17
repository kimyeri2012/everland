<?php
//이전 페이지에서 값 가져오기

$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$pwd = $_POST["pwd"];
$mobile = $_POST["mobile"];
$birth = $_POST["birth"];
$email_id = $_POST["email_id"];
$email_dns = $_POST["email_dns"];
$email = $email_id."@".$email_dns;
$ps_code = $_POST["ps_code"];
$addr_b = $_POST["addr_b"];
$addr_d = $_POST["addr_d"];
$addr = $ps_code." ".$addr_b." ".$addr_d;
$gender = $_POST["gender"];
$apply = $_POST["apply"];

$reg_date = date("Y-m-d");

// echo "<p> 이름 : ".$u_name."<p>";
// echo "<p> 아이디 : ".$u_id."<p>";
// echo "<p> 비밀번호 : ".$pwd."<p>";
// echo "<p> 전화번호 : ".$mobile."<p>";
// echo "<p> 생년월일 : ".$birth."<p>";
// echo "<p> 이메일 : ".$email."<p>";
// echo "<p> 성별 : ".$gender."<p>";
// echo "<p> 약관동의 : ".$apply."<p>";
// echo "<p> 날짜 : ".$reg_date."<p>";

//DB 연결
include "../inc/dbcon.php";

//쿼리 작성

$sql="insert into members(u_name, u_id, pwd, mobile, birth, email, ps_code, addr_b, addr_d, gender, reg_date) values('$u_name', '$u_id', '$pwd', '$mobile', '$birth', '$email', '$ps_code', '$addr_b', '$addr_d', '$gender', '$reg_date');" ;

// echo $sql;
// exit;

//쿼리 전송
mysqli_query($dbcon, $sql);

//DB 접속 종료
mysqli_close($dbcon);


//리디렉션

echo "
    <script type=\"text/javascript\">
        location.href=\"welcome.php\";
    </script>
    ";


?>