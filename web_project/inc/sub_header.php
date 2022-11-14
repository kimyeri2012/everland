<?php if($s_id=="admin"){ ?>
 <hr>
    <div class="top_menu">
        <span class="pnt_name">관리자님, 안녕하세요. </span>
        <a href="../login/logout.php">로그아웃</a>
        <a href="../members/mem_info.php">내정보</a>
        <a href="../../index.php">홈페이지</a>
    </div>
    <hr>
<?php }else{ ?>
    <a href="../login/login.php">로그인</a>
    <a href="../members/join.php">회원가입</a>
    
    <hr>
    <h1>* 로고*</h1>
    <div class="nav">
        <a href="../">[홈으로]</a>
        <a href="../notice/list.php">[공지사항]</a>
    </div>
    <hr>
<?php }; ?>