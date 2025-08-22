<?php include 'db.php'; 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lodgix</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style>
             .hotel-card {
                background-color: #ffffff;
                border-left: 8px solid #ffc800;
                text-align: center;
                border-radius: 12px;
                padding: 20px;
                margin-bottom: 23px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .hotel-card:hover {
                transform: scale(1.02);
                box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            }
            .small-text{
                font-size: 0.9em;
            }
            .portfolio-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 30px rgba(0,0,0,0.2);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border-radius: 20px;
            }
            .circle {
                opacity: 0.8;
                transition: opacity 0.3s ease;
            }
            .circle:hover {
                transform: scale(1.05) rotate(1deg);
                opacity: 1;
            }
            .project-card {
                background-color: #FFF0D9;
                text-align: center;
                border-radius: 14px;
                padding: 20px;
                margin-bottom: 25px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 1.0);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

           /* Sidebar (non-fixed, collapsible) */
/* Navbar always above sidebar */
.navbar {
    z-index: 3000; /* higher than sidebar */
    left: -110px;


}
/* Mini Sidebar */
#sidebar {
    position: fixed;
    top: 0;
    left: -220px; /* hidden initially */
    width: 220px;
    height: 100vh;
    background-color: #343a40;
    color: #fff;
    padding-top: 20px;
    transition: all 0.3s;
    z-index: 1050;
}

#sidebar a {
    display: block;
    color: #fff;
    padding: 12px 20px;
    text-decoration: none;
    transition: background 0.2s;
}

#sidebar a:hover {
    background-color: #495057;
}

#sidebar.active {
    left: 0; /* show sidebar */
}

/* Mini toggle button */
#sidebarToggle {
    z-index: 1100;

}

        </style>
    </head>
<body>
        <!-- Sidebar -->
       <div id="sidebar">
    <div class="sidebar-header text-center mb-4">
        <svg width="160" height="50" xmlns="http://www.w3.org/2000/svg"></svg>
    </div>
    <a href="#services"><i class="fas fa-concierge-bell me-2"></i>Services</a>
    <a href="#portfolio"><i class="fas fa-images me-2"></i>Portfolio</a>
    <a href="#about"><i class="fas fa-info-circle me-2"></i>About</a>
    <a href="#team"><i class="fas fa-users me-2"></i>Team</a>
    <a href="#contact"><i class="fas fa-envelope me-2"></i>Contact</a>
</div>
       <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" id="sidebarToggle" img src="\lodgix_db\assets\img\lodgix_logo.jpg">
    <button class="btn btn-dark me-2" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    <a class="navbar-brand" href="#">Lodgix</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
      <span class="navbar-toggler-icon"></span>
    </button>

<div class="collapse navbar-collapse" id="navbarResponsive">
  <ul class="navbar-nav ms-auto me-3">
    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
    
    <?php var_dump($_SESSION); ?>

    <?php if (isset($_SESSION['user_id'])): ?>
      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
    <?php else: ?>
      <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="signup.php">Signup</a></li>
    <?php endif; ?>
  </ul>
</div>



      <!-- Form Type Dropdown in Navbar -->
      <form class="d-flex">
        <select class="form-select form-select-sm bg-dark text-white" id="form_type" onchange="goToPage(this.value)">
          <option value="" selected disabled>Forms</option>
          <option value="enquiry.php">Enquiry</option>
          <option value="booking.php">Booking</option>
          <option value="payments.php">Payments</option>
          <option value="cancellation.php">Cancellation</option>
          <option value="feedback.php">Feedback</option>
        </select>
      </form>
    </div>
  </div>
</nav>

                <!-- Masthead-->
       <header class="masthead">
        <img src="\lodgix_db\assets\img\lodgix.png" 
     alt="Logo" 
     style="width:100px; height:auto; filter: drop-shadow(0 0 15px rgba(255,255,255,0.9)); animation: glow 1.5s infinite alternate;">

<style>
@keyframes glow {
  from { filter: drop-shadow(0 0 5px rgba(255,255,255,0.5)); }
  to   { filter: drop-shadow(0 0 45px rgba(255,255,255,1)); }
}
</style>

    <div class="container" style="text-align: center;">
        <div class="masthead-subheading">Welcome To Lodgix</div>
        <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="booking.php">BOOK NOW</a>
    </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted"> “Your Needs, Our Priority.”</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="hotel-card">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-utensils fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Dining & Culinary</h4>
                        <p class="text-muted">“Savor Every Moment, One Bite at a Time.”</p>
                        <ol class="small-text">
                           <li>Restaurant & Bar
