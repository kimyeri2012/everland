<?php

session_start();

unset($_SESSION["s_idx"]);
unset($_SESSION["s_name"]);
unset($_SESSION["s_id"]);
//페이지 이동


echo "
    <script type=\"text/javascript\">
        location.href=\"../../index.php\";
    </script>
";



?>