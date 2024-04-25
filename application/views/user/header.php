<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Neo Java Era Bank</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container justify-content-center">
                <a href="" class="navbar-brand">
                    <img src="<?= base_url(); ?>assets/aset/nje.jpg" alt="NJEBank Logo" class="brand-image img-circle elevation-3" style="opacity: .5">
                    <span class="brand-text font-weight-light">Neo Java Era <b>Bank</b></span>
                </a>
                <div class="ml-auto">
                    <a data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </div>
            </div>
        </nav>

    </div>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url(); ?>assets/aset/user1.jfif" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= base_url(); ?>user/profile" class="d-block"><?= $pengguna['nm_pg']; ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>user" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-header">Menu</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-file-arrow-down"></i>
                            <p>
                                Laporan Setoran
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../widgets.html" class="nav-link">
                            <i class="fa-solid fa-file-arrow-up"></i>
                            <p>
                                Laporan Penarikan
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <p>
                                Riwayat
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Other</li>
                    <li class="nav-item">
                        <a href="../calendar.html" class="nav-link">
                            <i class="fa-solid fa-file-lines"></i>
                            <p>
                                About
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../calendar.html" class="nav-link">
                            <i class="fa-regular fa-credit-card"></i>
                            <p>
                                Rekening
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>Auth/logout" class="nav-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">