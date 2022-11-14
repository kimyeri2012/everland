<?php
// 이전 페이지에서 값 가져오기
$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$pwd = $_POST["pwd"];
$mobile = $_POST["mobile"];
$email_id = $_POST["email_id"];
$email_dns = $_POST["email_dns"];
$email = $email_id."@".$email_dns;
$birth = $_POST["birth"];
$ps_code = $_POST["ps_code"];
$addr_b = $_POST["addr_b"];
$addr_d = $_POST["addr_d"];
$addr = $ps_code." ".$addr_b." ".$addr_d;
$gender = $_POST["gender"];
$apply = $_POST["apply"];

// 시간 구하기
$reg_date = date("Y-m-d");

// 값 확인
/* echo "<p> 이름 : ".$u_name."</p>";
echo "<p> 아이디 : ".$u_id."</p>";
echo "<p> 비밀번호 : ".$pwd."</p>";
echo "<p> 전화번호 : ".$mobile."</p>";
echo "<p> 이메일 : ".$email."</p>";
echo "<p> 생년월일 : ".$birth."</p>";
echo "<p> 우편번호 : ".$ps_code."</p>";
echo "<p> 기본주소 : ".$addr_b."</p>";
echo "<p> 상세주소 : ".$addr_d."</p>";
echo "<p> 성별 : ".$gender."</p>";
echo "<p> 가입일 : ".$reg_date."</p>"; */


// DB 연결
/* $dbcon = mysqli_connect("호스트", "사용자", "비밀번호");
mysqli_select_db($dbcon, "DB명"); */

// $dbcon = mysqli_connect("호스트", "사용자", "비밀번호", "DB명");
// $dbcon = mysqli_connect("localhost", "root", "1234", "front");

// $dbcon = mysqli_connect("호스트", "사용자", "비밀번호", "DB명") or die("DB 접속 실패 시 출력될 메세지");
// $dbcon = mysqli_connect("localhost", "root", "1234", "front") or die("접속에 실패하였습니다.");

/* $dbcon = mysqli_connect("localhost", "root", "", "front") or die("접속에 실패하였습니다.");
mysqli_set_charset($dbcon, "utf8"); */

include "../inc/dbcon.php";


// 쿼리 작성
/* "insert into members(u_name, u_id, pwd,mobile, birth, email,ps_code, addr_b, addr_d,gender, reg_date) values('$u_name', '$u_id', '$pwd','$mobile', '$birth', '$email','$ps_code', '$addr_b', '$addr_d','$gender', '$reg_date');" */


/* "insert into members(u_name, u_id, pwd,mobile, birth, email,ps_code, addr_b, addr_d,gender, reg_date) values
('".$u_name."', 
'".$u_id."', 
'".$pwd."',
'".$mobile."', 
'".$birth."', 
'".$email."',
'".$ps_code."', 
'".$addr_b."', 
'".$addr_d."',
'".$gender."', 
'".$reg_date."');" */


/* insert into members(u_name, u_id, pwd,mobile, birth, email,ps_code, addr_b, addr_d,gender, reg_date) values('홍길동', 'hong', '1111','01022223333', '20211130', 'hong@abc.com','23232', '서울시 서초구 서초대로', '100길','남', '2022-10-31'); */


/* insert into members(u_name, u_id, pwd,mobile, birth, email,ps_code, addr_b, addr_d,gender, reg_date) values('$u_name', '$u_id', '$pwd','$mobile', '$birth', '$email','$ps_code', '$addr_b', '$addr_d','$gender', '$reg_date'); */


$sql = "insert into members(";
$sql .= "u_name, u_id, pwd, ";
$sql .= "mobile, birth, email, ";
$sql .= "ps_code, addr_b, addr_d,";
$sql .= "gender, reg_date";
$sql .= ") values(";
$sql .= "'$u_name', '$u_id', '$pwd',";
$sql .= "'$mobile', '$birth', '$email',";
$sql .= "'$ps_code', '$addr_b', '$addr_d',";
$sql .= "'$gender', '$reg_date');";

// echo $sql;

// 데이터베이스에 쿼리 전송
// mysqli_query("DB 연결객체", "전송할 쿼리");
mysqli_query($dbcon, $sql);


// DB 접속 종료
// mysqli_close("연결객체");
mysqli_close($dbcon);

// 리디렉션
echo "
    <script type=\"text/javascript\">
        // location.href = \"이동할 페이지 주소\";
        location.href = \"welcome.php\";
    </script>
    ";

/* echo `
    <script type="text/javascript">
        // location.href = "이동할 페이지 주소";
        location.href = "welcome.php";
    </script>
    `; */
?>

<!-- 리디렉션 -->
<!-- <script type="text/javascript">
    // location.href = "이동할 페이지 주소";
    location.href = "welcome.php";
</script> -->