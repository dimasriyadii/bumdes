<?php 
include 'global_header.php'; 
?>

<?php
//buat koneksi ke mysql dari file config.php
if (isset($_POST["submit"])) {
  // form telah disubmit, proses data
  // ambil nilai form
  $username = htmlentities(strip_tags(trim($_POST["username"])));
  $password = htmlentities(strip_tags(trim($_POST["password"])));

  // siapkan variabel untuk menampung pesan error
  // $pesan_error = "";

  // //cek apakah username sudah diisi atau tidak
  // if (empty($username)) {
  //   $pesan_error .= "Username belum diisi <br>";
  // }

  // //cek apakah password sudah diisi atau tidak
  // if (empty($password)) {
  //   $pesan_error .= "Password belum diisi <br>";
  // }
  include("koneksi.php");
  session_start();
//filter dengan mysqli_real_escape_string
  $username = $koneksi->escape_string($username);
  $password = $koneksi->escape_string($password);

//generate hashing
  $password_sha1 = md5(sha1(md5($password)));
  
// cek apakah username dan password ada di tabel 
  $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password_sha1'";
  $result = $koneksi->query($query);
  $row = $result->num_rows;
  $sql = $koneksi->query("SELECT * FROM user WHERE username = '$username'");
  $akun = $sql->fetch_assoc();

  if ($row > 0 ){ // jika data ada
    $akun = $result->fetch_assoc();
     // bebaskan memory 
    mysqli_free_result($result);
    
      // tutup koneksi dengan database MySQL
    mysqli_close($koneksi);
    $_SESSION["username"] = $akun["username"];
    $_SESSION["level"] = $akun["level"];
    $_SESSION["id_user"] = $akun['user_id'];
    $_SESSION['gambar'] = $akun['gambar'];
    $_SESSION['nama_lengkap'] = $akun['nama_lengkap'];
    echo "<script> document.location.href='admin/index'; </script>";

  }else{
   $_SESSION['pesan'] = 'Username dan Password Tidak ditemukan';
 }
}
else{
  $username = "";
  $password = "";
}
?>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
  <div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
      <div class="text-center mb-4">
        <a href="."><img src="./favicon.ico" height="36" alt=""></a>
      </div>
      <form class="card card-md" action="" method="POST" autocomplete="off">
        <div class="card-body">
          <?php 
    // tampilkan pesan jika ada
            if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
              echo '<div class="pesan">
              <div class="alert alert-warning">  <strong>Warning! </strong>'.$_SESSION['pesan'].'</div></div>';
            }
    // tampilkan pesan error jika ada
            $_SESSION['pesan'] = '';
            ?>

          <h2 class="card-title text-center mb-4">Login to your account</h2>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter username" value="<?= $username ?>">
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
              <!-- <span class="form-label-description">
                  <a href="./forgot-password.html">I forgot password</a>
                </span> -->
            </label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" value="<?=$password ?>">
              <!-- <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><svg
                    xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="12" cy="12" r="2" />
                    <path
                      d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                    </svg>
                </a>
              </span> -->
            </div>
          </div>
          <div class="mb-2">
            <label class="form-check">
              <input type="checkbox" class="form-check-input" />
              <span class="form-check-label">Remember me on this device</span>
            </label>
          </div>
          <div class="form-footer">
            <button type="submit" name="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </div>
      </form>
      <div class="text-center text-muted mt-3">
        Kembali ke Dashboard <a href="index" tabindex="-1">Disini</a>
      </div>
    </div>
  </div>