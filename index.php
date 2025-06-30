<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SEA - Catering App</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename">SEA Catering</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="index.php#book-a-table">Subscribe</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="dropdown">
            <?php if (isset($_SESSION['user_id'])) { ?>  
            <a><img src="assets\img\testimonials\default.jpg" width="32" height="32" class="rounded-circle me-2">
              <span class="d-none d-sm-inline"><?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span> 
              <i class="bi bi-chevron-down toggle-dropdown"></i>
            </a>
            <ul> 
              <li><a href="user.php">
                    <img src="assets\img\dashboard.png" width="20" height="20">
                    <span>Dashboard</span>
                  </a>
              </li>
              <li><a href="forms/logout.php">
                    <img src="assets/img/power-off.png" width="20" height="20">
                    <span>Logout</span>
                  </a>
              </li>
            </ul> 
            <?php } else { ?>
            <div>
              <a class="btn-getstarted" href="auth.php">Login</a>
            </div>
            <?php } ?>
          </li>
        
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Healthy Meals, Anytime,<br>Anywhere</h1>
            <p data-aos="fade-up" data-aos-delay="100">We are catering team for your customizable healthy meal for all across Indonesia </p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#book-a-table" class="btn-get-started">Subscribe</a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p><span>Learn More</span> <span class="description-title">About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid mb-4" alt="">
            <div class="book-a-table">
              <h3>Have a Question? Contact at</h3>
              <p>+628123456789</p>
            </div>
          </div>
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                SEA Catering adalah perusahaan katering profesional yang didedikasikan untuk menyediakan makanan bergizi dan lezat di berbagai daerah di Indonesia.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Kami menawarkan rencana makan yang disesuaikan dengan tujuan kesehatan dan kebutuhan diet.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Menu kami disiapkan dengan bahan-bahan segar dan berkualitas tinggi oleh koki berpengalaman.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Baik untuk perorangan, acara, atau klien korporat, kami memastikan pengiriman tepat waktu dan higienis ke seluruh negeri.</span></li>
              </ul>
              <p>
                Di SEA Catering, kami percaya bahwa makanan sehat tidak harus membosankan. Dengan pilihan seperti Diet Plan, Protein Plan, dan Royal Plan, kami berusaha menjadikan setiap hidangan sebagai pengalaman. Misi kami adalah mendukung gaya hidup yang lebih sehat dengan menawarkan makanan yang bergizi dan lezat — tepat di depan pintu Anda.
              </p>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Kenapa SEA Catering ?</h3>
              <p>
                Di SEA Catering, kami percaya bahwa makanan yang baik akan menghasilkan kehidupan yang hebat.
                Itulah sebabnya kami menyiapkan setiap hidangan dengan hati-hati — hanya menggunakan bahan-bahan segar dan teknik kuliner ahli.
                Baik Anda mencari diet seimbang, makanan pembentuk otot, atau cita rasa mewah,
                paket langganan kami dirancang untuk memenuhi kebutuhan Anda, di mana pun Anda berada di Indonesia.
              </p>

              <div class="text-center">
                <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->
 
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">
              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-clipboard-data"></i>
                  <h4>Meal Plans yang dipersonalisasi</h4>
                  <p>Kami menawarkan langganan makanan yang dapat disesuaikan dengan kebutuhan diet dan tujuan gaya hidup Anda.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-gem"></i>
                  <h4>Bahan Baku Premium</h4>
                  <p>Setiap hidangan dibuat menggunakan bahan-bahan segar dan berkualitas tinggi untuk memastikan rasa dan gizi.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-inboxes"></i>
                  <h4>Pengiriman Skala Nasional</h4>
                  <p>Nikmati hidangan sehat dan lezat yang diantar langsung ke rumah Anda—di mana pun di Indonesia.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background">

      <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Menu</h2>
        <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#diet-plan">
              <h4>Diet Plan</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#protein-plan">
              <h4>Protein Plan</h4>
            </a><!-- End tab nav item -->

          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#royal-plan">
              <h4>Royal Plan</h4>
            </a>
          </li><!-- End tab nav item -->

        </ul>
        <!-- MEAL CONTENT -->

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <!-- DIET PLAN MENU -->
          <div class="tab-pane fade show active" id="diet-plan">
            <!-- Modal for Diet Plan -->
            <div class="modal fade" id="dietPlanModal" tabindex="-1" aria-labelledby="dietPlanModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="dietPlanModalLabel">Diet Plan - Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Deskripsi:</strong> Diet Plan kami dirancang untuk memenuhi kebutuhan kalori rendah, 
                      tetapi tetap kaya nutrisi dan lezat. Cocok untuk kamu yang ingin menjaga berat badan atau hidup lebih sehat.</p>
                    <p><strong>Termasuk:</strong></p>
                    <ul>
                      <li>Sarapan bergizi (rendah gula, tinggi serat)</li>
                      <li>Makan siang seimbang protein dan sayur</li>
                      <li>Makan malam ringan, rendah kalori</li>
                    </ul>
                    <p><strong>Catatan:</strong> Semua bahan segar dan bebas MSG. Tersedia opsi vegetarian atas permintaan.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-header text-center">
              <p>Diet Plan</p>
              <div class="text-center mt-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dietPlanModal">
                  See More Details
                </button>
              </div>
              <h3>Breakfast</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-1.jpg" class="menu-img img-fluid" alt="">
                <h4>Overnight Oats</h4>
                <p class="ingredients">
                  Oats, chia seed, pisang, madu, susu almond
                </p>
                <p class="price">
                  Rp30.000,00
                </p>
              </div>
            </div>

            <div class="tab-header text-center">
              <h3>Lunch</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-2.jpg" class="menu-img img-fluid" alt="">
                <h4>Ayam Bakar + Nasi Merah</h4>
                <p class="ingredients">
                  Ayam panggang, nasi merah, brokoli, wortel
                </p>
                <p class="price">
                  Rp30.000,00
                </p>
              </div>
            </div>

            <div class="tab-header text-center">
              <h3>Dinner</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-3.png" class="menu-img img-fluid" alt="">
                <h4>Sup Ayam Bening</h4>
                <p class="ingredients">
                  Dada ayam, brokoli, wortel, bawang putih
                </p>
                <p class="price">
                  Rp30.000,00
                </p>
              </div>
            </div>
          </div><!-- END DIET PLAN MENU -->

          <!-- PROTEIN PLAN MENU -->
           <div class="tab-pane fade" id="protein-plan">
            <!-- Modal for Diet Plan -->
            <div class="modal fade" id="proteinPlanModal" tabindex="-1" aria-labelledby="proteinPlanModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="dietPlanModalLabel">Diet Plan - Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Deskripsi:</strong> Protein Plan kami dirancang untuk memenuhi kebutuhan protein yang tinggi dan tentunya lezat. 
                      Cocok untuk kamu yang sering fitness dan berolahraga.</p>
                    <p><strong>Termasuk:</strong></p>
                    <ul>
                      <li>Sarapan bergizi (rendah gula, tinggi serat dan protein)</li>
                      <li>Makan siang tinggi protein dan sayur</li>
                      <li>Makan malam ringan, rendah kalori dan tinggi protein</li>
                    </ul>
                    <p><strong>Catatan:</strong> Semua bahan segar dan bebas MSG. Tersedia opsi vegetarian atas permintaan.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-header text-center">
              <p>Protein Plan</p>
              <div class="text-center mt-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#proteinPlanModal">
                  See More Details
                </button>
              </div>
              <h3>Breakfast</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-4.jpg" class="menu-img img-fluid" alt="">
                <h4>Telur Orak-Arik + Roti Gandum</h4>
                <p class="ingredients">
                  3 butir telur, roti gandum, alpukat
                </p>
                <p class="price">
                  Rp40.000,00
                </p>
              </div>
            </div>

            <div class="tab-header text-center">
              <h3>Lunch</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-5.png" class="menu-img img-fluid" alt="">
                <h4>Steak Ayam + Sweet Potato</h4>
                <p class="ingredients">
                  Dada ayam panggang, kentang manis, kacang panjang
                </p>
                <p class="price">
                  Rp40.000,00
                </p>
              </div>
            </div>

            <div class="tab-header text-center">
              <h3>Dinner</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-6.jpg" class="menu-img img-fluid" alt="">
                <h4>Sup Daging Sapi</h4>
                <p class="ingredients">
                  Daging sapi, wortel, kentang, seledri
                </p>
                <p class="price">
                  Rp40.000,00
                </p>
              </div>
            </div>
          </div><!-- END PROTEIN PLAN MENU -->

          <!-- ROYAL PLAN MENU -->
          <div class="tab-pane fade" id="royal-plan">
            <!-- Modal for Diet Plan -->
            <div class="modal fade" id="royalPlanModal" tabindex="-1" aria-labelledby="royalPlanModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="dietPlanModalLabel">Diet Plan - Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                  </div>
                  <div class="modal-body">
                    <p><strong>Deskripsi:</strong> Royal Plan kami dirancang untuk memenuhi kebutuhan nutrisi anda 
                      dengan bahan - bahan premium, segar, dan tentunya bernutrisi. 
                      Cocok untuk kamu yang ingin mencoba menu baru dengan nutrisi yang tinggi.</p>
                    <p><strong>Termasuk:</strong></p>
                    <ul>
                      <li>Sarapan bergizi (rendah gula, tinggi serat, dan tinggi protein)</li>
                      <li>Makan siang seimbang antara protein dan sayur</li>
                      <li>Makan malam ringan, rendah kalori dan tinggi akan nutrisi</li>
                    </ul>
                    <p><strong>Catatan:</strong> Semua bahan segar dan bebas MSG. Tersedia opsi vegetarian atas permintaan.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-header text-center">
              <p>Royal Plan</p>
              <div class="text-center mt-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#royalPlanModal">
                  See More Details
                </button>
              </div>
              <h3>Breakfast</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-7.jpg" class="menu-img img-fluid" alt="">
                <h4>Croissant Salmon</h4>
                <p class="ingredients">
                  Croissant, smoked salmon, cream cheese, daun dill
                </p>
                <p class="price">
                  Rp60.000,00
                </p>
              </div>
            </div>

            <div class="tab-header text-center">
              <h3>Lunch</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-8.jpg" class="menu-img img-fluid" alt="">
                <h4>Grilled Salmon + Couscous</h4>
                <p class="ingredients">
                  Salmon panggang, saus lemon butter, couscous, sayuran panggang
                </p>
                <p class="price">
                  Rp60.000,00
                </p>
              </div>
            </div>

            <div class="tab-header text-center">
              <h3>Dinner</h3>
            </div>
            <div class="row gy-5">
              <div class="col-lg-4 offset-lg-4 menu-item">
                <img src="assets\img\menu\menu-item-9.jpg" class="menu-img img-fluid" alt="">
                <h4>Salad Dory Panggang</h4>
                <p class="ingredients">
                  Ikan dory, lemon, quinoa salad, parsley
                </p>
                <p class="price">
                  Rp60.000,00
                </p>
              </div>
            </div>
          </div><!-- END ROYAL PLAN MENU -->

        </div>

      </div>

    </section><!-- /Menu Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>TESTIMONIALS</h2>
        <p>What Are They <span class="description-title">Saying About Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Mantap, Makanan berkualitas dan rasanya yang tentunya seperti di restoran ternama, juga pelayanan yang cepat dan tepat  </span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Saul Wijaya</h3>
                      <h4>Ceo &amp; Founder</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Menu Makanan Diet sangat enak porsi yang pas bagi saya yang tidak bisa makan terlalu banyak.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Sara Kusuma</h3>
                      <h4>Designer</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Pelayanannya sangat baik dari segi apapun, baik itu dari makanan, pengiriman, porsi, hingga penyajian yang sangat diperhatikan.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>Jena putri</h3>
                      <h4>Store Owner</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                      <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <span>Pokonya Mantap, Makanan enak, pelayanan cepat, tepat, dan ramah, Makanan sampai dalam keadaan hangat bintang 5.</span>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3>John Cena</h3>
                      <h4>Entrepreneur</h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="assets/img/testimonials/testimonials-4.jpg" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <!-- Testimonials item -->
            <?php
              $conn = new mysqli("localhost", "root", "", "catering");
              if ($conn->connect_error) {
                echo "<div class='swiper-slide'><p class='text-danger'> Gagal konek DB</p></div>";
              } else {
                $result = $conn->query("SELECT name, message, rating FROM testimonies ORDER BY id DESC LIMIT 10");

                while ($row = $result->fetch_assoc()) {
                  $stars = str_repeat("<i class='bi bi-star-fill'></i>", (int)$row['rating']);
                  echo "
                  <div class='swiper-slide'>
                    <div class='testimonial-item'>
                      <div class='row gy-4 justify-content-center'>
                        <div class='col-lg-6'>
                          <div class='testimonial-content'>
                            <p>
                              <i class='bi bi-quote quote-icon-left'></i>
                              <span>{$row['message']}</span>
                              <i class='bi bi-quote quote-icon-right'></i>
                            </p>
                            <h3>{$row['name']}</h3>
                            <div class='stars'>{$stars}</div>
                          </div>
                        </div>
                        <div class='col-lg-2 text-center'>
                          <img src='assets/img/testimonials/default.jpg' class='img-fluid testimonial-img' alt=''>
                        </div>
                      </div>
                    </div>
                  </div>
                  ";
                }
                $conn->close();
              }
            ?><!-- END Testimonials Item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Subscription Section -->
    <section id="book-a-table" class="book-a-table section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Subscribe</h2>
        <p><span>Book Your</span> <span class="description-title">Catering with us<br></span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"></div>
          <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">

          <?php if (!isset($_SESSION['user_id'])) { ?>
            <div class="container my-5">
              <div class="alert alert-warning text-center shadow-sm border border-warning rounded p-4">
                <h5 class="mb-3 text-dark">🔒 Akses Terbatas</h5>
                <p class="mb-3">Anda harus login terlebih dahulu untuk dapat berlangganan layanan kami.</p>
                <a href="auth.php" class="btn btn-primary btn-sm">🔐 Login Sekarang</a>
              </div>
            </div>
          <?php } else { ?>
            
            <form action="forms/subscription.php" method="post" role="form" class="php-email-form">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required="">
                </div>
                <div class="col-lg-4 col-md-6">
                  <select class="form-control" name="plan" id="plan" required>
                    <option value="" disabled selected>Select Plan</option>
                    <option value="Diet">Diet Plan - Rp30.000/meal</option>
                    <option value="Protein">Protein Plan - Rp40.000/meal</option>
                    <option value="Royal">Royal Plan - Rp60.000/meal</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label" for="Meal_Type">Select Meal Type:</label>
                  <select class="form-select" name="Meal_Type[]" id="Meal_Type" multiple size="3" required>
                    <option value="" disabled>Meal Type</option>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                  </select>
                  <div class="form-text">
                    <i class="fas fa-info-circle"></i> 
                    Select one or more Meal type. Hold Ctrl (Windows/Linux) or Cmd (Mac) while clicking to select multiple days.
                    <br>
                    <small class="text-muted">You can choose any combination: single day, weekdays only, weekends only, or all 7 days.</small>
                  </div>
                </div>
                <div class="col-12">
                  <label class="form-label" for="delivery_days">Select Delivery Days:</label>
                  <select class="form-select" name="delivery_days[]" id="delivery_days" multiple size="7" required>
                    <option value="" disabled>delivery days</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                  </select>
                  <div class="form-text">
                    <i class="fas fa-info-circle"></i> 
                    Select one or more delivery days. Hold Ctrl (Windows/Linux) or Cmd (Mac) while clicking to select multiple days.
                    <br>
                    <small class="text-muted">You can choose any combination: single day, weekdays only, weekends only, or all 7 days.</small>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <select class="form-control" name="payment" id="payment" required>
                    <option value="" disabled selected>Payment Method</option>
                    <option value="Cash On Delivery">Cash On Delivery</option>
                  </select>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="address" rows="3" placeholder="Your Address" required></textarea>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="note" rows="3" placeholder="Have any note? drop your note here"></textarea>
              </div>
              <div class="text-center mt-3">
                <button type="button" id="calculatePriceBtn" class="btn btn-danger">
                  Subscribe
                </button>
              </div>
            </form>
          </div><!-- End Subscription Form -->
          <?php } ?>
          
        </div>
        <!-- Payment Modal -->
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Subscription Summary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <p><strong>Name:</strong> <span id="summaryName"></span></p>
                <p><strong>Phone:</strong> <span id="summaryPhone"></span></p>
                <p><strong>Plan:</strong> <span id="summaryPlan"></span></p>
                <p><strong>Meal Types:</strong> <span id="summaryMeals"></span></p>
                <p><strong>Delivery Days:</strong> <span id="summaryDays"></span></p>
                <p><strong>payment Method:</strong> <span id="paymentMethod"></span></p>
                <p><strong>Total Price:</strong> <span id="summaryPrice" class="fw-bold text-success"></span></p>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Edit</button>
                <button type="submit" class="btn btn-success" id="confirmPayBtn">Submit</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Success Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-success text-white">
              <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Subscription Successful</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Terima kasih! Langganan Anda telah dikonfirmasi.
              </div>
            </div>
          </div>
        </div>

        <!-- Error Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-danger text-white">
              <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Subscription Failed</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Maaf, terjadi kesalahan saat memproses langganan Anda. Coba lagi.
              </div>
            </div>
          </div>
        </div>

        <!-- Loading Modal -->
        <div class="modal fade" id="loadingModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
              <div class="modal-body py-4">
                <div class="spinner-border text-primary mb-3" role="status"></div>
                <p class="mb-0">Processing your subscription...</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- Subscription Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 5,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Gallery Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
          <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.123456789012!2d107.6081234!3d-6.9201234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e67...!2sJl.%20Gatot%20Subroto,%20Bandung!5e0!3m2!1sen!2sid!4v..." frameborder="0" allowfullscreen=""></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Contact Person</h3>
                <p>Brian</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+628123456789</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>Brian@example.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="icon bi bi-clock flex-shrink-0"></i>
              <div>
                <h3>Opening Hours<br></h3>
                <p><strong>Mon-Sat:</strong> 11AM - 23PM; <strong>Sunday:</strong> Closed</p>
              </div>
            </div>
          </div><!-- End Info Item -->
        </div>
      </div>
    </section><!-- /Contact Section -->

    <!-- Testimonial Submission Form -->
    <section id="testimonial-form" class="testimonial-form section">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Share Your Experience</h2>
          <p>We'd love to hear your thoughts!</p>
        </div>

        <form action="forms/testimoni.php" method="post" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="customer_name" class="form-control" placeholder="Your Name" required>
            </div>

            <div class="col-md-6">
              <select class="form-control" name="rating" required>
                <option value="" disabled selected>Rating (1-5)</option>
                <option value="1">★☆☆☆☆ (1)</option>
                <option value="2">★★☆☆☆ (2)</option>
                <option value="3">★★★☆☆ (3)</option>
                <option value="4">★★★★☆ (4)</option>
                <option value="5">★★★★★ (5)</option>
              </select>
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="review" rows="6" placeholder="Write your review here..." required></textarea>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" class = "btn btn-danger">Submit Testimonial</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Modal Testimoni Berhasil -->
      <div class="modal fade" id="testimonialSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-success text-white">
            <div class="modal-header">
              <h5 class="modal-title">Testimoni Terkirim</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              Terima kasih! Testimoni Anda telah tersimpan.
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Testimoni Gagal -->
      <div class="modal fade" id="testimonialErrorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content bg-danger text-white">
            <div class="modal-header">
              <h5 class="modal-title">Gagal Mengirim Testimoni</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              Maaf, terjadi kesalahan saat menyimpan testimoni. Coba lagi.
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Testimonial Submission Form -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Contact person</h4>
            <p>Brian</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+628123456789</span><br>
              <strong>Email:</strong> <span>Brian@mail.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">SEA Catering </strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>