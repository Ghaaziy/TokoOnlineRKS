<?php
require('config/db.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Toko Online Buku</title>
  <link rel="stylesheet" type="text/css" href="plugin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/main.css">
  <link rel="icon" type="image/gif/png" href="asset/img/Title.png">
</head>

<body>

  <?php include('component/nav.php'); ?>
  <div class="container-fluid" id="isi">


    <div class="row">
      <div class="col-xs-2 col-xs-offset-5" id="produk-laris">
        <h3 style="font-family: Blacksword; font-size:2.2em;"><strong>List Buku</strong></h3>
      </div>
    </div>



    <!-- Laman Produk-->

    <div class="container" id="produk">
      <div class="tab-content">
        <!-- novel -->
        <div id="novel" class="tab-pane fade in active">
          <ul>
            <?php
            require("config/db.php");
            $limit = 4;
            $sql = mysqli_query($conn, "SELECT count(idProduk) FROM tabel_produk WHERE kategori='novel'");
            $row = mysqli_fetch_array($sql);
            $rec_count = $row[0];
            if (isset($_GET['page'])) {
              $page = $_GET['page'] + 1;
              $offset = $limit * $page;
            } else {
              $page = 0;
              $offset = 0;
            }
            $left_rec = $rec_count - ($page * $limit);
            $queryNovel = "SELECT * FROM tabel_produk WHERE kategori='novel' LIMIT $offset,$limit";
            $query_novel = mysqli_query($conn, $queryNovel);

            while ($arraynovel = mysqli_fetch_array($query_novel)) {
              echo '
            <li>
              <a href="#' . $arraynovel['idProduk'] . '">
                <img src="admin/proses/' . $arraynovel['path'] . '" alt="' . $arraynovel['nama'] . '">
                <span></span>
              </a>
              <div class="overlay" id="' . $arraynovel['idProduk'] . '">
                <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
                <img src="admin/proses/' . $arraynovel['path'] . '">
                <div class="keterangan">
                  <div class="container">
                    <h4><strong>' . $arraynovel['nama'] . '</strong></h4>
                    <p>' . $arraynovel['keterangan'] . '</p>
                    <h5>Rp.' . $arraynovel['harga'] . '</h5>
                    <button type="button" class="btn btn-success">Stock : ' . $arraynovel['stock'] . '</button>
                    ';
              if (isset($_SESSION['idUser'])) {
                if ($arraynovel['stock'] > 0) {
                  echo '
                  <a href="proses/beli.php?idProduk=' . $arraynovel['idProduk'] . '&idUser=' . $iduser . '"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                } else {
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              } else {
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
            }
            ?>
            <div class="clear"></div>
          </ul>

          <div class="container-fluid" id="paging">
            <div class="paging">
              <?php
              if ($left_rec < $limit) {
                $last = $page - 2;
                echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
              } else if ($page > 0) {
                $last = $page - 2;
                echo "<a href = \"?page=$last\"><button type='button' class='btn btn-primary left'>Previous</button></a>";
                echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
              } else if ($page == 0) {
                echo "<a href = \"?page=$page\"><button type='button' class='btn btn-primary right'>Next</button></a>";
              }
              ?>
            </div>
          </div>
        </div>
        <!-- end of novel -->

        <!-- cerpen -->
        <div id="cerpen" class="tab-pane fade">
          <ul>
            <?php
            require("config/db.php");

            $querycerpen = "SELECT * FROM tabel_produk WHERE kategori='cerpen' LIMIT 0,4";
            $query_cerpen = mysqli_query($conn, $querycerpen);

            while ($arraycerpen = mysqli_fetch_array($query_cerpen)) {
              echo '
            <li>
        <a href="#' . $arraycerpen['idProduk'] . '">
          <img src="admin/proses/' . $arraycerpen['path'] . '" alt="' . $arraycerpen['nama'] . '">
          <span></span>
        </a>
        <div class="overlay" id="' . $arraycerpen['idProduk'] . '">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/' . $arraycerpen['path'] . '">
          <div class="keterangan">
            <div class="container">
              <h4><strong>' . $arraycerpen['nama'] . '</strong></h4>
              <p>' . $arraycerpen['keterangan'] . '</p>
              <h5>Rp.' . $arraycerpen['harga'] . '</h5>
              <h5 class="ukur">Ukuran : ' . $arraycerpen['ukuran'] . '</h5>
              <button type="button" class="btn btn-success">Stock : ' . $arraycerpen['stock'] . '</button>
              ';
              if (isset($_SESSION['idUser'])) {
                if ($arraycerpen['stock'] > 0) {
                  echo '
                  <a href="proses/beli.php?idProduk=' . $arraycerpen['idProduk'] . '&idUser=' . $iduser . '"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                } else {
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              } else {
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
            }
            ?>
            <div class="clear"></div>
          </ul>
        </div>
        <!-- end of cerpen -->

        <!-- sejarah -->
        <div id="sejarah" class="tab-pane fade">
          <ul>
            <?php
            require("config/db.php");

            $querysejarah = "SELECT * FROM tabel_produk WHERE kategori='sejarah' LIMIT 0,4";
            $query_sejarah = mysqli_query($conn, $querysejarah);

            while ($arraysejarah = mysqli_fetch_array($query_sejarah)) {
              echo '
            <li>
            <a href="#' . $arraysejarah['idProduk'] . '">
              <img src="admin/proses/' . $arraysejarah['path'] . '" alt="' . $arraysejarah['nama'] . '">
              <span></span>
            </a>
            <div class="overlay" id="' . $arraysejarah['idProduk'] . '">
              <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
              <img src="admin/proses/' . $arraysejarah['path'] . '">
              <div class="keterangan">
                <div class="container">
                  <h4><strong>' . $arraysejarah['nama'] . '</strong></h4>
                  <p>' . $arraysejarah['keterangan'] . '</p>
                  <h5>Rp.' . $arraysejarah['harga'] . '</h5>
                  <h5 class="ukur">Ukuran : ' . $arraysejarah['ukuran'] . '</h5>
                  <button type="button" class="btn btn-success">Stock : ' . $arraysejarah['stock'] . '</button>
                  ';
              if (isset($_SESSION['idUser'])) {
                if ($arraysejarah['stock'] > 0) {
                  echo '
                      <a href="proses/beli.php?idProduk=' . $arraysejarah['idProduk'] . '&idUser=' . $iduser . '"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                    ';
                } else {
                  echo '
                      <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                    ';
                }
              } else {
                echo '
                      <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                    ';
              }
              echo '
                </div>
              </div>
            </div>
          </li>  
          ';
            }
            ?>
            <div class="clear"></div>
          </ul>
        </div>
        <!-- end of sejarah -->

        <!-- pelajaran-pelajaran -->
        <div id="pelajaran" class="tab-pane fade">
          <ul>
            <?php
            require("config/db.php");

            $querypelajaran = "SELECT * FROM tabel_produk WHERE kategori='pelajaran' LIMIT 0,4";
            $query_pelajaran = mysqli_query($conn, $querypelajaran);

            while ($arraypelajaran = mysqli_fetch_array($query_pelajaran)) {
              echo '
            <li>
        <a href="#' . $arraypelajaran['idProduk'] . '">
          <img src="admin/proses/' . $arraypelajaran['path'] . '" alt="' . $arraypelajaran['nama'] . '">
          <span></span>
        </a>
        <div class="overlay" id="' . $arraypelajaran['idProduk'] . '">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/' . $arraypelajaran['path'] . '">
          <div class="keterangan">
            <div class="container">
              <h4><strong>' . $arraypelajaran['nama'] . '</strong></h4>
              <p>' . $arraypelajaran['keterangan'] . '</p>
              <h5>Rp.' . $arraypelajaran['harga'] . '</h5>
              <h5 class="ukur">Ukuran : ' . $arraypelajaran['ukuran'] . '</h5>
              <button type="button" class="btn btn-success">Stock : ' . $arraypelajaran['stock'] . '</button>
              ';
              if (isset($_SESSION['idUser'])) {
                if ($arraypelajaran['stock'] > 0) {
                  echo '
                  <a href="proses/beli.php?idProduk=' . $arraypelajaran['idProduk'] . '&idUser=' . $iduser . '"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                } else {
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              } else {
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
            }
            ?>
            <div class="clear"></div>
          </ul>
        </div>
        <!-- end of pelajaran-pelajaran -->
        <!-- cernak -->
        <div id="cernak" class="tab-pane fade">
          <ul>
            <?php
            require("config/db.php");

            $querycernak = "SELECT * FROM tabel_produk WHERE kategori='cernak' LIMIT 0,4";
            $query_cernak = mysqli_query($conn, $querycernak);

            while ($arraycernak = mysqli_fetch_array($query_cernak)) {
              echo '
            <li>
        <a href="#' . $arraycernak['idProduk'] . '">
          <img src="admin/proses/' . $arraycernak['path'] . '" alt="' . $arraycernak['nama'] . '">
          <span></span>
        </a>
        <div class="overlay" id="' . $arraycernak['idProduk'] . '">
          <a href="#" class="close"><i class="glyphicon glyphicon-remove"></i></a>
          <img src="admin/proses/' . $arraycernak['path'] . '">
          <div class="keterangan">
            <div class="container">
              <h4><strong>' . $arraycernak['nama'] . '</strong></h4>
              <p>' . $arraycernak['keterangan'] . '</p>
              <h5>Rp.' . $arraycernak['harga'] . '</h5>
              <h5 class="ukur">Ukuran : ' . $arraycernak['ukuran'] . '</h5>
              <button type="button" class="btn btn-success">Stock : ' . $arraycernak['stock'] . '</button>
              ';
              if (isset($_SESSION['idUser'])) {
                if ($arraycernak['stock'] > 0) {
                  echo '
                  <a href="proses/beli.php?idProduk=' . $arraycernak['idProduk'] . '&idUser=' . $iduser . '"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
                ';
                } else {
                  echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
                }
              } else {
                echo '
                  <button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
                ';
              }
              echo '
            </div>
          </div>
        </div>
      </li>  
          ';
            }
            ?>
            <div class="clear"></div>
          </ul>
        </div>
        <!-- end of cernak -->
      </div>

    </div>
    <!-- kontent end of produkumum -->
  </div>



  <?php include('component/footer.php'); ?>


  <script type="text/javascript" src="plugin/Javascript/jquery.min.js"></script>
  <script type="text/javascript" src="plugin/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="asset/js/script.js"></script>
</body>

</html>