→ Highlight in-house dining options with menus and opening hours.</li>
<br>
<li>Room Service
→ Include online room service ordering for guest comfort.</li>
<br>
<li>Special Dining Experiences
→ Private dining, chef’s table, or themed dinners.</li>
                        </ol>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hotel-card">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-spa fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Leisure & Wellness</h4>
                        <p class="text-muted">“Where Leisure Becomes a Lifestyle.”</p>
                        <ol class="small-text">
                            <li>Swimming Pool & Spa
→ Promote relaxation facilities with images and service lists.</li>
<br>
<li>Fitness Center
→ Gym facilities, classes, and trainers.</li>
<br>
<li>Recreational Activities
→ Yoga sessions, guided tours, local experiences.</li>
                        </ol>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hotel-card">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-business-time fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Business & Events</h4>
                        <p class="text-muted">“Elevate Your Next Event with Us.”</p>
                        <ol class="small-text">
                            <li>Conference Rooms
→ Meeting facilities with capacity info and booking options.</li>
<br>
<li>Event Planning
→ Weddings, corporate events, banquets with customizable packages.</li>
<br>
<li>Business Services
→ Printing, scanning, high-speed Wi-Fi</li>
                        </ol>
                    </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="hotel-card">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-bed fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Guest Convenience</h4>
                        <p class="text-muted">“Comfort and Convenience at Every Turn.”</p>
                        <ol class="small-text">
                            <li>Airport Transfers & Transportation
→ Shuttle services, taxi bookings, rental cars.</li>
<br>
<li>Laundry & Dry Cleaning
→ Quick turnaround services for guests.</li>
<br>
<li>Luggage Storage
→ Safe storage for guests arriving early or leaving late.</li>
                        </ol>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hotel-card">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-wand-magic-sparkles fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Special Touches</h4>
                        <p class="text-muted">“Because Every Guest Deserves Being Special.”</p>
                        <ol class="small-text"><li>Loyalty Programs→ Exclusive perks for repeat guests.</li>
<br>
<li>Personalized Services→ Pillow menus, fragrance selection, tailored room amenities.</li>
<br>
<li>Pet-Friendly Services→ Highlight pet accommodations if offered.</li>
                        </ol>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="hotel-card">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-wifi fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Digital Services</h4>
                        <p class="text-muted">“Smart Stays for Modern Travelers.”</p>
                        <ol class="small-text">
                            <li>Virtual Tours
