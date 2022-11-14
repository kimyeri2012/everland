<?php
// 세션 시작
session_start();

// 데이터 가져오기
$u_id = $_POST["u_id"];
$pwd = $_POST["pwd"];
// echo $u_id." / ".$pwd;

// DB 연결
include "../../inc/dbcon.php";

// 쿼리 작성
// select u_id, pwd from members where u_id='$u_id';
$sql = "select idx, u_name, u_id, pwd from members where u_id='$u_id';";
// echo $sql;

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// DB에서 데이터 가져오기
// mysqli_fetch_row("전송한 쿼리"); // 컬럼 순서
/* $row = mysqli_fetch_row($result);
echo $row[1]; */

// mysqli_fetch_array("전송한 쿼리"); // 컬럼 이름
/* $array = mysqli_fetch_array($result);
echo $array["pwd"]; */

// mysqli_num_rows("전송한 쿼리"); // 전체 데이터 수
$num = mysqli_num_rows($result);
// echo $num;

// 조건 처리
if(!$num){ // 일치하는 아이디가 없다면
    // 메세지 출력 후 이전 페이지로 이동
    echo "
        <script type=\"text/javascript\">
            alert(\"일치하는 아이디가 없습니다.\");
            // location.href = \"login.php\";
            history.back();
        </script>
    ";

} else{// 일치하는 아이디가 존재하면
    // DB에서 사용자 정보 가져오기
    $array = mysqli_fetch_array($result);
    $g_pwd = $array["pwd"];

    if($pwd != $g_pwd){// 사용자가 입력한 비밀번호와 DB에서 가져온 비밀번호가 일치하지 않는다면
        // 메세지 출력 후 이전 페이지로 이동
        echo "
            <script type=\"text/javascript\">
                alert(\"비밀번호가 일치하지 않습니다.\");
                history.back();
            </script>
        ";
    } else{// 비밀번호가 일치한다면
        echo "
            <script type=\"text/javascript\">
                alert(\"로그인 되었습니다.\");
            </script>
        ";
        // 세션 변수 생성
        // $_SESSION["세션변수명"] = "저장할 값";
        $_SESSION["s_idx"] = $array["idx"];
        $_SESSION["s_name"] = $array["u_name"];
        $_SESSION["s_id"] = $array["u_id"];
        /* echo $_SESSION["s_idx"]." / ";
        echo $_SESSION["s_name"]." / ";
        echo $_SESSION["s_id"]; */
    };
};

// DB 종료
mysqli_close($dbcon);

// 페이지 이동
echo "
    <script type=\"text/javascript\">
        location.href=\"../index.php\";
    </script>
";
?>