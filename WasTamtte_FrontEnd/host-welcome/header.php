<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>ابدأ الاستضافة - استمتع</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/css2.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</head>
<body class="bg-white">


<nav class="navbar px-4 py-3 border-bottom sticky-top bg-white">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="logo">
            <i class="fa-solid fa-tent pink-text fa-2x"></i>
            <span class="fw-bold fs-4 ms-2">استمتع <span class="small fw-light text-muted" style="font-size: 12px;">للمضيفين</span> </span>
        </div>
        <button class="btn btn-outline-dark rounded-pill fw-bold btn-sm px-3" onclick="location.href='../index.php'">حفظ وخروج</button>
    </div>
</nav>
    