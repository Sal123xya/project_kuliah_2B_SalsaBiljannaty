<?php
session_start();
if (isset($_GET['x']) && $_GET['x'] == 'home') {
    $page = "home.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'product') {
    $page = "product.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kategori') {
    $page = "kategori.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'order') {
    $page = "order.php";
    include "main.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
    if ($_SESSION['level_projectbutik'] == 1) {
        $page = "user.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
    if ($_SESSION['level_projectbutik'] == 1) {
        $page = "report.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    include "login.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    include "proses/proses_logout.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'kategori') {
    if ($_SESSION['level_projectbutik'] == 1) {
        $page = "kategori.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} elseif (isset($_GET['x']) && $_GET['x'] == 'orderitem') {
    if ($_SESSION['level_projectbutik'] == 1) {
        $page = "order_item.php";
        include "main.php";
    } else {
        $page = "home.php";
        include "main.php";
    }
} else {
    $page = "home.php";
    include "main.php";
}
?>