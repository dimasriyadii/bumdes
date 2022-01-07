<?php 
$halaman = 'index';
include 'global_header.php'; 
include 'global_navigasi.php'
?>
<div class="content">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Dashboard
                </div>
                <h2 class="page-title">
                  SIBUMDES - Sistem Informasi Badan Usaha Milik Desa.
                </h2>
              </div>
            </div>
          </div>
          <div class="row row-deck row-cards">
            <div class="card">
                <div class="card-body">
                  <div id="carousel-indicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-bs-target="#carousel-indicators" data-bs-slide-to="0" class="active"></li>
                      <li data-bs-target="#carousel-indicators" data-bs-slide-to="1" class=""></li>
                      <li data-bs-target="#carousel-indicators" data-bs-slide-to="2" class=""></li>
                      <li data-bs-target="#carousel-indicators" data-bs-slide-to="3" class=""></li>
                      <li data-bs-target="#carousel-indicators" data-bs-slide-to="4" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" alt="" src="./img/slide/6ab3200b14549f8a.jpg" style="height: 400px;">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" alt="" src="./img/slide/6d35d9a2bd6c63c2.jpg" style="height: 400px;">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" alt="" src="./img/slide/75b555b99d5b38c4.jpg" style="height: 400px;">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" alt="" src="./img/slide/546fd146c83f428c.jpg"style="height: 400px;" >
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" alt="" src="./img/slide/1194d63fe36a8670.jpg" style="height: 400px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

<?php include 'global_footer.php'; ?>