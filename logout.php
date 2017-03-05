<?php
session_start();
$_SESSION['role'] = '';
header('Location: http://localhost:8888/arabic/index.php');
exit;