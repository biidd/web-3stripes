
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>3STRIPES STORE</title>

  <!--font-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet" />

  <!-- feather icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!--my style-->
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <!-- navbar start -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">3STRIPES<span>STORE</span>.</a>

    <div class="navbar-nav">
      <a href="#">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#menu">Favorit</a>
      <a href="#contact">Kontak</a>
    </div>

    <div class="navbar-extra">
      <a href="cart.php" id="user" aria-label="Search"><i data-feather="user"></i></a>
      <a href="cart.php" id="shopping-cart" aria-label="Search"><i data-feather="shopping-cart"></i></a>
      <a href="#" id="hamburger-menu" aria-label="Search"><i data-feather="menu"></i></a>
    </div>
  </nav>
  <!-- navbar end -->

  <!-- hero section start -->
  <section class="hero" id="home">
    <main class="content">
      <h1>Cari Apa? <span>Ya Pasti Garis Tiga!</span></h1>
      <p>"THE BRAND WITH THE 3 STRIPES DIE WELTMARKE MIT DEN 3 STREIFEN LA MARQUE AUX 3 BANDES."</p>
      <a href="cart.php" class="cta">Checkout Now</a>
    </main>
  </section>

  <!-- hero section end -->

  <!-- about section start -->
  <section id="about" class="about">
    <h2><span>Tentang</span> Kami</h2>

    <div class="row">
      <div class="about-img">
        <img src="assets/img/tentang-kami.jpg" alt="Tentang Kami" />
      </div>
      <div class="content">
        <h3>Kenapa memilih store kami?</h3>
        <p>
          Karena kami menjamin setiap pasang sepatu adidas yang Anda dapatkan adalah 100% Original. Tak perlu lagi khawatir barang palsu. Di sini, kepercayaan Anda adalah prioritas utama. Belanja aman, gaya maksimal!.
        </p>
        <p>
          Kami bukan sekadar toko, kami adalah destinasi resmi untuk koleksi terbaik adidas. Dapatkan hanya produk original dengan kualitas terjamin dan jaminan resmi. Pilihan yang terpercaya untuk langkah terbaik Anda.
        </p>
      </div>
    </div>
  </section>

  <!-- about section end -->


  <!--Menu Section start-->
  <section id="menu" class="menu">
    <h2><span>Daftar</span> Favorit</h2>
    <p>Inilah The Dream Team di rak sepatu kami. Setiap pasang bukan hanya alas kaki, tapi cerita dan vibe yang berbeda. Mana nih pair adidas favoritmu?</p>
    <div class="row">
      <div class="menu-card">
        <img src="assets/img/menu/1.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Spezial -</h3>
        <p class="menu-card-price">Rp. 1.700.000</p>
      </div>
      <div class="menu-card">
        <img src="assets/img/menu/2.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Samba -</h3>
        <p class="menu-card-price">Rp. 1.300.000</p>
      </div>
      <div class="menu-card">
        <img src="assets/img/menu/3.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Gazelle -</h3>
        <p class="menu-card-price">Rp. 1.250.000</p>
      </div>
      <div class="menu-card">
        <img src="assets/img/menu/4.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Bali -</h3>
        <p class="menu-card-price">Rp. 2.500.000</p>
      </div>
      <div class="menu-card">
        <img src="assets/img/menu/5.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Warszawa -</h3>
        <p class="menu-card-price">Rp. 4.300.000</p>
      </div>
      <div class="menu-card">
        <img src="assets/img/menu/6.jpg" alt="Espresso" class="menu-card-img">
        <h3 class="menu-card-title">- Cp Manchester -</h3>
        <p class="menu-card-price">Rp. 6.100.000</p>
      </div>
    </div>
  </section>
  <!--Menu Section end-->

  <!--kontak Section start-->
  <section id="contact" class="contact">
    <h2><span>Kontak</span> Kami</h2>
    <p>Kami selalu senang mendengar dari Anda! Jika Anda memiliki pertanyaan, umpan balik, atau ingin tahu lebih banyak tentang produk dan layanan kami, jangan ragu untuk menghubungi kami melalui cara berikut :</p>
    <div class="row">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126455.15625949748!2d112.5139952582031!3d-7.923908199999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788377575980d9%3A0x2cf1177f865964df!2sKopi%20Kampoeng%20ID!5e0!3m2!1sid!2sid!4v1730789173575!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="nama">
        </div>
        <div class="input-group">
          <i data-feather="mail"></i>
          <input type="text" placeholder="email">
        </div>
        <div class="input-group">
          <i data-feather="phone"></i>
          <input type="text" placeholder="no. telepon">
        </div>
        <button type="submit" class="btn">Kirim pesan</button>
      </form>
    </div>
    <!--kontak Section end-->

    <!--footer start-->
    <footer>
      <div class="socials">
        <a href="https://www.instagram.com/bidefg"><i data-feather="instagram"></i></a>
        <a href="https://x.com/AbidMhmmd664?t=i9_LcjEYIq4pSXhjcMJ1dA&s=09"><i data-feather="twitter"></i></a>
        <a href="https://www.facebook.com/bid.bid.96199?mibextid=JRoKGi "><i data-feather="facebook"></i></a>
      </div>
      <div class="links">
        <a href="#">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Favorit</a>
        <a href="#contact">Kontak</a>
      </div>
      <div class="credit">
        <p>Created by <a href="https://wa.me/6285157756604">MuhammadAbid</a>. | &copy; 2024</p>
      </div>
    </footer>
    <!--footer end-->

    <!-- feather icons -->
    <script>
      feather.replace();
    </script>

    <!-- javascript -->
    <script src="assets/js/script.js"></script>
</body>

</html>