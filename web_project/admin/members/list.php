<?php
include "../inc/session.php";  // 관리자 로그인 권한 확인을 위한 세션 사용
include "../inc/login_check.php"; //관리자 로그인 권한 확인

//DB 연결
include "../inc/dbcon.php";

// 쿼리 작성
$sql = "select * from members;";

//쿼리 전송
$result = mysqli_query($dbcon, $sql);

//전체 데이터 가져오기
$total = mysqli_num_rows($result);

//paging :한 페이지 당 보여질 목록 수 
$list_num = 5;
//paging : 한 블록 당 페이지 수 
$page_num = 3;
//paging :  현재 페이지
$page = $_GET["page"];
$page = isset($page)? $page : 1; //처음은 무조건 1페이지 페이지 누르면 해당 페이지로 이동


//paging :전체 페이지 수 = 전체 데이터 / 페이지 당 목록 수, ceil : 올림값, floor : 내림값, round : 반올림
$total_page = ceil($total/$list_num);
// echo "전체 페이지 수: ".$total_page;


//paging : 전체 블록 수  = 전체 페이지 수 / 블록 당 페이지 수 
$total_block = ceil($total_page / $page_num);

//paging : 현재 블록 번호  = 전체 페이지 번호 / 블록 당 페이지 수
$now_block = ceil($page / $page_num);

//paging : 블록 당 시작 페이지 번호 = (해당 글의 블럭 번호 - 1)* 블록 당 페이지 수 +1
$s_pageNum = ($now_block - 1) * $page_num +1;
if($s_pageNum <=0){
    $s_pageNum = 1;
}

//paging : 블록 당 마지막 페이지 번호 = 현재 블록 번호 * 블록 당 페이지 수 
$e_pageNum = $now_block * $page_num;
//블록 당 마지막 페이지 번호가 전체 페이지 수를 넘지 않도록
if($e_pageNum> $total_page){
    $e_pageNum = $total_page;
}
//DB에서 데이터 가져오기

//DB종료
// exit;

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원관리</title>
    <style>
        table,
        td { border-collapse: collapse;}
        th,td { padding: 10px;}
        .mem_list_set {width: 1460px;}
        .mem_list_title,td { border-top: 2px solid #999;border-bottom: 1px solid #999; text-align: center;}
        .no { width: 40px;}
        .u_name {width: 80px;}
        .u_id {width: 120px;}
        .mobile {width: 160px;}
        .birth {width: 120px;}
        .email {width: 200px;}
        .address {width: 400px;}
        .gender {width: 40px;}
        .reg_date {width: 120px;}
        .modify {width: 120px;}
    </style>

    <script>
        function mem_del(g_no) {
            var rtn_val = confirm("정말 삭제하시겠습니까?");
            if (rtn_val == true) {

                location.href = "mem_delete.php?g_idx="+g_no; // 관리자에서 일반회원 
                // location.href="mem_delete.php"; // 일반 회원
            }
        }
    </script>
</head>

<body>
    <?php include "../inc/sub_header.php"; ?>

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
        // for($i=1;$i<=$total;$i++){

        //paging : 해당 페이지의 글 시작 번호 = (현제 페이지 번호 -1)* 페이지 당 보여질 목록 수 
        $start = ($page -1)*$list_num;
        
        //paging : 시작번호부터 페이지 당 보여질 목록 수 만큼 구하는 쿼리 작성
        //limit 몇번부터, 몇개
        $sql="select * from members limit $start, $list_num;";
        // echo $sql;
        // exit;
        //DB에 데이터 전송
        $result=mysqli_query($dbcon,$sql);
        //page 시작번호
        $i = $start+1;
        while ($array = mysqli_fetch_array($result)){



        ?>

            <tr class="mem_list_content">
                <td class="no"><?php echo $i ?></td>
                <td class="u_name"><?php echo $array["u_name"] ?></td>
                <td class="u_id"><?php echo $array["u_id"] ?></td>
                <td class="mobile"><?php echo $array["mobile"] ?></td>
                <td class="birth"><?php echo $array["birth"] ?></td>
                <td class="email"><?php echo $array["email"] ?></td>
                <?php
                $address = $array["ps_code"] . " " . $array["addr_b"] . " " . $array["addr_d"];
                ?>
                <td class="address"><?php echo $address; ?></td>
                <td class="gernder"><?php echo $array["gender"] ?> </td>
                <td class="reg_date"><?php echo $array["reg_date"] ?></td>
                <td>
                    <a href="mem_info.php?g_idx=<?php echo $array["idx"]; ?>">[수정]</a>
                    <a href="#" onclick="mem_del(  <?php echo $array['idx']; ?>)">[삭제]</a>
                </td>
            </tr>
        <?php
            // DB 커서를 다음 줄로 이동
            $i++;
        } ?>

    </table>
    <p class="pager">
    <?php
    //pager:이전 페이지
    if($page <= 1){
    ?>
    <a href="list.php?page=1">이전</a>
    <?php } else{?>
    <a href="list.php?page=<?php echo ($page-1);?>">이전</a>
    <?php };?>


    <?php
    //pager : 페이지 번호 출력
    for($print_page = $s_pageNum; $print_page <=$e_pageNum; $print_page++){
    ?>
    <a href="list.php?page=<?php echo $print_page;?>"><?php echo $print_page;?></a>
    <?php };?>


    <?php
    //pager:다음 페이지
    if($page >= $total_page){
    ?>
    <a href="list.php?page=1">다음</a>
    <?php } else{?>
    <a href="list.php?page=<?php echo ($page+1);?>">다음</a>
    <?php };?>

    </p>

</body>

</html>