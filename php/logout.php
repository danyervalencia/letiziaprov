<?php
session_start(); // #1

$_SESSION = array(); // #2

session_unset();  // yo lo puse de sistem sigem
session_destroy(); // #3
session_regenerate_id(true); // yo lo puse de sistema sigem

$result = array(); // #4
$result['success'] = true;
$result['msg'] = 'logout';

echo json_encode($result); // #5
?>