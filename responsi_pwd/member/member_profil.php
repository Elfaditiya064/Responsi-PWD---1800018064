<?php
require("../koneksi.php");
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (isset($_SESSION['member'])) {
  $username = $_SESSION['member'];
  $sql = "select * from member where username_member = '$username'";
  $query_sel = mysqli_query($koneksi, $sql);
  $sql_sel = mysqli_fetch_array($query_sel);
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>GO Futsal || Halaman Member</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../assets/images/Goputsalgaji.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/css/w3.css">
    <link rel="stylesheet" href="../assets/css/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="../assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <link href="../admin/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../admin/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #CCC;
      }
    </style>
  </head>

  <body>
    <!-- edit atau delete lapangan maupun tambah -->
    <?php
    include("navbar.php");
    ?>

    <!-- Page Container -->
    <div class="container-fluid w3-content" style="max-width:1400px;margin-top:60px">
      <!-- The Grid -->
      <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
          <!-- Profile -->
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container">
              <br>
              <p class="w3-center"><img src="assets/foto_member/<?php echo $sql_sel['foto']; ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p> <br>
              <h4 class="w3-center"><?php echo $sql_sel['nama']; ?></h4>
              <hr>
              <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Status (Member)</p>
              <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $sql_sel['email']; ?></p>
              <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i><?php echo $sql_sel['username_member']; ?></p>
            </div>
          </div>
          <br>

          <!-- End Left Column -->
        </div>

        <!-- Middle Column -->
        <div class="w3-col m9">


          <!-- PHP MIDDLE VIEW -->
          <?php
          if (isset($_GET['url'])) {
            if ($_GET['url'] == "history") {
              include "member_pesan_offline.php";
          ?>

            <?php
            } elseif ($_GET['url'] == "bay_offline") {
              include "member_pesan_offline.php";
            ?>

            <?php
            }
            ?>

          <?php
          } else {
            include "member_pesan_offline.php";
          ?>


          <?php
          }
          ?>


          <!-- End Middle Column -->
        </div>

        <!-- End Grid -->
      </div>

      <!-- End Page Container -->
    </div>
    </div>
    </div>
    <br>

    <!-- Footer -->

  <?php
} else {
  echo "<script> alert(\"Silakan Login Terlebih Dahulu\"); window.location = \"../index.php\" </script>";
}
  ?>

  </body>

  </html>