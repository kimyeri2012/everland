<?php 
include "../inc/session.php"; 
// include "../inc/admin_check.php";
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

    <script type="text/javascript">
        $(document).ready(function () {
            $(".gnb_1 >ul").hide();

            $(".gnb>ul>li").mouseover(function () {
                $(this).find("ul").stop().slideDown("fast");
            })
            $(".gnb>ul>li").mouseout(function () {
                $(this).find("ul").stop().slideUp("fast");
            })

        })
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
                        <li><a href="">운영/운휴</a></li>
                        <li><a href="">이용방법</a></li>
                        <li><a href="">편의시설</a></li>
                        <li><a href="">오시는길</a></li>
                        <li><a href="">모바일앱</a></li>
                        <li><a href="">에버랜드 스토리</a></li>
                    </ul>
                </li>
                <li class="gnb_1"><a href="#">요금안내</a>
                    <ul>
                        <li><a href="">이용요금</a></li>
                        <li><a href="">제휴카드</a></li>
                        <li><a href="">체험 프로그램</a></li>
                    </ul>
                </li>
                <li class="gnb_1"><a href="#">즐길거리</a>
                    <ul>
                        <li><a href="">어트랙션</a></li>
                        <li><a href="">추천 코스</a></li>
                        <li><a href="">공연 및 퍼레이드</a></li>
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
                <li class="gnb_1"><a href="#">소통서비스</a>
                    <ul>
                        <li><a href="notice/notice.php">공지사항</a></li>
                        <li><a href="">자주하는 질문</a></li>
                        <li><a href="">고객소리함</a></li>
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
    <form name="notice_form" action="insert.php" method="post"  onsubmit="return notice_check()">
        <fieldset>
            <legend>공지사항</legend>
            <div class="writer">
                작성자 <?php echo $s_name; ?>
                <!-- <input type="hidden"> -->
            </div>

            <div class="n_type">
                <label for="n_type">구분</label>
                <!-- <input type="text" name="n_type" id="n_type"> -->
                <select name="n_type" id="n_type">
                    <option value="">전체</option>
                </select>
            </div>

            <div class="n_title">
                <label for="n_title">제목</label>
                <input type="text" name="n_title" id="n_title">
            </div>


            <div class="n_content">
                <label for="n_content">내용</label>
                <textarea cols="60" rows="10" name="n_content" id="n_content"></textarea>
            </div>

            <div>
                <button type="button" onclick="history.back()">이전 페이지</button>
                <button type="submit">등록하기</button>
            </div>
        </fieldset>
    </form>
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