→ Interactive 360° views of rooms and amenities.</li>
<br>
<li>Mobile App Integration
→ For room keys, service requests, and booking.</li>
<br>
<li>Multi-Language Support
→ Cater to international guests online.</li>
                        </ol>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">“Showcasing Creativity. Sharing Vision.”</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-card">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Lobby</div>
                                <div class="portfolio-caption-subheading text-muted">Hotel Reception</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-card">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Suite</div>
                                <div class="portfolio-caption-subheading text-muted">Deluxe Room</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-card">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Dining</div>
                                <div class="portfolio-caption-subheading text-muted">Restaurant Area</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <!-- Portfolio item 4-->
                        <div class="portfolio-card">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Swimming Pool</div>
                                <div class="portfolio-caption-subheading text-muted">Leisure Area</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <!-- Portfolio item 5-->
                        <div class="portfolio-card">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/5.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Conference</div>
                                <div class="portfolio-caption-subheading text-muted">Banquet Hall</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Portfolio item 6-->
                        <div class="portfolio-card">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/6.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Spa</div>
                                <div class="portfolio-caption-subheading text-muted">Wellness Area</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted"> “Passion. Purpose. Progress.”</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">In 2009, we opened our doors with a simple mission: to offer travelers a welcoming haven where comfort meets elegance. Starting with just a handful of rooms and a passionate team, we worked tirelessly to create memorable experiences for every guest. By 2011, our reputation for warm hospitality and personalized service began to grow, laying the foundation for the hotel we are proud of today.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2012-2015</h4>
                                <h4 class="subheading"> Growth and Recognition</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Between 2012 and 2015, we expanded our facilities and introduced new services to delight our guests. Our commitment to excellence earned us local awards and glowing reviews from travelers worldwide. These years marked our emergence as a trusted name in hospitality, attracting both leisure and business travelers seeking exceptional stays.</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2016 – 2019</h4>
                                <h4 class="subheading">Modern Transformations</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">As travel trends evolved, so did we. From 2016 to 2019, we undertook extensive renovations, modernizing our rooms, enhancing our dining experiences, and embracing eco-friendly practices. Our vision was to blend timeless elegance with modern comforts, ensuring every guest felt both the charm of tradition and the excitement of innovation.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2020-PRESENT</h4>
                                <h4 class="subheading"> Embracing Innovation</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">The years from 2020 onward have challenged and inspired us. We have invested in advanced digital solutions, streamlined services for safety and convenience, and introduced flexible offerings tailored to changing guest needs. Today, we stand as a modern, forward-thinking hotel, dedicated to creating unforgettable moments while staying true to our roots in genuine hospitality.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">“Teamwork Makes the Dream Work.”</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="circle">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets\img\team\general manager.png" alt="..." />
                            <h4>Parveen Anand</h4>
                            <p class="text-muted">General Manager (GM)</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="circle">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets\img\team\hospitality manager.png" alt="..." />
                            <h4>Diana Petersen</h4>
                            <p class="text-muted">Hospitality Manager</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="circle">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets\img\team\house keeping manager.png" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Housekeeping Manager</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-4">
                        <div class="circle">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets\img\team\head chef.png" alt="..." />
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Head Chef</p>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted"> “Our amazing team’s dedication and passion are the foundation of our success, proving time and again that when talented people unite with purpose, nothing is impossible.”</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/instagram.svg" alt="..." aria-label="instagram Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/twitter.svg" alt="..." aria-label="twitter Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Enquiry Form -->
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">“We’re Here to Help.”</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Lodgix 2025</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="project-card">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Luxury Hotel Interior</h2>
                                    <p class="item-intro text-muted">reception desk</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                    <blockquote style="text-align: border-left;">A hotel lobby project focuses on creating a functional and visually appealing space where guests arrive, check in, and spend time. It involves careful planning of layout, materials, lighting, and technology to ensure smooth operations and a good first impression while meeting safety and accessibility standards.</blockquote>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>client:</strong>
                                            Hotel
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Hospatility 
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="project-card">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">luxury suite</h2>
                                    <p class="item-intro text-muted">Deluxe Room</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p>A deluxe hotel room project centers on designing a spacious, comfortable space with upgraded features like quality furnishings, modern amenities, and elegant decor. It aims to offer guests more comfort and style than standard rooms while ensuring practical layouts and efficient use of space.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Hotel 
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Accommodation 
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="project-card">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">fine dining</h2>
                                    <p class="item-intro text-muted">hotel restaurant</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p>> A hotel restaurant project involves designing a dining space that serves both guests and external visitors, focusing on layout, ambiance, kitchen efficiency, and seating capacity. It requires balancing aesthetic appeal with functionality to deliver smooth service and an enjoyable dining experience.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Hotel
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Dinning
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="project-card">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">poolside</h2>
                                    <p class="item-intro text-muted">luxury resort</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p>> A swimming pool project in a hotel focuses on creating a recreational and relaxing space for guests, combining safety, aesthetics, and functionality. It involves planning the pool size, depth, materials, lighting, and surrounding areas like decks and lounging zones to ensure comfort and an appealing atmosphere while adhering to health and safety regulations.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Hotel
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Recreation
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="project-card">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">hotel conference</h2>
                                    <p class="item-intro text-muted">Business Event</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>A hotel conference room project centers on designing a professional space for meetings, events, and business gatherings. It involves careful planning of acoustics, lighting, seating layouts, and technology integration like audio-visual systems and connectivity. The goal is to ensure comfort, efficiency, and flexibility to accommodate different group sizes and event types.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Hotel
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Business
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="project-card">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">wellness center</h2>
                                    <p class="item-intro text-muted">Relaxation</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>A hotel wellness center project focuses on creating a serene environment where guests can relax and rejuvenate through services like spa treatments, fitness facilities, and wellness programs. It involves thoughtful design of spaces, soothing aesthetics, proper ventilation, and specialized equipment to deliver a calming, health-focused experience.</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Hotel
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Wellness
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keep the rest of your Lodgix content EXACTLY the same -->
        <!-- Masthead, Services, Portfolio, About, Team, Contact, Footer, Modals -->
        <!-- (no changes made to your original code, everything remains as is) -->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- SB Forms JS -->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
        <script>
function goToPage(pageUrl) {
    if(pageUrl) {
        window.location.href = pageUrl; // Redirect to the selected page
    }
}
</script>

<script>
const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('sidebarToggle');

toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});
</script>

    </body>
</html>
