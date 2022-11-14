<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>어트랙션</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/att.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="slick-1.8.1/slick/slick.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".gnb>ul>li,nav_bg").mouseenter(function () {
                $(this).find("ul").stop().slideDown("fast");
            })
            $(".gnb>ul>li").mouseleave(function () {
                $(this).find("ul").stop().slideUp("fast");
            })

        })
    </script>
</head>

<body>
    <header id="header" class="header">
        <h1 class="logo"><a href="#">에버랜드</a></h1>

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

        <div class="user_mu">
            <h2 class="hide">사용자 메뉴 </h2>
            <ul>
                <li class="user_log"><a href="login/login.php">로그인</a></li>
                <li class="user_join"><a href="members/new_join.php">회원가입</a></li>
                <li class="user_cos"><a href="#">손님상담센터</a></li>
                <li class="user_lang"><a href="#">언어선택</a></li>
            </ul>
        </div>

        
        <!-- <div class="group">
            <dl>
                <dt class="hide">그룹사 홈페이지</dt>
                <dd class="group_1"><a href="#">캐리비안베이</a></dd>
                <dd class="group_2"><a href="#">홈브리지</a></dd>
            </dl>
        </div> -->
    </header>
    <main class="att">
        <h2 class="att_img"><span class="att_txt">어트랙션</span></h2>

        <div class="att_search">
            <div class="search_bar">
                <label class="area">
                    위치
                    <select class="sel_a" name="area" id="area" >
                        <option value="">선택하세요</option>
                        <option value="">전체</option>
                        <option value="">매직월드</option>
                        <option value="">유러피언 어드벤처</option>
                        <option value="">주토피아</option>
                        <option value="">아메리칸 어드벤처</option>
                        <option value="">글로벌페어</option>

                    </select>
                    <!-- <input type="text" name="" id=""> -->
                </label>
                <label class="cm">
                    키
                    <input class="in_cm" type="text" name="" id="" placeholder="                                cm"> 
                </label>
                <label class="per">
                    보호자탑승
                    <!-- <input class="per_ok" type="text" name="" id="" placeholder="보호자 탑승"> -->
                    <input class="in_per" type="checkbox">
                    
                </label>
            </div>
            <ul class="att_list">
                <div class="att_T">
                    <li><a href="">T익스프레스</a></li>
                    <span>유러피언 어드벤처</span>
                </div>
                <div class="att_sapari">
                    <li><a href="">사파리 월드</a></li>
                    <span>주토피아</span>
                </div>

                <div class="att_rost">
                    <li><a href="">로스트 벨리</a></li>
                    <span>주토피아</span>
                </div>

                <div class="att_panda">
                    <li><a href="">판다월드</a></li>
                    <span>주토피아</span>
                </div>

                <div class="att_amaz">
                    <li><a href="">아마존 익스프레스</a></li>
                    <span>주토피아</span>
                </div>

                <div class="att_sunder">
                    <li><a href="">썬더폴스</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_colom">
                    <li><a href="">콜롬버스 대탐험</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_ziro">
                    <li><a href="">자이로 VR</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_robot">
                    <li><a href="">로봇 VR</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_double">
                    <li><a href="">더블 락스핀</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_lets">
                    <li><a href="">랫츠 트위스트</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_rolling">
                    <li><a href="">롤링 엑스 트레인</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_huri">
                    <li><a href="">허리케인</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_champ">
                    <li><a href="">챔피온쉡 로데오</a></li>
                    <span>아메리칸 어드벤처</span>
                </div>

                <div class="att_rapter">
                    <li><a href="">랩터 레인저</a></li>
                    <span>주토피아</span>
                </div>

                <div class="att_kids">
                    <li><a href="">키즈 빌리지</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_hello">
                    <li><a href="">헬로 터닝 어드벤처</a></li>
                    <span>글로벌 페어</span>
                </div>

                <div class="att_magic">
                    <li><a href="">매직 쿠키 하우스</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_royal">
                    <li><a href="">로얄 쥬빌리 캐로셀</a></li>
                    <span>유러피언 어드벤처</span>
                </div>

                <div class="att_secret">
                    <li><a href="">시크릿 쥬쥬</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_car">
                    <li><a href="">자동차 왕국</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_flash">
                    <li><a href="">플래쉬 팡팡</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_piter">
                    <li><a href="">피터팬</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_ele">
                    <li><a href="">나는 코끼리</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_rocar">
                    <li><a href="">로보트카</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_bong">
                    <li><a href="">붕붕카</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_bump">
                    <li><a href="">범퍼카</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_sky">
                    <li><a href="">스카이 댄스</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_swing">
                    <li><a href="">매직 스윙</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_btrain">
                    <li><a href="">비룡열차</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_space">
                    <li><a href="">우주전투기</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_spuki">
                    <li><a href="">스푸키 펀 하우스</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_racing">
                    <li><a href="">레이싱 코스터</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_boll">
                    <li><a href="">볼 하우스</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_rili">
                    <li><a href="">릴리댄스</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_fly">
                    <li><a href="">플라잉 레스큐</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_play">
                    <li><a href="">플레이 야드</a></li>
                    <span>매직랜드</span>
                </div>

                <div class="att_festiv">
                    <li><a href="">페스티벌 트레인</a></li>
                    <span>유러피언 어드벤처</span>
                </div>

                <div class="att_sp_tour">
                    <li><a href="">스페이스투어</a></li>
                    <span>유러피언 어드벤처</span>
                </div>

                <div class="att_rani">
                    <li><a href="">레니의 마법학교</a></li>
                    <span>유러피언 어드벤처</span>
                </div>
                <div class="att_shoot">
                    <li><a href="">슈팅 고스트</a></li>
                    <span>유러피언 어드벤처</span>
                </div>
            </ul>
        </div>
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