<?php
include "inc/session.php";
include "inc/admin_check.php";
 
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERLAND</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/ad_main.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../slick-1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../slick-1.8.1/slick/slick.js"></script>

    <script type="text/javascript">

    </script>
</head>

<body>
    <header id="header" class="header">
        <h1 class="ADMIN"><a href="index.php">ADMIN</a></h1>
        <ul>
            <li><a href="members/m_list.php">회원관리</a></li>
            <li><a href="notice/n_list.php">공지사항</a></li>
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
                <li class="user_join"><a href="members/new_join.php">회원가입</a></li>
                <li class="user_log"><a href="login/login.php">로그인</a></li>
            </ul>
        </div>
        <?php } else if($s_idx==1){ ?>
        <!-- 관리자 로그인 -->
        <div class="user_mu">
            <h2 class="hide">사용자 메뉴 </h2>
            
            <ul>
                <li class="user_lang"><a href="../index.php">홈으로</a></li>
                <li class="user_log"><a href="login/logout.php">로그아웃</a></li>
                <li class="user_join"><a href="members/mypage.php">마이페이지</a></li>
            </ul>
            <span class="pnt_name"><strong><?php echo $s_name; ?></strong>님, 안녕하세요. </span>
        </div>
        
        <?php }else{ ?>
        <!-- 로그인 후 -->
        <div class="user_mu">
            <h2 class="hide">사용자 메뉴 </h2>
            <ul>
                <li class="user_lang"><a href="#">언어선택</a></li>
                <li class="user_log"><a href="login/logout.php">로그아웃</a></li>
                <li class="user_join"><a href="members/mypage.php">마이페이지</a></li>
            </ul>
            <span class="pnt_name"><strong><?php echo $s_name; ?></strong>님, 안녕하세요. </span>

        </div>

        <?php }; ?>

    </main>

</body>

</html>