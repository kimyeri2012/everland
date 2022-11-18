<?php
// 작성자 입력을 위한 session 가져오기
include "../inc/session.php";

// 이전 페이지에서 값 가져오기
$n_idx = $_GET["n_idx"];
$n_title = $_POST["n_title"];
$n_content = $_POST["n_content"];
$w_date = date("Y-m-d");

//파일 업로드
if($_FILES["up_file"]["size"]>0){ //파일이 있다면
    $tmp_name = $_FILES["up_file"]["tmp_name"];
    $f_name = $_FILES["up_file"]["name"];
    $up= move_uploaded_file($tmp_name, "../../data/$f_name");

    $f_type = $_FILES["up_file"]["type"];
    $f_size = $_FILES["up_file"]["size"];

    // 작성일자

    // 쿼리 작성
    $sql = "update notice set ";
    $sql .= "n_title='$n_title',";
    $sql .= "n_content='$n_content',";
    $sql .= "w_date='$w_date',";
    $sql .= "f_name='$f_name',";
    $sql .= "f_type='$f_type',";
    $sql .= "f_size='$f_size' ";
    $sql .= "where idx=$n_idx;";
    // echo $sql;
    // exit; 
}else{

    // 쿼리 작성
    $sql = "update notice set ";
    $sql .= "n_title='$n_title',";
    $sql .= "n_content='$n_content',";
    $sql .= "w_date ='$w_date' ";
    $sql .= "where idx=$n_idx;";
    // echo $sql;
    // exit; 

}


// 값 확인
/* echo "<p> idx : ".$n_idx."</p>";
echo "<p> 제목 : ".$n_title."</p>";
echo "<p> 내용 : ".$n_content."</p>";
echo "<p> 가입일 : ".$w_date."</p>";
exit; */

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
// $sql = "update notice set ";
// $sql .= "n_title='$n_title',";
// $sql .= "n_content='$n_content',";
// $sql .= "w_date='$w_date' ";
// $sql .= "where idx=$n_idx;";
/* echo $sql;
exit; */

// 데이터베이스에 쿼리 전송
mysqli_query($dbcon, $sql);

// DB 접속 종료
mysqli_close($dbcon);

// 리디렉션
echo "
    <script type=\"text/javascript\">
        alert(\"수정되었습니다.\");
        location.href = \"modify.php?n_idx=$n_idx\";
    </script>
    ";
?>