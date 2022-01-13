<?php
session_start();
session_destroy();

header("Location: index.php?login=0");
exit;
?>