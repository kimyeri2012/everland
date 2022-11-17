<?php
include "../inc/session.php";

include "../inc/login_check.php";

include "../inc/dbcon.php";

//쿼리 작성
$sql="select * from members where idx = $s_idx;"; //세션 변수 사용 -> 로그인한 사용자의 모든 데이터
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
    <link rel="stylesheet" type="text/css" href="../css/mem_info.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/slick-1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/slick-1.8.1/slick/slick.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".gnb_1 >ul").hide();

            $(".gnb>ul>li").mouseover(function () {
                $(this).find("ul").stop().slideDown("fast");
            })
            $(".gnb>ul>li").mouseout(function () {
                $(this).find("ul").stop().slideUp("fast");
            })
            // $(".gnb>ul>li").hover(function() {
            //     $(this).find("ul").stop().slideToggle("fast")
            // })

        })
    </script>

    <script type="text/javascript">

        //이름입력x-> 이름 입력안내 메시지, 커서 표시
        function join_form_check(){
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
        <h1 class="logo"><a href="../index.php">에버랜드</a></h1>

        <nav class="gnb">
            <h2 class="hide">주요 메뉴</h2>
            <ul>
                <li class="gnb_1"><a href="#">이용정보</a>
                    <ul>
                        <li><a href="">뉴스공지</a></li>
                        <li><a href="">이용방법</a></li>
                        <li><a href="">운영시간</a></li>
                        <li><a href="">운휴안내</a></li>
                        <li><a href="">교통정보</a></li>
                        <li><a href="">편의시설</a></li>
                        <li><a href="">가이드맵</a></li>
                        <li><a href="">모바일앱</a></li>
                    </ul>
                </li>
                <li class="gnb_1"><a href="#">요금&프로모션</a>
                    <ul>
                        <li><a href="">이용요금</a></li>
                        <li><a href="">제휴카드</a></li>
                        <li><a href="">스페셜 프로모션</a></li>
                        <li><a href="">드림투어</a></li>
                        <li><a href="">체험 프로그램</a></li>
                    </ul>
                </li>
                <li class="gnb_1"><a href="#">즐길거리</a>
                    <ul>
                        <li><a href="">추천 코스</a></li>
                        <li><a href="">어트랙션</a></li>
                        <li><a href="">엔터테인먼트</a></li>
                        <li><a href="">주토피아(동물원)</a></li>
                        <li><a href="">플랜토피아(정원)</a></li>
                        <li><a href="">레스토랑</a></li>
                        <li><a href="">선물샵 | MD 쇼핑몰</a></li>
                        <li><a href="">글램핑</a></li>
                    </ul>
                </li>
                <li class="gnb_1"><a href="#">멤버십</a>
                    <ul>
                        <li><a href="">연간 이용권</a></li>
                        <li><a href="">시즌 이용권</a></li>
                        <li><a href="">스피드웨이</a></li>
                        <li><a href="">동물사랑단</a></li>
                        <li><a href="">식물사랑단</a></li>
                    </ul>
                </li>
                <li class="gnb_1"><a href="#">에버랜드 더알아보기</a>
                    <ul>
                        <li><a href="">Editor's Pick</a></li>
                        <li><a href="">에버랜드 스토리</a></li>
                        <li><a href="">에버랜드 테마뮤직</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="fm">
            <h2 class="hide">빠른메뉴</h2>
            <ul>
                <li class="fm_search"><a href="#"><span class="fm_s">검색</span></a></li>
                <li class="fm_smart"><a href="#"><span>스마트예매</span></a></li>
                <li class="fm_stu"><a href="#"><span>학생단체</span> </a></li>
                <li class="fm_entr"><a href="#"><span>기업단체</span></a></li>
            </ul>
        </div>
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
        
        <!-- <a href="admin/index.php">[관리자 페이지]</a>
        <a href="login/logout.php">로그아웃</a>
        <a href="members/mem_info.php">내정보</a> -->
        
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

        <!-- <div class="user_mu">
            <h2 class="hide">사용자 메뉴 </h2>
            <ul>
                <li class="user_log"><a href="login/login.php">로그인</a></li>
                <li class="user_join"><a href="members/new_join.php">회원가입</a></li>
                <li class="user_cos"><a href="#">손님상담센터</a></li>
                <li class="user_lang"><a href="#">언어선택</a></li>
            </ul>
        </div> -->

        <!-- <div class="group">
            <dl>
                <dt class="hide">그룹사 홈페이지</dt>
                <dd class="group_1"><a href="#">캐리비안베이</a></dd>
                <dd class="group_2"><a href="#">홈브리지</a></dd>
            </dl>
        </div> -->
</header>
    <main>
        <form  name="join_form" action="edit.php" method="post" onsubmit="return join_form_check()"> 
            <fieldset>
                <legend>회원정보 수정</legend>
                <input type="hidden" name="g_idx" value="<?php echo $array["idx"]; ?>">
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

                    <div class="addr">
                        <label for="ps_code" class="c_title">우편번호</label>
                        <input type="text" name="ps_code" id="ps_code" value="<?php echo $array["ps_code"];?>">
                        <button type="button">우편번호 검색</button><br>
                        <label for="addr_b" class="c_title">기본주소</label>
                        <input type="text" name="addr_b" id="addr_b" value="<?php echo $array["addr_b"];?>"><br>
                        <label for="addr_d" class="c_title">상세주소</label>
                        <input type="text" name="addr_d" id="addr_d" value="<?php echo $array["addr_d"];?>">
                    </div>
    
                    <div class="gender">
                        <span class="c_title">성별</span>
                            <input type="radio" name="gender" id="male" value="m"<?php if($array["gender"] == "m") echo " checked";?>>
                            <label for="male">남</label>
                            <input type="radio" name="gender" id="female" value="f" <?php if($array["gender"] == "f") echo " checked";?>>
                            <label for="female">여</label>
                    </div>
                </div>

                <div class="finish">
                    <button type="submit">수정하기</button>
                    <button type="button" onclick="history.back()">돌아가기</button>
                </div>
            </fieldset>
        </form>
    </main>

    <footer class="footer">
        <div class="footer_wrap">
            <div class="footer_top">
                <h2 class="hide">사이트 이용안내</h2>
                <div>
                    <ul>
                        <li class="ft_1"><a href="#">에버랜드 리조트</a></li>
                        <li class="ft_2"><a href="#">이용약관이메일 주소 무단수집 거부</a></li>
                        <li class="ft_3"><a href="#">채용</a></li>
                        <li class="ft_4"><a href="#">캐스트참여</a></li>
                        <li class="ft_5"><a href="#">사이트맵</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer_bottom">
                <address>경기도 용인시 처인구 포곡읍 에버랜드로 199 삼성물산(주)</address>
                <div class="fb_txt1">
                    <p class="txt1_1">대표이사:한승환</p>
                    <p class="txt1_2">사업자 등록번호:135-85-04288</p>
                    <p class="txt1_3">통신판매업신고번호: 제2006-용인처인-0216호</p>
                    <p class="txt1_4">사업자정보확인</p>
                </div>
                <div class="fb_txt2">
                    <p class="txt2_1">손님상담센터: 031-320-5000(유료)</p>
                    <p class="txt2_2">개인정보처리방침</p>
                    <p class="txt2_3">방침 개정 안내</p>
                    <p class="txt2_4">입찰공고</p>
                </div>
                <p class="copy">COPYRIGHT SAMSUNG C&T CORPORATION ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>



</body>

</html>