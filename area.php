<!doctype html>
<?php
include "includes/config.php";
$query = mysqli_query($connection, "SELECT * FROM area");
$query1 = mysqli_query($connection, "SELECT * FROM berita limit 3");
$query2 = mysqli_query($connection, "SELECT * FROM hotel");
$query3 = mysqli_query($connection, "SELECT * FROM kabupaten");
$query4 = mysqli_query($connection, "SELECT * FROM destinasi");
$query5 = mysqli_query($connection, "SELECT * FROM event limit 2");
$query6 = mysqli_query($connection, "SELECT * FROM kategori");


$berita = mysqli_query($connection, "SELECT * FROM destinasi, berita WHERE destinasi.destinasiID = berita.destinasiID");

$sql1 = mysqli_query($connection, "SELECT * FROM area");
$jumarea = mysqli_num_rows($sql1);

$sql2 = mysqli_query($connection, "SELECT * FROM berita");
$jumber = mysqli_num_rows($sql2);

$sql3 = mysqli_query($connection, "SELECT * FROM destinasi");
$jumdes = mysqli_num_rows($sql3);

$sql4 = mysqli_query($connection, "SELECT * FROM fotodestinasi");
$jumfotdes = mysqli_num_rows($sql4);

$sql5 = mysqli_query($connection, "SELECT * FROM hotel");
$jumhot = mysqli_num_rows($sql5);

$sql6 = mysqli_query($connection, "SELECT * FROM kabupaten");
$jumkab = mysqli_num_rows($sql6);

$sql7 = mysqli_query($connection, "SELECT * FROM kamar");
$jumkam = mysqli_num_rows($sql7);

$sql8 = mysqli_query($connection, "SELECT * FROM kategori");
$jumkat = mysqli_num_rows($sql8);

$foto = mysqli_query($connection, "SELECT * FROM fotodestinasi limit 6");


?>


<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <title>UntarTravel</title>
</head>
<style>
  .carousel-inner img {
    filter: brightness(70%);
    object-fit: cover;
  }

  .contain h2 {
    border-
  }
</style>

<script src="https://kit.fontawesome.com/68c14e82e2.js" crossorigin="anonymous"></script>

<body style="background:#F5F5F5">

  <!-- membuat menu -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="LogoUntar.png" width="150px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="area.php">Area <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="kabupaten.php">Kabupaten <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="hotel.php">Hotel & Kamar <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            Kategori
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php if (mysqli_num_rows($query6) > 0) {
              while ($row = mysqli_fetch_array($query6)) { ?>
                <a class="dropdown-item" href="kategori.php?pindah=<?php echo $row["kategoriID"] ?>"><?php echo $row["kategoriNama"] ?> - <?php echo $row["kategoriReferensi"] ?></a>
            <?php
              }
            } ?>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="kuliner.php">Kuliner <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="provinsi.php">Provinsi <span class="sr-only">(current)</span></a>
        </li>

      </ul>
    </div>
  </nav>

  <!-- akhir menu -->

  <!-- slider -->

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/view1.jpg" class="d-block w-100" alt="First slide" width="640" height="630">
      </div>
    </div>
  </div>

  <!-- akhir slider -->



  <!-- area -->

  <div class="jumbotron jumbotron-fluid" style="background:gray;">
    <div class="container">
      <b>
        <h1 class="display-4" style="justify-content:center;display:flex">Daftar Area</h1>
      </b>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <?php while ($row5 = mysqli_fetch_array($query)) { ?>
        <div class="col-sm-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row5["areaNama"] ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $row5["areaWilayah"] ?></h6>
              <p class="card-text"><?php echo $row5["areaKeterangan"] ?></p>
            </div>
          </div>
          <br>
        </div>
        <br>
      <?php } ?>
    </div>
    <br>
  </div>

  <!-- akhir area -->

  <br><br><br>
  <!-- membuat tampilan objek -->

  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <h2>NEWS</h2>

        <?php if (mysqli_num_rows($berita) > 0) {
          while ($row2 = mysqli_fetch_array($berita)) { ?>

            <div class="card" style="width: 40rem;">
              <div class="card-body">
                <h4 class="mt-0 mb-1"><?php echo $row2["beritaJudul"] ?></h4>
                <p><?php echo $row2["beritaInti"] ?></p>
                <b>
                  <p>Penulis : <?php echo $row2["penulis"] ?> || Penerbit : <?php echo $row2["penerbit"] ?></p>
                </b>
                <p>Tanggal Terbit : <?php echo $row2["tanggalTerbit"] ?></p>
              </div>
            </div>

            <br>
        <?php }
        } ?>

        <a href="berita.php" class="btn btn-info" style="justify-content:center">
          <?php
          if ($jumber < 4) {
            echo "View More News";
          } else {
            echo $jumber - 3;
            echo " More News";
          } ?></a>
      </div>


      <div class="col-sm-4">
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Area
            <span class="badge badge-primary badge-pill"><?php echo $jumarea ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Berita
            <span class="badge badge-primary badge-pill"><?php echo $jumber ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Destinasi
            <span class="badge badge-primary badge-pill"><?php echo $jumdes ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Foto Destinasi
            <span class="badge badge-primary badge-pill"><?php echo $jumfotdes ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Hotel
            <span class="badge badge-primary badge-pill"><?php echo $jumhot ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Kabupaten
            <span class="badge badge-primary badge-pill"><?php echo $jumkab ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Kamar
            <span class="badge badge-primary badge-pill"><?php echo $jumkam ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Jumlah Objek Kategori
            <span class="badge badge-primary badge-pill"><?php echo $jumkat ?></span>
          </li>
        </ul>

        <br><br>

        <h3 style="display:flex; justify-content:center">Video Tentang Kami</h3>
        <iframe width="350" height="315" src="https://www.youtube.com/embed/f59dDEk57i0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>

  <!-- end objek -->

  <br><br><br>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

<!-- Footer -->
<footer class="text-center text-lg-start bg-dark text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block text-white">
      <span>Media sosial UntarTravel:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-white">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-white">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-white">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-white">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-white">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-white">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" style="color:white">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="text-secondary"></i>UntarTravel
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 text-white">
            Products
          </h6>
          <p>
            <a href="#!" class="text-white">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-white">React</a>
          </p>
          <p>
            <a href="#!" class="text-white">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-white">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 text-white">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-white">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-white">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-white">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-white">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-white">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4 text-white ">Contact</h6>
          <p><i class="fas fa-home me-3 text-white"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3 text-white"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3 text-white"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3 text-white"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4 text-white" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2022 Copyright:
    <a class="text-reset fw-bold">UntarTravel</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</html>