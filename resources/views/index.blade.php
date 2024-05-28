<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VERDE Creative</title>
  <link rel="icon" href="{{ asset('assets/images/verde_logo_green.png') }}">

    <!-- css -->

  <!-- css -->
  <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">

  <!-- script -->


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const text = document.querySelector('.text p');
      if (text) {
        text.innerHTML = text.innerText.split('').map(
          (char, i) =>
          `<span style="transform:rotate(${i * 8.3}deg)">${char}</span>`
        ).join(``);
      } else {
        console.error('Elemen .text p tidak ditemukan.');
      }
    });
  </script>

  <!-- script form -->


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var showFormButton = document.getElementById("showFormButton");
      var serviceForm = document.getElementById("serviceForm");

      // Add click event listener to the button
      showFormButton.addEventListener("click", function() {
        // Toggle the form's display
        if (serviceForm.style.display === "none") {
          serviceForm.style.display = "block";
        } else {
          serviceForm.style.display = "none";
        }
      });
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var showFormButton = document.getElementById("showFormButton");
      var serviceContainer = document.querySelector(".service-container");

      // Inisialisasi, sembunyikan service-container saat DOM dimuat
      serviceContainer.style.visibility = "hidden";

      // Add click event listener to the button
      showFormButton.addEventListener("click", function() {
        // Toggle visibility of service-container saat tombol diklik
        if (serviceContainer.style.visibility === "hidden") {
          serviceContainer.style.visibility = "visible";
        } else {
          serviceContainer.style.visibility = "hidden";
        }
      });
    });
  </script>

  <script>
    function triggerFormButton() {
      // Arahkan pengguna ke elemen dengan ID 'contact'
      window.location.href = "index.php#contact";

      // Pemicu klik pada tombol dengan ID 'showFormButton'
      var showFormButton = document.getElementById("showFormButton");
      if (showFormButton) {
        showFormButton.click();
      }
    }
  </script>

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
          <a href="#service">Layanan</a>
        </li>
        <li>
          <a href="index.php#contact" onclick="triggerFormButton()">Kontak</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- hero section start -->
  <section class="hero">
    <p>
      Let's Craft Your Digital Stories <br>
      with Creative Solutions
    </p>

    <div class="hero-bg">
      <div class="ellipse">
        <img src="assets/images/ellipse.png" alt="Ellipse Image" />
      </div>
      <div class="woman">
        <img src="assets/images/people/homepage-woman.png" alt="Woman Image" />
      </div>
    </div>
    <div class="cta-bg">
      <div>
        <a href="#contact" class="cta-button" onclick="triggerFormButton()">Hubungi Kami</a>
      </div>
      <div>
        <a href="about.php" class="cta-button">Lihat Profil Kami</a>
      </div>
    </div>

  </section>
  <!-- hero section end -->

  <!-- <div class="separator"></div> -->

  <div class="big-box">
    <!-- service section start -->
    <section class="service" id="service">
      <div class="service-content">
        <div class="service-title">
          <h2 class="porto"><span>Layanan</span><br>VERDE Creative</h2>
          <div class="circle">
            <div class="text">
              <p>where quality meets affordability ・verde・</p>
              <!-- <p>where quality meets affordability<span> ・verde・ </span></p> -->
            </div>
          </div>
        </div>

        <div class="containerCatalog">
          <div class="cardCatalog">
            <div class="catalog-card">
              <div class="catalog-box">
                <div class="catalog-info">
                  <div class="catalog-logo">S</div>
                  <div class="catalog-name">Splendor</div>
                  <div class="catalog-price">Rp800.000</div>
                  <ul class="catalog-desc">
                    <li>12 Feeds</li>
                    <li>5 Instagram Reels</li>
                    <li>Bonus</li>
                    <li class="catalog-bonus">16 Story, IG Admin, IG Caption, Ide & Konsep Konten, Revisi 1x
                    </li>
                  </ul>
                </div>
                <div class="catalog-cta">
                  <a href="#contact" onclick="triggerFormButton()">Know More >></a>
                </div>
              </div>
            </div>
          </div>

          <div class="cardCatalog">
            <div class="catalog-card">
              <div class="catalog-box">
                <div class="catalog-info">
                  <div class="catalog-logo">A</div>
                  <div class="catalog-name">Amistad</div>
                  <div class="catalog-price">Rp400.000</div>
                  <ul class="catalog-desc">
                    <li>9 Feeds</li>
                    <li>3 Instagram Reels</li>
                    <li>Bonus</li>
                    <li class="catalog-bonus">13 Story, IG Admin, IG Caption, Ide & Konsep Konten, Revisi 1x
                    </li>
                  </ul>
                </div>
                <div class="catalog-cta">
                  <a href="#contact" onclick="triggerFormButton()">Know More >></a>
                </div>
              </div>
            </div>
          </div>

          <div class="cardCatalog">
            <div class="catalog-card">
              <div class="catalog-box">
                <div class="catalog-info">
                  <div class="catalog-logo">N</div>
                  <div class="catalog-name">Noche</div>
                  <div class="catalog-price">Rp200.000</div>
                  <ul class="catalog-desc">
                    <li>6 Feeds</li>
                    <li>1 Instagram Reels</li>
                    <li>Bonus</li>
                    <li class="catalog-bonus">10 Story, IG Admin, IG Caption, Ide & Konsep Konten, Revisi 1x
                    </li>
                  </ul>
                </div>
                <div class="catalog-cta">
                  <a href="#contact" onclick="triggerFormButton()">Know More >></a>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="cardCatalog">

          <div class="imgCatalog">
            <img src="assets/images/catalog/dummy.jpg">
          </div>
          <div class="contentCatalog">
            <h2>Soleado</h2>
            <p>Post 6 Feeds
              Post 10 Story
              Post 1 Instagram Reels
              Bonus: Instagram Admin, Instagram Caption, Ide & Konsep Konten, Revisi 1x</p>
            <a href="#">Rp 200.000</a>
          </div>
        </div>
        <div class="cardCatalog">
          <div class="imgCatalog">
            <img src="assets/images/catalog/dummy.jpg">
          </div>
          <div class="contentCatalog">
            <h2>Amistad</h2>
            <p>Post 6 Feeds
              Post 10 Story
              Post 1 Instagram Reels
              Bonus: Instagram Admin, Instagram Caption, Ide & Konsep Konten, Revisi 1x</p>
            <a href="#">Rp 600.000</a>
          </div>
        </div>
        <div class="cardCatalog">
          <div class="imgCatalog">
            <img src="assets/images/catalog/dummy.jpg">
          </div>
          <div class="contentCatalog">
            <h2>Noche</h2>
            <p>Post 6 Feeds
              Post 10 Story
              Post 1 Instagram Reels
              Bonus: Instagram Admin, Instagram Caption, Ide & Konsep Konten, Revisi 1x</p>
            <a href="#">Rp 800.000</a>
          </div>
        </div> -->
        </div>

        <div class="service-porto">
          <div class="container">
            <input type="radio" name="slider" id="s1" checked>
            <input type="radio" name="slider" id="s2">
            <input type="radio" name="slider" id="s3">
            <input type="radio" name="slider" id="s4">
            <input type="radio" name="slider" id="s5">

            <div class="cards">
              <label for="s1" id="slide1">
                <div class="card">
                  <div class="image">
                    <img src="assets/images/client/dummy2.jpeg" alt="">
                    <div class="dots">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>

                  <div class="infos">
                    <span class="name">PT Sindo UPVC Indonesia</span>
                    <span class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis laborum
                      reprehenderit commodi placeat unde recusandae vel accusamus aspernatur explicabo quia.</span>

                  </div>
                </div>
              </label>
              <label for="s2" id="slide2">
                <div class="card">
                  <div class="image">
                    <img src="assets/images/client/dummy.jpg" alt="">
                    <div class="dots">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>

                  <div class="infos">
                    <span class="name">Mango Enterprise</span>x
                    <span class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat,
                      ratione.</span>

                  </div>
                </div>
              </label>
              <label for="s3" id="slide3">
                <div class="card">
                  <div class="image">
                    <img src="assets/images/client/dummy.jpg" alt="">
                    <div class="dots">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>

                  <div class="infos">
                    <span class="name">Mango Enterprise</span>
                    <span class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat,
                      ratione.</span>

                  </div>
                </div>
              </label>
              <label for="s4" id="slide4">
                <div class="card">
                  <div class="image">
                    <img src="assets/images/client/dummy.jpg" alt="">
                    <div class="dots">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>

                  <div class="infos">
                    <span class="name">Mango Enterprise</span>
                    <span class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat,
                      ratione.</span>

                  </div>
                </div>
              </label>
              <label for="s5" id="slide5">
                <div class="card">
                  <div class="image">
                    <img src="assets/images/client/dummy.jpg" alt="">
                    <div class="dots">
                      <div></div>
                      <div></div>
                      <div></div>
                    </div>
                  </div>

                  <div class="infos">
                    <span class="name">Mango Enterprise</span>
                    <span class="desc">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Placeat,
                      ratione.</span>

                  </div>
                </div>
              </label>
            </div>
          </div>
        </div>

        <!-- <div class="service-porto">
        <div class="service-box">
          <div class="box">
            <img src="assets/images/people/homepage-woman.png" alt="">
          </div>
          <div class="box">
            <img src="assets/images/people/homepage-woman.png" alt="">
          </div>
          <div class="box">
            <img src="assets/images/people/homepage-woman.png" alt="">
          </div>
        </div>
      </div> -->
      </div>
    </section>

    <!-- contact us form -->
    <section class="contact" id="contact">
      <div class="service-cta">
        <a href="javascript:void(0)" class="cta-button" id="showFormButton">TERTARIK? KONSULTASI SEKARANG!</a>
      </div>

      <div class="service-container">
        <div id="serviceForm" class="service-form" style="display: none;">
          <h2>Form Order VERDE Creative</h2>
          <p>Tertarik menggunakan jasa yang ditawarkan VERDE Creative?<br>Silakan isi form di bawah ini untuk melakukan
            konsultasi terlebih dahulu!</p>
            <form name="form-data" method="post" action="auth/form/ProcessForm.php">
            <div class="form-row">
              <div class="form-row-left">
                <div class="form-group">
                  <label for="businessName">Nama Bisnis Anda</label>
                  <input type="text" class="form-control" name="businessName" id="businessName" placeholder="Mango Enterprise">
                </div>
                <div class="form-group">
                  <label for="contactPerson">Nama Penanggung Jawab</label>
                  <input type="text" class="form-control" id="contactPerson" name="contactPerson" placeholder="John Doe">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="johndoe@mail.com">
                </div>
                <div class="form-group">
                  <label for="phoneNumber">No Handphone</label>
                  <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="+628345678900">
                </div>
              </div>
              <div class="form-row-right">
                <div class="form-group">
                  <label for="smmPackage">Preferensi Package</label>
                  <select class="form-control" name="smmPackage" id="smmPackage">
                    <option>Pilih package</option>
                    <option>Splendor</option>
                    <option>Amistad</option>
                    <option>Noche</option>
                    <!-- <option>Lainnya</option> -->
                    <!-- Add more SMM packages as needed -->
                  </select>
                </div>
                <div class="form-group">
                  <label for="message">Permasalahan</label>
                  <textarea name="message" name="message" id="message" cols="30" rows="10" placeholder="Tuliskan secara detail permasalahan yang dihadapi oleh bisnis anda"></textarea>
                </div>
                <div class="form-group">
                  <label for="preferredStartDate">Preferensi Tanggal Mulai</label>
                  <input type="date" class="form-control" name="preferredStartDate" id="preferredStartDate" placeholder="DD.MM.YYYY">
                </div>
              </div>
            </div>
            <!-- <div class="form-check">
        <input type="checkbox" class="form-check-input" id="termsAndConditions">
        <label class="form-check-label" for="termsAndConditions">I agree to the Terms and Conditions.</label>
      </div> -->
            <div class="button-container">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>


  <!-- <div class="separator2"></div> -->

  <!-- footer -->
  <footer>
    <div class="foot-top">
      <h3>Optimalkan Visibilitas Digital Bisnis Anda Bersama VERDE</h3>
      <div class="foot-cta">
        <a href="#contact" class="cta-button" onclick="triggerFormButton()">Hubungi Kami</a>
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

  <!-- <script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbwmG_HkdcKsvbz95jvhErQePUy_nFJofdTAadD51CfYQUfN6njcfaHGB7hVNZftkmK6/exec'
    const form = document.forms['form-data']

    form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, {
          method: 'POST',
          body: new FormData(form)
        })
        .then(response => {
          form.reset()
          alert('Terima kasih! Kami akan segera menghubungi anda melalui WhatsApp!')
        })
        .catch(error => console.error('Error!', error.message))
    })
  </script> -->
</body>

</html>