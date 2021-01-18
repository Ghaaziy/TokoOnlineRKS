<?php
require('../config/db.php');

$UploadDir = 'image/';

if (isset($_POST['upload'])) {
  $conn = mysqli_connect('localhost', 'root', '', 'batiku');

  $datenow = Date('Y-m-d h:i:sa');
  $filename = md5(($_FILES['foto']['name']) . $datenow);
  $tmpName = $_FILES['foto']['tmp_name'];
  $fileSize = $_FILES['foto']['size'];
  $fileType = $_FILES['foto']['type'];
  $filePath = $UploadDir . $filename . '.jpg';
  $result = move_uploaded_file($tmpName, $filePath);
  $nama = $_POST['nama'];
  $keterangan = $_POST['keterangan'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $stock = $_POST['stock'];

  $query = mysqli_query($conn, "INSERT INTO tabel_produk (nama, gambar, keterangan, kategori, harga, stock, path) VALUES ('$nama', '$filename', '$keterangan', '$kategori', '$harga', '$stock', '$filePath')");

  if (!get_magic_quotes_gpc()) {
    $filename = addslashes($filename);
    $filePath = addslashes($filePath);
  }

  if ($query) {
    echo '
           <script>
             alert("Produk ditambahkan");
             window.location = "../admin.php"
           </script>
         ';
  } else {
    echo '
     <script>
         alert("Format Gambar Tidak Di Dukung (Format Harus .JPG, .JPEG, .PNG, dan .GIF)");
         window.location="../admin.php"
       </script>
     ';
  }
  mysqli_close($conn);
}



?>


















// if($query){
// echo '
// <script>
  //           alert("Produk ditambahkan");
  //           window.location = "../admin.php"
  //         
</script>
// ';
// }
// }
// } else {
// echo '
// <script>
  //       alert("Format Gambar Tidak Di Dukung (Format Harus .JPG, .JPEG, .PNG, dan .GIF)");
  //       window.location="../admin.php"
  //     
</script>
// ';
// }