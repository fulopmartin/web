<?php
unset($_SESSION["csn"]);
unset($_SESSION["un"]);
unset($_SESSION["login"]);

session_destroy();

header("Location: .");
exit();
?>