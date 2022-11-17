<?php
header("Content-Type: text/html; charset=UTF-8"); 
if(!$s_idx){
    echo "
        <script type=\"text/javascript\">
            alert(\"잘못된 접근입니다.\");
            location.href = \"http://localhost/everland_renew\";
        </script>
    ";
    exit;
};
?> 