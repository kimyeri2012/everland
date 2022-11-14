<?php
include "inc/session.php";
 
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVERLAND</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
            // $(".gnb>ul>li").hover(function() {
            //     $(this).find("ul").stop().slideToggle("fast")
            // })


            //메인이미지
            $('.main_slick').slick();

            $('.att_slick').slick({
                // 자동 슬라이더
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,

                // 일반 슬라이더 
                // infinite: true,
                // slidesToShow: 5,
                // slidesToScroll: 5
            });
        })
    </script>
</head>

<body>
    <header id="header" class="header">
        <h1 class="logo"><a href="index.php">에버랜드</a></h1>

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
                <li class="user_log"><a href="login/logout.php">로그아웃</a></li>
                <li class="user_join"><a href="#">마이페이지</a></li>
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
        <section class="main_image">
            <h2 class="hide">메인이미지</h2>
            <ul class="main_slick">
                <li class="main_img1"><a href="#"><span class="main_txt">내용1</span></a></li>
                <li class="main_img2"><a href="#"><span class="main_txt">내용2</span></a></li>
                <li class="main_img3"><a href="#"><span class="main_txt">내용3</span></a></li>
                <li class="main_img4"><a href="#"><span class="main_txt">내용4</span></a></li>
            </ul>
            <!-- slick-prev -->
            <!-- <a class="slick-prev" href="#">이전</a>
            <a class="slick-next" href="#">다음</a> -->
        </section>

        <div class="time">
            <!-- <dl class="time_icon">
                <dt>오늘의 파크 운영시간</dt>
                <dd>10:00~22:00</dd>
            </dl> -->
            <p>오늘의 파크 운영시간 <br>
                <span class="open_time">10:00~22:00</span>
            </p>
        </div>

        <section class="att">
            <h2>어트랙션 운휴정보</h2>
            <ul class="att_wrap att_slick">
                <div class="att_Tex ">
                    <li><a href="#">T익스프레스</a>
                        <ul>
                            <li><a href="#"><span class="T_1">정상운영중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_amaz">
                    <li><a href="#">아마존</a>
                        <ul>
                            <li><a href="#"><span>정상운영중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_sfari">
                    <li><a href="#">사파리 월드</a>
                        <ul>
                            <li><a href="#"><span>정상운영중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_biking">
                    <li><a href="#">콜롬버스 대탐험</a>
                        <ul>
                            <li><a href="#"><span>정상운영중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_bump">
                    <li><a href="#">범퍼카</a>
                        <ul>
                            <li><a href="#"><span>운휴중</span></a></li>
                        </ul>
                    </li>
                </div>
                <!-- ------------------ -->

                <div class="att_bump">
                    <li><a href="#">범퍼카</a>
                        <ul>
                            <li><a href="#"><span>운휴중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_bump">
                    <li><a href="#">범퍼카</a>
                        <ul>
                            <li><a href="#"><span>운휴중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_bump">
                    <li><a href="#">범퍼카</a>
                        <ul>
                            <li><a href="#"><span>운휴중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_bump">
                    <li><a href="#">범퍼카</a>
                        <ul>
                            <li><a href="#"><span>운휴중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_bump">
                    <li><a href="#">범퍼카</a>
                        <ul>
                            <li><a href="#"><span>운휴중</span></a></li>
                        </ul>
                    </li>
                </div>
                <div class="att_bump">
                    <li><a href="#">범퍼카</a>
                        <ul>
                            <li><a href="#"><span>운휴중</span></a></li>
                        </ul>
                    </li>
                </div>


            </ul>
            <!-- <a class="att_left" href="#">이전</a>
            <a class="att_right" href="#">다음</a> <br> -->
            <a class="att_more" href="att.php">어트랙션 정보 보러가기</a>
        </section>

        <section class="sale">
            <h2>할인안내</h2>
            <ul>
                <li class="sale_1"><a href="#">중/고/대학생 우대</a></li>
                <li class="sale_2"><a href="#">홈페이지 신규가입 우대</a></li>
                <li class="sale_3"><a href="#">생일자 우대</a></li>
                <li class="sale_4"><a href="#">군인간부 우대</a></li>
                <li class="sale_5"><a href="#">문화누리카드 우대</a></li>
            </ul>
            <a class="sale_more" href="#">더 많은 할인정보 보기</a>
        </section>

        <section class="rec">
            <h2 class="rec_cor">에버랜드 제대로 즐기는 추천코스</h2>
            <ul>
                <li><span class="snow">눈,비</span>가 내릴 때!</li>
                <li><span class="child">유아/동반</span> 가족분들!</li>
                <li><span class="scared">스릴</span>을 즐기는 강심장분들!</li>
                <li><span class="no_ride">놀이기구</span> 없이 즐기는 분들</li>
                <li class="rec_more"><a href="#">추천 코스 보러가기!</li>
            </ul>
            <a class="rec_left" href="#">이전</a>
            <a class="rec_right" href="#">다음</a> <br>
            <a class="hide" href="#">1 2 3 4</a>
        </section>
        <div class="main_bottom">
            <article class="notice">
                <h2>에버랜드 소식</h2>
                <ul>
                    <li class="notice1"><a href="#">[공지] 코로나 바이러스 감염증-19 관련 안내 <span>2022-08-26</span></a></li>
                    <li><a href="#">외국인 손님을 위한 영문 APP이용 안내 <span>2022-08-24</span></a></li>
                    <li><a href="#">[공지] 입장 후 스마트 줄서기 신청 안내 <span>2022-08-22</span></a></li>
                    <li><a href="#">스마트줄서기 초보를 위한 이용가이드 <span>2022-07-06</span></a></li>
                    <li><a href="#">인기템을 미리미리! 굿즈 픽업 서비스 <span>2022-06-22</span></a></li>
                    <li><a href="#">BLOOD CITY 6 기프트 카드 출시 <span>2022-05-02</span> </a></li>
                </ul>
                <a class="notice_more" href="#">더보기</a>
            </article>

            <div class="app_downld">
                <dl>
                    <dt><a href="#">앱 다운로드로 더 스마트하게!</a></dt>
                    <dd><a href="#">스마트 줄서기</a></dd>
                    <dd><a href="#">모바일 주문</a></dd>
                    <dd><a href="#">모바일 예매</a></dd>
                </dl>
            </div>

            <div class="pbl_trans">
                <dl>
                    <dt><a href="#">대중교통 이용방법</a></dt>
                    <dd><a href="#">"우리집에서 에버랜드까지"</a></dd>
                </dl>
            </div>
        </div>

        <section class="sns">
            <h2 class="hide">SNS</h2>
            <ul>
                <li class="sns_youtb"><a href="#">유튜브 </a></li>
                <li class="sns_insta"><a href="#">인스타그램</a></li>
                <li class="sns_face"><a href="#">페이스북</a></li>
                <li class="sns_blog"><a href="#">블로그</a></li>
                <li class="sns_tstory"><a href="#">티스토리</a></li>
                <li class="sns_twitt"><a href="#">트위터</a></li>
            </ul>
        </section>
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