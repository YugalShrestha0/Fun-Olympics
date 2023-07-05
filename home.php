<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to FunOlympics 2023 - Yokyo</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">FunOlympics<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Sports</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="video-gallery.php">Videos</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="admin/login-user.php" class="get-started-btn scrollto" target="_blank">Admin Panel</a>

      <a href="logout-user.php" class="get-started-btn scrollto">Logout</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Welcome to FunOlympics 2023<span>.</span></h1>
          <h2>Yokyo</h2>
        </div>
      </div>

    
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/about1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>About FunOlympics</h3>
            <p>
              FunOlympics is an exhilarating international sporting event held in Yokyo, which brings together athletes from across the globe. This celebration of camaraderie and friendly 
              competition offers a wide array of sports, catering to diverse interests. From traditional athletics to innovative competitions, FunOlympics pushes the boundaries of sports, 
              captivating both participants and spectators alike. The event embodies unity, sportsmanship, and cultural exchange, fostering friendships among athletes from different nations 
              and creating a global community. With Yokyo's blend of tradition and innovation, along with its warm hospitality and efficient organization, the city provides the perfect backdrop 
              for this extraordinary event. FunOlympics inspires athletes to exceed their personal limits, promotes inclusivity, and serves as a source of inspiration for future generations, 
              leaving a profound and unforgettable legacy of joy, excellence, and memories.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

      <div class="row">
          <div class="col-lg-12" data-aos="fade-left" data-aos-delay="100">
            <div class="icon-box mt-5 mt-lg-0" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-receipt"></i>
              <h4>The Olympics run in Talitha Diggs' family, but she's charting her own path: 'I want to achieve great things, too'</h4>
              <p>“It was like, 'Oh wow... Talitha is like good',” she says with a grin during an exclusive interview with Olympics.com in June, before adding: “And, ’So we're going to start talking about track more'.”
                You can excuse the greater Diggs crew for setting such a high bar: Her aunt, Jearl Miles Clark, is a two-time Olympic champion, while another aunt, Hazel Clark, and Talitha’s 
                mother, Joetta Clark Diggs, are multi-time Olympians. <a href="https://shorturl.at/deA78" target="_blank"><button type="button" class="btn btn-link">Readmore>></button></a>
              </p>
            </div>

            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-receipt"></i>
              <h4>Tour de France 2023: Daily stage results and general classification standings</h4>
              <p>The 2023 Tour de France, the second and most prestigious Grand Tour of the year in the men’s road cycling season, is underway. The stage race began on Saturday 1 July in Bilbao and will 
                run until 23 July with the 21st and last stage to finish in Paris. <a href="https://shorturl.at/zEOSX" target="_blank"><button type="button" class="btn btn-link">Readmore>></button></a>
              </p>
            </div>

            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-receipt"></i>
              <h4>2023 FIBA Women's Asia Cup: People's Republic of China crowned champions as four spots for 2024 basketball Olympic Qualifying Tournament are sealed</h4>
              <p>The world's second-ranked women's team (behind the USA) earned their 12th Asia Cup title and first since 2011 by overcoming Japan 73-71 in a repeat of the previous two finals at the competition. The championship 
                is China's second major accolade in the space of a year, following on from their second-place finish at the 2022 World Cup.Center Han Xu, who was named player of the tournament, led the way for China with 26 points and 
                10 rebounds, ensuring she recorded a double-double in every game at the Asia Cup. In the bronze medal game, Australia beat New Zealand 81-59 to earn their third consecutive third-place finish at the Asia Cup.
                <a href="https://shorturl.at/fzJ16" target="_blank"><button type="button" class="btn btn-link">Readmore>></button></a>
              </p>
            </div>

            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-receipt"></i>
              <h4>Meet Beatriz Haddad Maia: Brazil's history-making female tennis star</h4>
              <p>The last year has been anything but simple for 27-year-old Brazilian Beatriz “Bia” Haddad Maia, as the big-hitting left-hander from São Paulo has skyrocketed up the rankings and become the first woman from her 
                country to reach a top 10 position in the world. Last month, Haddad Maia made more history for Brazil when she became the first woman to reach the semi-finals at Roland-Garros in the Open Era (1968), while also 
                being the first Brazilian woman in any major semi since Maria Bueno at the US Open in 1968.
                <a href="https://shorturl.at/fOVWZ" target="_blank"><button type="button" class="btn btn-link">Readmore>></button></a>
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>sports</h2>
          <p>Check our Games</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game1.png" class="img-fluid" alt=""></div>
              <h4><a href="">Archery</a></h4>
              <p>Archery is a precision sport that involves using a bow and arrow to shoot targets.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game2.png" class="img-fluid" alt=""></div>
              <h4><a href="">Athletics</a></h4>
              <p>Athletics is a sport that includes a number of events involving running, jumping, throwing or walking.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game3.svg" class="img-fluid" alt=""></div>
              <h4><a href="">Badminton</a></h4>
              <p>Badminton is a racket-and-shuttle game played on a court by two players or doubles teams.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game4.png" class="img-fluid" alt=""></div>
              <h4><a href="">Boxing</a></h4>
              <p>Boxing is a form of hand-to-hand unarmed combat where one athlete attempts to land punches on the head or body 
                (above waist-height) of the opponent to score points.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game5.png" class="img-fluid" alt=""></div>
              <h4><a href="">Cycling Road</a></h4>
              <p>Road cycling involves mass races or time trials raced on usually paved roads, sometimes also over cobblestones.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game6.png" class="img-fluid" alt=""></div>
              <h4><a href="">Golf</a></h4>
              <p>Ice hockey is a fast, fluid and exciting team sport featuring two teams of six players (a goaltender and five skaters) on ice. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game7.svg" class="img-fluid" alt=""></div>
              <h4><a href="">Ice Hockey</a></h4>
              <p>Golf is a sport where the idea is to hit a ball with a club from the tee into the hole in as few strokes as possible.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game8.png" class="img-fluid" alt=""></div>
              <h4><a href="">Swimming</a></h4>
              <p>Swimming at the Olympics is both an individual and team sport either an outdoor or indoor swimming pool using one of the following strokes: 
                Freestyle, backstroke, breaststroke, or butterfly.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><img src="assets/img/games/game9.svg" class="img-fluid" alt=""></div>
              <h4><a href="">Table Tennis</a></h4>
              <p>Table tennis is a racket-and-ball sport played between two players or doubles teams, similar to tennis but on a table as its name suggests.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <<!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>videos</h3>
          <p> Click here to see the video</p>
          <a class="cta-btn" href="video-gallery.php">click Here</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Check our Images</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Archery</h4> 
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Athletics</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Badminton</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Boxing</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Cycling Road</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Golf</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Ice Hockey</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Swimming</h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Table Tennis</h4>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials1.jpg" class="testimonial-img" alt="">
                <h3>Michael Phelps</h3>
                <h4>Swimmer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I want to be able to look back and say, I’ve done everything I can, and I was successful. I don’t want to look back and say I should have done this or that.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials2.jpg" class="testimonial-img" alt="">
                <h3>Usain Bolt</h3>
                <h4>Athlete</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  I’ve worked hard over the years, I’ve been injured and I’ve worked hard through it, and I’ve made it.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials3.jpg" class="testimonial-img" alt="">
                <h3>Tiger Woods</h3>
                <h4>Golfer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  No matter who you are, the game is fluid. The game is always evolving, so you always have to keep working on it. There are plenty of hours in the day to get that done.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials4.jpg" class="testimonial-img" alt="">
                <h3>Michael Schumacher</h3>
                <h4>F1 Racer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  If you do things to the limit, and don't purposely go over that limit, then I think it's fine to do whatever you want. So long as you enjoy it. That's what's important.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials5.jpg" class="testimonial-img" alt="">
                <h3>Sachin Tendulkar</h3>
                <h4>Cricketer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  As far as the World Cup is concerned, it is a process. We don't want to jump to the 50th floor straight away. We must start on the ground floor.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Check our Team</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Thomas Bach</h4>
                <span>President</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/team2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>John Coates</h4>
                <span>Vice President<span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/team3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Dr. Robin E. Mitchell</h4>
                <span>Member</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="assets/img/team/team4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ivo Ferriani</h4>
                <span>Member</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.77824483396!2d2.2646340928718574!3d48.858938435151074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis%2C%20France!5e0!3m2!1sen!2snp!4v1687981643163!5m2!1sen!2snp" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Yokyo, Paris, France</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+33 5 89 55 48 85</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>FunOlympics<span>.</span></h3>
              <p>
                Yokyo<br>
                Paris, France<br><br>
                <strong>Phone:</strong> +33 5 89 55 48 85<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Sports</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Search</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Search">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FunOlympics</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
        Designed by Yugal</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>