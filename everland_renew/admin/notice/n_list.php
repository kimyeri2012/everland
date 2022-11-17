<?php
include "../inc/session.php";

include "../inc/login_check.php";

include "../inc/dbcon.php";

//쿼리 작성
$sql="select * from notice;"; //세션 변수 사용 -> 로그인한 사용자의 모든 데이터
// echo $sql;
// exit;
//쿼리 실행
$result = mysqli_query($dbcon, $sql);

//DB에서 데이터 가져오기
// array fetch 사용
$total = mysqli_num_rows($result);

// paging : 한 페이지 당 보여질 목록 수
$list_num = 7;

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
    <title>공지사항</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/n_list.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/slick-1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/slick-1.8.1/slick/slick.js"></script>
</head>
<body>
    <header id="header" class="header">
        <h1 class="ADMIN"><a href="../index.php">ADMIN</a></h1>
            <ul>
                <li><a href="../members/m_list.php">회원관리</a></li>
                <li class="home"><a href="./n_list.php">공지사항</a></li>
                <li><a href="#">일반예약</a></li>
                <li><a href="#">학생예약</a></li>
                <li><a href="#">단체예약</a></li>
            </ul>
    </header>
    <main>
    <?php if(!$s_idx){ ?>
        <!-- 로그인 전 -->
        <div class="user_mu">
            <h2 class="hide">사용자 메뉴 </h2>
            <ul>
                <li class="user_lang"><a href="#">언어선택</a></li>
                <li class="user_join"><a href="new_join.php">회원가입</a></li>
                <li class="user_log"><a href="../login/login.php">로그인</a></li>
                
            </ul>
        </div>
        <?php } else if($s_idx==1){ ?>
        <!-- 관리자 로그인 -->
        <div class="user_mu">
            <h2 class="hide">사용자 메뉴 </h2>
            <ul>
                <li class="user_lang"><a href="#">언어선택</a></li>
                <li class="user_log"><a href="../login/logout.php">로그아웃</a></li>
                <li class="user_join"><a href="#">마이페이지</a></li>
            </ul>
            <span class="pnt_name"><?php echo $s_name; ?>님, 안녕하세요. </span>
        </div>

        <?php }else{ ?>
        <!-- 로그인 후 -->

        <div class="user_mu">
            <h2 class="hide">사용자 메뉴 </h2>
            <ul>
                <li class="user_lang"><a href="#">언어선택</a></li>
                <li class="user_log"><a href="../login/logout.php">로그아웃</a></li>
                <li class="user_join"><a href="mypage.php">마이페이지</a></li>
            </ul>
            <span class="pnt_name"><?php echo $s_name; ?>님, 안녕하세요. </span>
        </div>
        <?php }; ?>

        <table class="notice_list">
            <!-- <h2>회원관리</h2> -->
            <span class="total">전체 <?php echo $total; ?>개</span>
            <span><a href="write.php">[글쓰기]</a></span>
            <tr class="notice_list_title">
                <th class="no">번호</th>
                <th class="type">구분</th>
                <th class="n_title">제목</th>
                <th class="w_date">날짜</th>
                <th class="writer">작성자</th>
                <th class="cnt">조회수</th>
                <th class="modify">관리</th>
            </tr>
            <?php
            // paging : 해당 페이지의 글 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 목록 수
            $start = ($page - 1) * $list_num;

            // paging : 시작번호부터 페이지 당 보여질 목록수 만큼 데이터 구하는 쿼리 작성
            // limit 몇번부터, 몇 개
            $sql = "select * from notice order by idx desc limit $start, $list_num;";
            // echo $sql;
            /* exit; */

            // DB에 데이터 전송
            $result = mysqli_query($dbcon, $sql);

            // DB에서 데이터 가져오기
            // pager : 글번호(역순)
            // 전체데이터 - ((현재 페이지 번호 -1) * 페이지 당 목록 수)
            $i = $total - (($page - 1) * $list_num);
            while($array = mysqli_fetch_array($result)){
        ?>
        <tr class="notice_list_content">
            <td><?php echo $i; ?></td>
            <td><?php echo $array["type"]; ?></td>
            <td class="notice_content_title">
                <a href="view.php?n_idx=<?php echo $array["idx"]; ?>">
                <?php echo $array["n_title"]; ?>
                </a>
            </td>
            <?php $w_date = substr($array["w_date"], 0, 10); ?>
            <td><?php echo $w_date; ?></td>
            <td><?php echo $array["writer"]; ?></td>
            <td><?php echo $array["cnt"]; ?></td>
            <td>
                <a href="modify.php?n_idx=<?php echo $array["idx"]; ?>">[수정]</a>
                <a href="#" onclick="remove_notice(<?php echo $array["idx"]; ?>)">[삭제]</a>
            </td>
        </tr>
        <?php
                $i--;
            }; 
        ?>

        </table>
        <p class="pager">
        <?php
        // pager : 이전 페이지
        if($page <= 1){
        ?>
        <a href="n_list.php?page=1">이전</a>
        <?php } else{ ?>
        <a href="n_list.php?page=<?php echo ($page - 1); ?>">이전</a>
        <?php }; ?>

        <?php
        // pager : 페이지 번호 출력
        for($print_page = $s_pageNum;  $print_page <= $e_pageNum; $print_page++){
        ?>
        <a href="n_list.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
        <?php }; ?>

        <?php
        // pager : 다음 페이지
        if($page >= $total_page){
        ?>
        <a href="n_list.php?page=<?php echo $total_page; ?>">다음</a>
        <?php } else{ ?>
        <a href="n_list.php?page=<?php echo ($page + 1); ?>">다음</a>
        <?php };
        mysqli_close($dbcon);   
        ?>
        </p>

    </main>
    
</body>
</html>