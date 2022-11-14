<?php 
include "../inc/session.php";

//데이터 가져오기
$n_idx = $_GET["n_idx"];

//DB연결
include "../inc/dbcon.php";

//쿼리작성
$sql="select *from notice where idx = $n_idx;";

//쿼리전송
$result=mysqli_query($dbcon,$sql);
//DB에서 데이터 가져오기 
$array = mysqli_fetch_array($result);


//DB종료 -- 가장 하단에 종료 가능(가져올 데이터가 많을 때)
mysqli_close($dbcon);


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항</title>
    <style>
        body,input,button,select,option{font-size:20px}
        input[type=checkbox]{width:20px;height:20px}
        input[type=radio]{width:20px;height:20px}
        textarea{font-size: 18px;}
    </style>
    <script>
        function notice_form_check(){
            var n_title = document.getElementById("n_title");
            var n_content = document.getElementById("n_content");

            if(!n_title.value){
                alert("제목을 입력하세요.");
                n_title.focus();
                return false;
            };

            if(!n_content.value){
                alert("내용을 입력하세요.");
                n_content.focus();
                return false;
            };
        }

    </script>
</head>
<body>
    <?php include "../inc/sub_header.php";?>
    
    <form name="notice_form" action="edit.php?n_idx=<?php echo $n_idx; ?>" method="post" onsubmit="return notice_form_check()">
        <fieldset>
            <legend>공지사항</legend>
            <p>
                작성자 : <?php echo $s_name; ?>
                <!-- <input type="hidden" name="n_idx" value=""> -->
            </p>

            <p>
                <label for="n_title">제목</label>
                <input type="text" name="n_title" id="n_title" value="<?php echo $array["n_title"]?>">

            </p>
            <p>
                <label for="n_content">내용</label>
                <!-- textarea는 value x 데이터 입력 시 엔터 금지(무조건 한줄에 입력완료) -->
                <textarea name="n_content" id="n_content" cols="60" rows="10" ><?php echo $array["n_content"]?></textarea>

            </p>

            <p>
                <button type="button" onclick="history.back()">이전 페이지</button>
                <button type="submit">수정하기</button>
            </p>
        </fieldset>
    </form>
</body>
</html>