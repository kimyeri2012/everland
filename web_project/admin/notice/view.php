<?php
include "../inc/session.php";

// 데이터 가져오기
$n_idx = $_GET["n_idx"];

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select * from notice where idx=$n_idx;";
/* echo $sql;
exit; */

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// DB에서 데이터 가져오기
$array = mysqli_fetch_array($result);

// 조회수 업데이트
$cnt = $array["cnt"]+1;
/* echo $cnt;
exit; */
$sql = "update notice set cnt = $cnt where idx = $n_idx;";
/* echo $sql;
exit; */
mysqli_query($dbcon, $sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항</title>
    <style>
        body{font-size:20px}
        a{text-decoration:none;margin:0 5px}
        table, td{border-collapse:collapse}
        th, td{padding:10px}
        .notice_list_set{width:860px}
        .notice_list_title{
            border-top:2px solid #999;
            border-bottom:1px solid #999
        }
        .notice_view_content{border-bottom:1px solid #999}
        .notice_view_text{border-bottom:2px solid #999;}
        .v_title{width:60px;background:#eee}
        .v_content{width:500px;text-align:left;padding-left:20px}
        /* .v_text{height:200px} */

        .list{width:860px;text-align:center}

        a:hover{color:rgb(255, 128, 0)}

        .write_area{
            width:860px;
            display:flex;
            flex-direction:row-reverse
        }
    </style>
    <script>
        function remove_notice(){
            var ck = confirm("정말 삭제하시겠습니까?");
            if(ck){
                location.href="delete.php?n_idx=<?php echo $n_idx; ?>";
            };
        };
    </script>
</head>
<body>
    <?php include "../inc/sub_header.html"; ?>
    <!-- 콘텐트 -->
    <h2>공지사항</h2>
    <p class="write_area">
        <span><a href="write.php">[글쓰기]</a></span>
    </p>
    <table class="notice_list_set">
        <tr class="notice_list_title">
            <th class="v_title">제목</th>
            <td class="v_content"><?php echo $array["n_title"]; ?></td>
        </tr>
        <tr class="notice_view_content">
            <th class="v_title">작성자</th>
            <td class="v_content"><?php echo $array["writer"]; ?></td>
        </tr>
        <tr class="notice_view_content">
            <th class="v_title">날짜</th>
            <td class="v_content">
            <?php 
            $n_title = substr($array["n_title"], 0, 10);
            echo $n_title; 
            ?>
            </td>
        </tr>
        <tr class="notice_view_content">
            <th class="v_title">조회수</th>
            <td class="v_content"><?php echo $cnt; ?></td>
        </tr>
        <tr class="notice_view_text">
            <td colspan="2" class="v_text">
            <?php 
            // textarea의 엔터를 br로 변경
            // str_repalce("어떤 문자를", "어떤 문자로", "어떤 값에서");
            $n_content = str_replace("\n", "<br>", $array["n_content"]);
            $n_content = str_replace(" ", "&nbsp;", $n_content);
            echo $n_content; 
            ?>
            </td>
        </tr>
    </table>
    <p class="list">
        <a href="list.php">[목록]</a>
        <a href="modify.php?n_idx=<?php echo $n_idx; ?>">[수정]</a>
        <a href="#" onclick="remove_notice()">[삭제]</a>
    </p>
</body>
</html>