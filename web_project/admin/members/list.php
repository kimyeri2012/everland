<?php
include "../inc/session.php";
include "../inc/login_check.php";

// DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select * from members;";

// 쿼리 전송
$result = mysqli_query($dbcon, $sql);

// 전체 데이터 가져오기
$total = mysqli_num_rows($result);

// paging : 한 페이지 당 보여질 목록 수
$list_num = 5;

// paging : 한 블럭 당 페이지 수
$page_num = 3;

// paging : 현재 페이지
$page = isset($_GET["page"])? $_GET["page"] : 1;

// paging : 전체 페이지 수 = 전체 데이터 / 페이지 당 목록 수,  ceil : 올림값, floor : 내림값, round : 반올림
$total_page = ceil($total / $list_num);
// echo "전체 페이지수 : ".$total_page;
// exit;

// paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수
$total_block = ceil($total_page / $page_num);

// paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수
$now_block = ceil($page / $page_num);

// paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭 번호 - 1) * 블럭 당 페이지 수 + 1
$s_pageNum = ($now_block - 1) * $page_num + 1;
if($s_pageNum <= 0){
    $s_pageNum = 1;
};

// paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수
$e_pageNum = $now_block * $page_num;
// 블럭 당 마지막 페이지 번호가 전체 페이지 수를 넘지 않도록
if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
};

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원관리</title>
    <style>
        body{font-size:20px}
        a{text-decoration:none;margin:0 5px}

        table, td{
            border-collapse:collapse
        }
        th, td, .pager{
            padding:10px;
            font-size:16px;
            text-align:center
        }
        .mem_list_set, .pager{
            width:1440px
        }
        .mem_list_title{
            border-top:2px solid #999;
            border-bottom:1px solid #999
        }
        .mem_list_content{
            border-bottom:1px solid #999;
        }
        .no{width:40px}
        .u_name{width:60px}
        .u_id{width:100px}
        .mobile{width:120px}
        .birth{width:100px}
        .email{width:180px}
        .address{width:360px}
        .gender{width:40px}
        .reg_date{width:120px}
        .modify{width:120px}

        table a:hover{color:rgb(255, 128, 0)}
    </style>
    <script>
        function mem_del(g_no){
            var rtn_val = confirm("정말 삭제하시겠습니까?");
            if(rtn_val == true){
                location.href = "member_delete.php?g_idx=" + g_no;
            };
        };
    </script>
</head>
<body>
    <?php include "../inc/sub_header.html"; ?>
    
    <!-- 콘텐트 -->
    <p>전체 회원수 <?php echo $total; ?>명</p>
    <table class="mem_list_set">
        <tr class="mem_list_title">
            <th class="no">번호</th>
            <th class="u_name">이름</th>
            <th class="u_id">아이디</th>
            <th class="mobile">전화번호</th>
            <th class="birth">생년월일</th>
            <th class="email">이메일</th>
            <th class="address">주소</th>
            <th class="gender">성별</th>
            <th class="reg_date">가입일</th>
            <td class="modify">관리</td>
        </tr>
        <?php
            // paging : 해당 페이지의 글 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 목록 수
            $start = ($page - 1) * $list_num;

            // paging : 시작번호부터 페이지 당 보여질 목록수 만큼 데이터 구하는 쿼리 작성
            // limit 몇번부터, 몇 개
            $sql = "select * from members limit $start, $list_num;";
            // echo $sql;
            /* exit; */

            // DB에 데이터 전송
            $result = mysqli_query($dbcon, $sql);

            // DB에서 데이터 가져오기
            // pager : 글번호
            $i = $start + 1;
            while($array = mysqli_fetch_array($result)){
        ?>
        <tr class="mem_list_content">
            <td><?php echo $i; ?></td>
            <td><?php echo $array["u_name"]; ?></td>
            <td><?php echo $array["u_id"]; ?></td>
            <?php
            // $mobile = "00011112222";
            /* $mobile = strval($array["mobile"]);
            $mobile1 = substr($mobile, 0, 3);
            $mobile2 = substr($mobile, 3, -4);
            $mobile3 = substr($mobile, -4);
            $mobile = $mobile1."-".$mobile2."-".$mobile3;
            echo "<td>".$mobile."</td>";  */
            ?>
            <td><?php echo $array["mobile"]; ?></td>
            <td><?php echo $array["birth"]; ?></td>
            <td><?php echo $array["email"]; ?></td>
            <?php
                $address = $array["ps_code"]." ".$array["addr_b"]." ".$array["addr_d"];
            ?>
            <td><?php echo $address; ?></td>
            <td><?php echo $array["gender"]; ?></td>
            <?php
                /* $reg_date = substr($array["reg_date"], 0, 10);
                echo "
                <td>$reg_date; </td>
                "; */
            ?>
            <td><?php echo $array["reg_date"]; ?></td>
            <td>
                <a href="member_info.php?g_idx=<?php echo $array["idx"]; ?>">[수정]</a>
                <a href="#" onclick="mem_del(<?php echo $array['idx']; ?>)">[삭제]</a>
            </td>
        </tr>
        <?php
                $i++;
            }; 
        ?>
    </table>
    <p class="pager">
    <?php
    // pager : 이전 페이지
    if($page <= 1){
    ?>
    <a href="list.php?page=1">이전</a>
    <?php } else{ ?>
    <a href="list.php?page=<?php echo ($page - 1); ?>">이전</a>
    <?php }; ?>

    <?php
    // pager : 페이지 번호 출력
    for($print_page = $s_pageNum;  $print_page <= $e_pageNum; $print_page++){
    ?>
    <a href="list.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
    <?php }; ?>

    <?php
    // pager : 다음 페이지
    if($page >= $total_page){
    ?>
    <a href="list.php?page=<?php echo $total_page; ?>">다음</a>
    <?php } else{ ?>
    <a href="list.php?page=<?php echo ($page + 1); ?>">다음</a>
    <?php }; ?>
    </p>
</body>
</html>