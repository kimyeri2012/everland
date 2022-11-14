<?php 
if(!$s_idx || $s_id!="admin"){
    echo"
        <script type=\"text/javascript\">
            alert(\"관리자로그인이 필요합니다.\");
            location.href=\"http://localhost/web_project/admin/login/login.php\";
        </script>
    ";
    exit;
};

?>