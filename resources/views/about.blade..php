<?php
session_start();
include "php/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VERDE Creative</title>
  <link rel="icon" href="../../assets/images/verde_logo_green.png">

  <!-- css -->
  <link rel="stylesheet" href="assets/style/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <script src="https://unpkg.com/feather-icons"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <!-- navbar start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">
      <img src="assets/images/verde_wide_green.png" alt="VERDE Wide Green">
    </a>

    <div class="navbar-nav">
      <ul>
        <li>
          <a href="index.php#">Home</a>
        </li>
        <li>
          <a href="about.php">Tentang Kami</a>
        </li>
        <li>
          <a href="index.php#service">Layanan</a>
        </li>
        <li>
          <a href="index.php#contact">Kontak</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="abt-top">
    <h3>Tentang Kami</h3>
  </div>

  <!-- <div class="separator"></div> -->
  <div class="big-box">
    <!-- about content -->
    <div class="abt-mid">
      <div class="abt-profile">
        <img class="prof-logo" src="assets/images/people/verde_team.png" alt="verde">
        <div class="prof-content">
          <p>VERDE adalah platform media kreatif yang hadir sebagai respons terhadap kurangnya perhatian dalam
            optimalisasi penggunaan media sosial dalam pemasaran bisnis. Kami berkomitmen membantu bisnis lokal memasuki
            era digital dan mempertahankan kehadiran mereka di ranah
            sosial saat ini melalui strategi pemasaran inovatif.</p>
        </div>
      </div>

      <div class="abt-intro">
        <div class="abt-quest">
          <div class="question">SIAPAKAH</div>
          <div class="question2">VERDE</div>
        </div>
        <!-- <h2>SIAPAKAH <span>VERDE</span></h2> -->
        <h3>KENALI KAMI LEBIH JAUH</h3>
        <div class="team">
          <div class="box">
            <img src="assets/images/people/foto_doni.png" alt="doni">
            <div class="info-card">
              <div class="card-box">
                <div class="card-sosmed">
                  <div>
                    <a href="https://instagram.com/doniprnma/" target="_blank"><ion-icon
                        name="logo-instagram"></ion-icon></a>

                  </div>
                  <div>
                    <a href="https://www.linkedin.com/in/donipurnama04/" target="_blank"><ion-icon
                        name="logo-linkedin"></ion-icon></a>
                  </div>
                </div>
                <div class="card-name">
                  <div class="name">Doni</div>
                  <div class="name2">Purnama</div>
                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <img src="assets/images/people/foto_yopita.png" alt="yopita">
            <div class="info-card">
              <div class="card-box">
                <div class="card-sosmed">
                  <div>
                    <a href="https://instagram.com/yopita._/" target="_blank"><ion-icon
                        name="logo-instagram"></ion-icon></a>

                  </div>
                  <div>
                    <a href="https://www.linkedin.com/in/yopita-637301265/" target="_blank"><ion-icon
                        name="logo-linkedin"></ion-icon></a>
                  </div>
                </div>
                <div class="card-name">
                  <div class="name">Yopita</div>

                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <img src="assets/images/people/foto_nico.png" alt="nico">
            <div class="info-card">
              <div class="card-box">
                <div class="card-sosmed">
                  <div>
                    <a href="https://instagram.com/crisxcoo/" target="_blank"><ion-icon
                        name="logo-instagram"></ion-icon></a>

                  </div>
                  <div>
                    <a href="https://www.linkedin.com/in/nicocristian/" target="_blank"><ion-icon
                        name="logo-linkedin"></ion-icon></a>
                  </div>
                </div>
                <div class="card-name">
                  <div class="name">Nico</div>
                  <div class="name2">Cristian</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="separator2"></div> -->

  <!-- footer -->
  <footer>
    <div class="foot-top">
      <h3>Optimalkan Visibilitas Digital Bisnis Anda Bersama VERDE</h3>
      <div class="foot-cta">
        <a href="index.php#contact" class="cta-button" onclick="triggerFormButton()">Hubungi Kami</a>
      </div>
    </div>

    <div class="foot-mid">
      <div class="foot-logo">
        <img src="assets/images/verde_wide_lime_ed.png" alt="verde-logo">
        <div class="address">
          <p>Institut Teknologi dan Bisnis Sabda Setia<br>
            Jl Purnama 2, Pontianak Selatan<br>
            Kota Pontianak, Kalimantan Barat 78121</p>
        </div>
      </div>
      <div class="foot-contact">
        <div>
          <a href="https://wa.link/n6x3cg" target="_blank">+6285176892077</a>
          <span><ion-icon name="logo-whatsapp"></ion-icon></span>
        </div>
        <div>
          <a href="https://instagram.com/verdecreative/" target="_blank">@verdecreative</a>
          <span><ion-icon name="logo-instagram"></ion-icon></span>
        </div>
        <div>
          <a href="mailto:hello.verdecreative@gmail.com" target="_blank">hello.verdecreative@gmail.com</a>
          <span><ion-icon name="mail-outline"></ion-icon></span>
        </div>
      </div>
    </div>
    <div class="credit">
      <p>All Right Reserved 2024 &copy; <a href="#">VERDE Creative</a></p>
    </div>
  </footer>
</body>

</html>