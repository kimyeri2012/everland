<?php 
include "../inc/session.php"; 
include "../inc/admin_check.php";

$n_idx=$_GET["n_idx"];

include "../inc/dbcon.php";

$sql = "select * from notice where idx = $n_idx;";

$result=mysqli_query($dbcon, $sql);

$array=mysqli_fetch_array($result);

mysqli_close($dbcon);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERLAND</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/write.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="slick-1.8.1/slick/slick.js"></script>
    <script>
        function remove_notice(){
            var ck = confirm("정말 삭제하시겠습니까?");
            if(ck){
                location.href="n_delete.php?n_idx=<?php echo $n_idx; ?>";
            };
        };
    </script>

</head>
<body>
<header id="header" class="header">
    <h1 class="ADMIN"><a href="../index.php">ADMIN</a></h1>
        <ul>
            <li><a href="../members/m_list.php">회원관리</a></li>
            <li class="home"><a href="n_list.php">공지사항</a></li>
            <li><a href="#">일반예약</a></li>
            <li><a href="#">학생예약</a></li>
            <li><a href="#">단체예약</a></li>
        </ul>
        

</header>
    <div class="sub_header">
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
                    <li class="user_lang"><a href="#">언어선택</a></li>
                    <li class="user_log"><a href="login/logout.php">로그아웃</a></li>
                    <li class="user_join"><a href="members/mypage.php">마이페이지</a></li>
                </ul>
                <span class="pnt_name"><strong><?php echo $s_name; ?></strong>님, 안녕하세요. </span>
            </div>
            
            <!-- <a href="admin/index.php">[관리자 페이지]</a>
            <a href="login/logout.php">로그아웃</a>
            <a href="members/mem_info.php">내정보</a> -->
            
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
        </div>

    <form name="notice_form" action="edit.php?n_idx=<?php echo $n_idx; ?>" method="post" enctype="multipart/form-data" onsubmit="return notice_check()">
        <fieldset>
            <legend>공지사항</legend>
            <div class="writer">
                <label for="type">작성자</label>
                 <?php echo $s_name; ?>
                <!-- <input type="hidden"> -->
            </div>

            <div class="type">
                <label for="type">구분</label>
                <!-- <input type="text" name="type" id="type"> -->
                <select name="type" id="type" >
                    <!--select 값 자동 선택 -->
                    <option value="전체"<?php if($array["type"]=='전체') echo "selected";?>>전체</option>
                    <option value="공지"<?php if($array["type"]=='공지') echo "selected";?>>공지</option>
                </select>
            </div>

            <div class="n_title">
                <label for="n_title">제목</label>
                <input type="text" name="n_title" id="n_title" value="<?php echo $array["n_title"];?>">
            </div>


            <div class="n_content">
                <label for="n_content">내용</label>
                <textarea cols="60" rows="10" name="n_content" id="n_content" ><?php echo $array["n_content"];?></textarea>
            </div>
            <div class="up_file">
                <label for="up_file">첨부파일</label>
                <a href="../../data/<?php echo $array["f_name"]; ?>" download=" = "<?php echo $array["f_name"];?>>
                    <?php echo $array["f_name"];?>
                </a>
                <input type="file" name="up_file" id="up_file">
                
            </div>

            <div class="bottom">
                <button type="button" class="cancle" onclick="history.back()">취소</button>
                <button type="submit">수정</button>
                <button type="button" onclick="remove_notice()">삭제</button>
            </div>
        </fieldset>
    </form>
    
</body>
</html>