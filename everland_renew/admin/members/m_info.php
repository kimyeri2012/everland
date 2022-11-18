<?php
include "../inc/session.php";

$g_idx=$_GET["g_idx"];

include "../inc/login_check.php";

include "../inc/dbcon.php";

//쿼리 작성
$sql="select * from members where idx = '$g_idx';"; //세션 변수 사용 -> 로그인한 사용자의 모든 데이터
// echo $sql;
// exit;
//쿼리 실행
$result = mysqli_query($dbcon, $sql);

//DB에서 데이터 가져오기
// array fetch 사용
$array = mysqli_fetch_array($result);


// mysqli_close($dbcon);

?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/m_info.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/slick-1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/slick-1.8.1/slick/slick.js"></script>
    

    <script type="text/javascript">

        //이름입력x-> 이름 입력안내 메시지, 커서 표시
        function edit_form_check(){
            var pwd = document.getElementById("pwd");
            var re_pwd = document.getElementById("re_pwd");
            var mobile = document.getElementById("mobile");

            var pwd_len = pwd.value.length;

            if(pwd_len < 4 || pwd_len > 12){
                var txt = document.getElementById("err_pwd");
                txt.textContent="* 비밀번호는 4~8글자만 입력할 수 있습니다." 
                pwd.focus();
                return false; 
            }

            var pwd_con = re_pwd.value;

            if(pwd.value!=pwd_con){
                var txt = document.getElementById("err_re_pwd");
                txt.innerHTML="비밀번호와 일치하지 않습니다." 
                re_pwd.focus();
                return false; 
            }

            var reg = /^[0-9]+$/g;
            if(!reg.test(mobile.value)){
                var txt = document.getElementById("err_num");
                txt.innerHTML="전화번호는 숫자만 입력할 수 있습니다." 
                mobile.focus();
                return false; 
            }

        };

        function change_email(){
            var email_dns = document.getElementById("email_dns");
            var email_sel = document.getElementById("email_sel");
            var idx = email_sel.options.selectedIndex;
            var val = email_sel.options[idx].value;
            email_dns.value = val;
            // alert(val);
            // alert(idx);

        }
        function login_search(){
            window.open("login_search.html", "", "width=600,height=300,left=0,top=0")
        }
        // function addr_search(){
        //     window.open("addr_search.html", "", "width=600,height=300,left=0,top=0")
        // }
        
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
        
        

    <main>
        <form  name="join_form" action="edit.php?g_idx=<?php echo $g_idx;?>" method="post" onsubmit="return edit_form_check()"> 
            <fieldset>
                <legend>회원정보 수정</legend>
                <!-- <input type="hidden" name="g_idx" value="<?php echo $array["idx"]; ?>"> -->
                <h3>로그인 정보<h3>
                <div class="log_info">
                    
                    <div class="u_name">
                        <p class="c_title">이름</p>
                        <?php echo $array["u_name"]; ?>
                    </div>
                    <div class="u_id">
                        <p class="c_title">아이디</p>
                        <?php echo $array["u_id"]; ?>
                    </div>
                    <div class="u_pwd">
                        <label for="pwd" class="c_title">비밀번호</label>
                        <input type="password" name="pwd" id="pwd"  value="<?php echo $array["pwd"]; ?>">
                        <br><span id="err_pwd" class="err_txt"></span>
                    </div>
                    <div class="re_pwd">
                        <label for="re_pwd" class="c_title">비밀번호 확인</label>
                        <input type="password" name="re_pwd" id="re_pwd"  value="<?php echo $array["pwd"]; ?>">
                        <br><span id="err_re_pwd" class="err_txt"></span>
                    </div>
                </div>

                <h3>연락처 정보</h3>
                    <div class="m_info">
                    <div class="mobile">
                        <label for="mobile" class="c_title">전화번호</label>
                        <input type="text" name="mobile" id="mobile" value="<?php echo $array["mobile"]; ?>">
                        <!-- <br>"-" 없이 숫자만 입력 -->
                        <br><span id="err_num" class="err_txt"></span>
                    </div>
                    <?php
                        $birth = str_replace("-", "", $array["birth"]);
                    ?>

                    <div class="birth">
                        <label for="birth"class="c_title">생년월일</label>
                        <input type="text" name="birth" id="birth" value="<?php echo $birth; ?>">
                        <span>ex) 20221006</span>
                    </div>
                    <?php
                        $email=explode("@", $array["email"]);               
                    ?>

                    <div class="email">
                        <label for="email_id"class="c_title" >이메일</label>
                        <input type="text" name="email_id" id="email_id" size="12" value="<?php echo $email[0];?>"> @
                        <input type="text" name="email_dns" id="email_dns" size="12" value="<?php echo $email[1];?>">
                        <select name="email_sel" id="email_sel" onchange="change_email()">
                            <option value="">직접입력</option>
                            <option value="naver.com">네이버</option>
                            <option value="daum.com">다음</option>
                            <option value="gmail.com">구글</option>
                        </select>
                        <br><span id="err_email" class="err_txt"></span>
                    </div>
    
                    <div class="gender">
                        <span class="c_title">성별</span>
                            <input type="radio" name="gender" id="male" value="m"<?php if($array["gender"] == "m") echo " checked";?>>
                            <label for="male">남</label>
                            <input type="radio" name="gender" id="female" value="f" <?php if($array["gender"] == "f") echo " checked";?>>
                            <label for="female">여</label>
                    </div>
                </div>

                <p class="bottom">
                    <button type="submit" class="edit">수정하기</button>
                    <button type="button" class="delete" onclick="history.back()">돌아가기</button>
                </p>
            </fieldset>
        </form>
    </main>


</body>

</html>