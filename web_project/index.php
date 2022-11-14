<?php
include "inc/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>인덱스</title>
    <style>
        body{font-size:20px}
        .pnt_name{margin-right:15px}
        a{text-decoration:none;margin:0 5px}
    </style>
</head>
<body>
    <div class="top_menu">
        <!-- <?php 
        /* if(/ *로그인이 되지 않았다면* /){
            echo "
                <!-- 로그인 전 -->
                <a href=\"login/login.php\">로그인</a>
                <a href=\"members/join.php\">회원가입</a> 
            ";
        } else{
            echo "
                <!-- 로그인 후 -->
                <span class=\"pnt_name\">안녕하세요, OO님</span>
                <a href=\"login/logout.php\">로그아웃</a>
                <a href=\"members/edit.php\">내정보</a>
            ";
        }; */
        ?> -->

        <?php if(!$s_idx){ ?>
        <!-- 로그인 전 -->
        <a href="login/login.php">로그인</a>
        <a href="members/join.php">회원가입</a> 
        <?php } else if($s_id == "admin"){ ?>
        <!-- 관리자 로그인 -->
        <span class="pnt_name"><?php echo $s_name; ?>님, 안녕하세요. </span>
        <a href="admin/index.php">[관리자 페이지]</a>
        <a href="login/logout.php">로그아웃</a>
        <a href="members/member_info.php">내 정보</a>
        <?php } else{ ?>
        <!-- 로그인 후 -->
        <span class="pnt_name"><?php echo $s_name; ?>님, 안녕하세요. </span>
        <a href="login/logout.php">로그아웃</a>
        <a href="members/member_info.php">내 정보</a>
        <?php }; ?>
    </div>
    <hr>
    <h1>* 로고 *</h1>
    <hr>
    <div class="nav">
        <a href="./">[홈으로]</a>
        <a href="notice/list.php">[공지사항]</a>
    </div>
    <hr>
    <h2>* 메인 페이지</h2>
    <p>content</p>
</body>
</html>