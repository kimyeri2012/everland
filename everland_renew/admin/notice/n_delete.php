<?php
// 데이터 가져오기
$n_idx = $_GET["n_idx"];

// 데이터 가져오기 - 세션 활용
// include "../inc/session.php";

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
// delete from 테이블명 where 필드명='값';
$sql = "delete from notice where idx=$n_idx;";

// 쿼리 전송
mysqli_query($dbcon, $sql);

// DB 종료
mysqli_close($dbcon);

// 페이지 이동
echo "
    <script type=\"text/javascript\">
        alert(\"정상 처리되었습니다.\");
        location.href = \"n_list.php\";
    </script>
    ";
?>