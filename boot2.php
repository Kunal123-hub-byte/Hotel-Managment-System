<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Lodgix</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" />

    <!-- CSS -->
    <link href="css/styles.css" rel="stylesheet" />

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>

    <!-- SB Forms -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <style>
        .hotel-card {
            background-color: #ffffff;
            border-left: 8px solid #ffc800;
            text-align: center;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 23px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .hotel-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        }
        .small-text { font-size: 0.9em; }
        .portfolio-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
            border-radius: 20px;
        }
        .circle { opacity: 0.8; transition: all 0.3s; }
        .circle:hover { transform: scale(1.05) rotate(1deg); opacity: 1; }
        .project-card {
            background-color: #FFF0D9;
            text-align: center;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 4px 10px rgba(0,0,0,1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
    </style>
</head>
<body id="page-top">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            Menu <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto">
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- SIDEBAR -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="index.php" class="brand-link">
            <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Lodgix</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Forms <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="enquiry_table.php" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Enquiries</p></a></li>
                        <li class="nav-item"><a href="booking_table.php" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Bookings</p></a></li>
                        <li class="nav-item"><a href="payment_table.php" class="nav-link"><i class="nav-icon bi bi-circle"></i><p>Payments</p></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- HEADER -->
<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">Welcome To Our Hotel!</div>
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
    </div>
</header>

<!-- SERVICES -->
<section class="page-section" id="services">
    <div class="container">
        <!-- Services content preserved -->
    </div>
</section>

<!-- PORTFOLIO -->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <!-- Portfolio content preserved -->
    </div>
</section>

<!-- ABOUT -->
<section class="page-section" id="about">
    <div class="container">
        <!-- About content preserved -->
    </div>
</section>

<!-- TEAM -->
<section class="page-section bg-light" id="team">
    <div class="container">
        <!-- Team content preserved -->
    </div>
</section>

<!-- CLIENTS -->
<div class="py-5">
    <div class="container">
        <!-- Logos preserved -->
    </div>
</div>

<!-- CONTACT -->
<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact form preserved -->
    </div>
</section>

<!-- UNIFIED FOOTER -->
<footer class="main-footer text-center py-3 bg-light border-top">
    <div class="container">
        <strong>Copyright &copy;
            2014-2025 <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong> All rights reserved.
        <div class="float-end d-none d-sm-inline">Anything you want</div>
    </div>
</footer>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
<script src="js/adminlte.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebarWrapper = document.querySelector('.sidebar-wrapper');
    if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: { theme: 'os-theme-light', autoHide: 'leave', clickScroll: true }
        });
    }
});
</script>

</body>
</html>
