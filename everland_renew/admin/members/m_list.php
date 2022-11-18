<?php
include "../inc/session.php";

include "../inc/login_check.php";

include "../inc/dbcon.php";

//쿼리 작성
$sql="select * from members;"; //세션 변수 사용 -> 로그인한 사용자의 모든 데이터
// echo $sql;
// exit;
//쿼리 실행
$result = mysqli_query($dbcon, $sql);

//DB에서 데이터 가져오기
// array fetch 사용
$total = mysqli_num_rows($result);

// paging : 한 페이지 당 보여질 목록 수
$list_num = 6;

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

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/m_list.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/slick-1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/slick-1.8.1/slick/slick.js"></script>
    <script>
        function mem_del(re){
            var rtn_val = confirm("정말 삭제하시겠습니까?");
            if(rtn_val){
                location.href ="m_delete.php?g_idx="+ re;
            };
        };
    </script>

</head>
<body>
    <header id="header" class="header">
        <h1 class="ADMIN"><a href="../index.php">ADMIN</a></h1>
            <ul>
                <li class="home"><a href="./m_list.php">회원관리</a></li>
                <li><a href="../notice/n_list.php">공지사항</a></li>
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
                <li class="user_lang"><a href="../../index.php">홈으로</a></li>
                <li class="user_log"><a href="../login/logout.php">로그아웃</a></li>
            </ul>
            <span class="pnt_name"><strong><?php echo $s_name; ?></strong>님, 안녕하세요. </span>
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

        <table class="mem_list">
            <!-- <h2>회원관리</h2> -->
            <span class="total">전체 <?php echo $total; ?>개</span>
            <tr class="mem_list_title">
                <th class="no">번호</th>
                <th class="u_name">이름</th>
                <th class="u_id">아이디</th>
                <th class="mobile">전화번호</th>
                <th class="birth">생년월일</th>
                <th class="email">이메일</th>
                <th class="addr">주소</th>
                <th class="gender">성별</th>
                <th class="reg_date">가입일</th>
                <th class="modify">관리</th>
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
                    <td><?php echo $i?></td>
                    <td><a href="m_info.php?g_idx=<?php echo $array["idx"];?>"><?php echo $array["u_name"]?></a></td>
                    <td><?php echo $array["u_id"]?></td>
                    <td><?php echo $array["mobile"]?></td>
                    <td><?php echo $array["birth"]?></td>
                    <td><?php echo $array["email"]?></td>
                    <?php 
                        $addr= $array["ps_code"]." ".$array["addr_b"]." ".$array["addr_d"];
                    ?>
                    <td><?php echo $addr; ?></td>
                    <td><?php echo $array["gender"]?></td>
                    <?php $reg_date = substr($array["reg_date"], 0, 10); ?>
                    <td><?php echo $reg_date?></td>
                    <td>
                        <a href="m_info.php?g_idx=<?php echo $array["idx"];?>" class="edit">[수정] </a>
                        <a class="delete" href="#"  onclick="mem_del(<?php echo $array["idx"]; ?>)" > [삭제]</a>
                    </td>
            </tr>
        <?php 
            $i++;

            }    
            //db 종료
            
        ?>

        </table>
        <p class="pager">
        <?php
        // pager : 이전 페이지
        if($page <= 1){
        ?>
        <a href="m_list.php?page=1">이전</a>
        <?php } else{ ?>
        <a href="m_list.php?page=<?php echo ($page - 1); ?>">이전</a>
        <?php }; ?>

        <?php
        // pager : 페이지 번호 출력
        for($print_page = $s_pageNum;  $print_page <= $e_pageNum; $print_page++){
        ?>
        <a href="m_list.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
        <?php }; ?>

        <?php
        // pager : 다음 페이지
        if($page >= $total_page){
        ?>
        <a href="m_list.php?page=<?php echo $total_page; ?>">다음</a>
        <?php } else{ ?>
        <a href="m_list.php?page=<?php echo ($page + 1); ?>">다음</a>
        <?php };
        mysqli_close($dbcon);   
        ?>
        </p>



        
    </main>
</body>

</html>