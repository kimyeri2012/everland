<?php
//데이터 가져오기
$n_idx = $_GET["n_idx"];


//데이터 가져오기 - 세션 활용
// include "../inc/session.php";

//DB연결 
include "../inc/dbcon.php";

//쿼리 작성
$sql = "delete from notice where idx=$n_idx;";

// echo $sql;
// exit;

//쿼리 전송
mysqli_query($dbcon, $sql);

//DB 종료
mysqli_close($dbcon);


echo "
    <script type=\"text/javascript\">
        alert(\"정상 처리되었습니다.\");
        location.href = \"list.php\";
    </script>
    ";
?>