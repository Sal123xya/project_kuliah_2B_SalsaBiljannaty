<?php
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'product') {
    $page = "product.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kategori') {
    $page = "kategori.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'request') {
    $page = "request.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    $page = "user.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    $page = "report.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} else {
    $page = "home.php";
    include "main.php";
}
?>
<!-- End Content -->