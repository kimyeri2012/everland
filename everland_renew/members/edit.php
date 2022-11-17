<?php

//세션
include "../inc/session.php";

//이전 페이지에서 값 가져오기


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



//값확인
// echo "<p> 비밀번호 : ".$pwd."<p>";
// echo "<p> 전화번호 : ".$mobile."<p>";
// echo "<p> 생년월일 : ".$birth."<p>";
// echo "<p> 이메일 : ".$email."<p>";
// echo "<p> 성별 : ".$gender."<p>";
// exit;

//DB 연결
include "../inc/dbcon.php";

//쿼리 작성

$sql="update members set pwd='$pwd', mobile='$mobile', birth = '$birth', email = '$email', ps_code = '$ps_code', addr_b = '$addr_b', addr_d = '$addr_d', gender = '$gender' where idx=$s_idx; ;" ;
$sql_nPwd= "update members set mobile='$mobile', birth = '$birth', email = '$email', ps_code = '$ps_code', addr_b = '$addr_b', addr_d = '$addr_d', gender = '$gender' where idx=$s_idx; ;" ;
// echo $sql;
// exit;

//쿼리 전송
if($pwd){ //비밀번호 입력한 경우
    mysqli_query($dbcon, $sql);
} else{ //비밀번호 입력하지 않은 경우
    mysqli_query($dbcon, $sql_nPwd);
};


//DB 접속 종료
mysqli_close($dbcon);



//마이페이지로 리디렉션

echo "
    <script type=\"text/javascript\">
        alert(\"수정되었습니다.\");
        location.href = \"mem_info.php\";
    </script>
    ";




?>