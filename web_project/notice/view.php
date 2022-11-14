<?php
include "../inc/session.php";  // 관리자 로그인 권한 확인을 위한 세션 사용
//데이터 가져오기
$n_idx = $_GET["n_idx"];

//DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select * from notice where idx= $n_idx;";
// echo $sql;
// exit;

//쿼리 전송
$result = mysqli_query($dbcon, $sql);

//DB에서 데이터 가져오기
$array = mysqli_fetch_array($result);

//* 조회수 업데이트 * 
$cnt = $array["cnt"]+1;
// echo $cnt;
// exit;
//조회수 쿼리 작성
$sql = "update notice set cnt = $cnt where idx= $n_idx;";
// echo $sql;
// exit;

//조회수 쿼리 전송
mysqli_query($dbcon, $sql);

//DB종료
mysqli_close($dbcon);

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원관리</title>
    <style>
        table { border-collapse: collapse;}
        th{width: 50px;}
        th,td { padding: 10px;}
        .notice_list_set {width: 860px;}
        .notice_list_title,td { border-top: 2px solid #999;border-bottom: 1px solid #999; text-align: center;}
        .notice_view_title{border-top: 2px solid #999 ; border-bottom: 1px solid #999;}
        .notice_view_content{border-bottom: 1px solid #999;}
        .notice_view_text{border-bottom: 2px solid #999;}
        .v_title{width: 60px ;background-color:#eee;}
        .v_content{width: 500px; text-align: left;}
        .list{width:860px; text-align: center; padding-left: 20px;}
        .v_text{text-align: left;}

        <?php if($s_id =="admin"){?>
        .write_area{width:860px; display: flex; flex-direction: row-reverse;}
        <?php };?>
    </style>
    <script>
        function notice_del(){
            rtn_val=confirm("정말 삭제하시겠습니까?");
            if(rtn_val){
                location.href="delete.php?n_idx=<?php echo $n_idx; ?>";
            }
        }

    </script>
</head>

<body>
    
    <?php 
    include "../inc/sub_header.php";
    ?>
    <!-- <?php //include "../inc/sub_header.php"; ?> -->
    <h2>공지사항</h2>
    <!-- 콘텐트 -->
    <?php if($s_id =="admin"){?>
    <p class="write_area">
        <span><a href="write.php">[글쓰기]</a></span>
    </p>
    <?php }; ?>

    <table class="notice_list_set">
    <tr class="notice_view_title">
            <th class="v_title">제목</th>
            <td class="v_content"><?php echo $array["n_title"]?></td>
        </tr>
        <tr class="notice_view_content">
            <th class="v_title">작성자</th>
            <td class="v_content"><?php echo $array["writer"]?></td>
        </tr>
        <tr class="notice_view_content">
            <th class="v_title">날짜</th>
            <?php $w_date = substr($array["w_date"], 0, 10); ?>
            <td class="v_content"><?php echo $w_date?></td>
        </tr>
        <tr class="notice_view_content">
            <th class="v_title">조회수</th>
            <td class="v_content"><?php echo $array["cnt"]?></td>
        </tr>
        <tr class="notice_view_text">
            <td colspan="2" class="v_text">
                <?php
                //한줄로만 출력됨  --> textarea의 엔터를 br로 변경
                //str_replace("어떤문자를", "어떤 문자로","어느 값에서");
                $n_content = str_replace("\n","<br>", $array["n_content"]); 
                //띄어쓰기가 한칸만 인식 --> textarea의 스페이스를 &nbsp;로 변경
                $n_content = str_replace(" ", "&nbsp;", $n_content);  //변수 잘 보기!
                echo $n_content;
                ?>
            </td>
        </tr>

    </table>
    <p class="list">
        <a href="list.php">목록</a>
        <?php if($s_id =="admin"){?>
            <a href="modify.php?n_idx=<?php echo $n_idx; ?>">[수정]</a>
            <a href="#" onclick="notice_del()">[삭제]</a>
        <?php }; ?>
    </p>

</body>

</html>