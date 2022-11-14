<?php
//데이터 가져오기-post 방식 활용, 이전페이지에서 hidden 필드 사용
// $g_idx=$post["g_idx"];
//<input type="hidden" name="g_idx", value="<?php echo $array["idx"]; ?.> ">

////데이터 가져오기-get 방식 활용, 페이지 경로에 
$g_idx = $_GET["g_idx"];

//세션 필요 없음

//DB 연결
include "../../inc/dbcon.php";

//쿼리 작성
$sql="delete from members where idx=$g_idx;";  //-세션 활용 

//쿼리 전송
mysqli_query($dbcon,$sql);

//DB종료
mysqli_close($dbcon);

// //세션 삭제 - 회원 삭제시 계속 로그인하기 때문에 절대 작성 x
// unset($_SESSION["s_idx"]); xxxxxxxx
// unset($_SESSION["s_name"]);xxxxxxxxxxx
// unset($_SESSION["s_id"]); xxxxxxxxx

//페이지 이동
echo"
    <script type=\"text/javascript\">
        alert(\"정상 처리 되었습니다.\");
        location.href = \"list.php\";
    </script> 
    ";
?>