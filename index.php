<!-- Membatasi user yang login, jika sudah login maka tidak bisa mengakses file ini -->
<?php
// Start the session
if( empty(session_id()) && !headers_sent()){
  session_start();
}
// session_start();

if(isset($_SESSION["user"])){
  echo "<script> window.location.href = 'backend/dashboard.php' </script>";
  // header('Location:login.php');
  // exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tirta Agung</title>

    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/bootstrap.css">

    <!-- CSS Tambahan -->
    <link rel="stylesheet" href="frontend/css/web-tirta.css">
    
    <!-- Template Vendor CSS Files untuk Gallery -->
    <link href="frontend/template/animate.css/animate.min.css" rel="stylesheet">
    <link href="frontend/template/aos/aos.css" rel="stylesheet">
    <link href="frontend/template/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/template/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="frontend/template/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="frontend/template/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Style -->
    <style>
      .foto-profil {
        width:35px;
        border-radius:50%;
        margin-left:50px;
      }
      /* Button Login */
      .btn-login {
        margin-left:5px;
      }
    </style>

</head>
<body>
    <!-- Navbar -->
    <?php include 'layout/navbar.php'; ?>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="frontend/images/tirta.jpg" class="d-block w-100" alt="...">
          <!-- <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div> -->
        </div>
        <div class="carousel-item">
          <img src="frontend/images/kalasenja.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="frontend/images/kolam.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>

    <!-- Gallery -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Gallery</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100"">
      <div class=" col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-a">Tirta Agung</li>
            <li data-filter=".filter-b">Kala Senja</li>
            <li data-filter=".filter-c">Dapur Konah</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 portfolio-item filter-a">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/tirta.jpg" class="img-fluid" alt="">
              <a href="frontend/images/tirta.jpg" data-lightbox="portfolio" data-title="Tirta 1" class="link-preview"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-c">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/dapurkonah.jpeg" class="img-fluid" alt="">
              <a href="frontend/images/dapurkonah.jpeg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Dapur Konah 1"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-a">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/tirta2.jpg" class="img-fluid" alt="">
              <a href="frontend/images/tirta2.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Tirta 2"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-b">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/kalasenja.jpg" class="img-fluid" alt="">
              <a href="frontend/images/kalasenja.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Kala Senja 1"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-c">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/dapurkonah.jpeg" class="img-fluid" alt="">
              <a href="frontend/images/dapurkonah.jpeg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Web 2"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-a">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/tirta3.jpg" class="img-fluid" alt="">
              <a href="frontend/images/tirta3.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Tirta 3"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-b">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/kalasenja2.jpg" class="img-fluid" alt="">
              <a href="frontend/images/kalasenja2.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Kala Senja 2"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-b">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/kalasenja.jpg" class="img-fluid" alt="">
              <a href="frontend/images/kalasenja.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Kala Senja 3"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-a">
          <div class="portfolio-wrap">
            <figure>
              <img src="frontend/images/kolam.jpg" class="img-fluid" alt="">
              <a href="frontend/images/kolam.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Kolam Tirta"><i class="bi bi-plus"></i></a>
            </figure>
          </div>
        </div>

      </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- News -->
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          
        </div>
        <div class="col-md-6">
          <header class="section-header">
            <h3 class="section-title">Events</h3>
          </header>
        </div>
      </div>
      <?php
      include 'koneksi.php';

      $query = "SELECT * from artikel ORDER BY id_artikel DESC";
      $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
      $terbaru = mysqli_fetch_array($query_mysql)
      ?>
      <div class="row">
        <div class="col-md-6">
          <img src="backend/images/artikel/<?php echo $terbaru['gambar']; ?>" class="img-thumbnail" alt="...">
        </div>
        
        <div class="col-md-6">
          <?php 
          include 'koneksi.php';

          $query = "SELECT * from artikel ORDER BY id_artikel DESC";
          $query_mysql = mysqli_query($koneksi,$query) or die(mysqli_error());
          while($data = mysqli_fetch_array($query_mysql)){
          ?>
          <div class="row">
            <div class="col-md-4">
            <img src="backend/images/artikel/<?php echo $data['gambar']; ?>" width="150px" class="img-thumbnail">
            </div>
            <div class="col-md-8">
            <?php echo $data['judul']; ?> 
            <a href="#" >Read More</a></td>
            </div>
          </div>
          <hr>
          <?php } ?>
        </div>
      </div>
    </div>

    <br>
    
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
          <h1 class="display-6">Desa Wisata Tirta Agung</h1>
          <p class="lead">Pesona khas pedesaan dan obyek wisata budaya.</p>
      </div>
    </div>

    <!-- Maps -->
    <div class="container">
      
        <header class="section-header">
          <h3 class="section-title">Maps & Facilities</h3>
        </header>
      
      <div class="row">
        <div class="col-md-6">
          <!-- sedang -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7902.383939546249!2d113.983402!3d-7.9791!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3233dfb414f95bcb!2sTirta%20Agung!5e0!3m2!1sid!2sid!4v1658504182052!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <!-- kecil -->
          <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.1919698286733!2d113.98121371477929!3d-7.979099994253337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6cf952bfad54b%3A0x3233dfb414f95bcb!2sTirta%20Agung!5e0!3m2!1sid!2sid!4v1658293004157!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        </div>

        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Fasilitas</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-10">Pemandangan Terasering Sawah</div>
              </div>
              <div class="row">
                <div class="col-md-10">Kolam Renang</div>
              </div>
              <div class="row">
                <div class="col-md-10">Kuliner khas desa</div>
              </div>
              <div class="row">
                <div class="col-md-10">Spot foto menarik</div>
              </div>
              <div class="row">
                <div class="col-md-10">Edukasi pertanian</div>
              </div>
              <div class="row">
                 <div class="col-md-10">Homestay</div>
              </div>
            </div>
              <a href="#" class="btn btn-success">More</a>
          </div>
        </div>
      </div>
    </div><br>

    <!-- Footer -->
    <?php include 'layout/footer.php'; ?>
   
    <!-- Script -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Script tambahan gallery -->

    <!-- Template Vendor JS Files -->
    <script src="frontend/template/purecounter/purecounter.js"></script>
    <script src="frontend/template/aos/aos.js"></script>
    <script src="frontend/template/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/template/glightbox/js/glightbox.min.js"></script>
    <script src="frontend/template/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="frontend/template/swiper/swiper-bundle.min.js"></script>
    <script src="frontend/template/waypoints/noframework.waypoints.js"></script>
    <script src="frontend/template/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="frontend/js/main.js"></script>

    <!-- ------------------------------------------------------------------- -->
</body>
</html>
