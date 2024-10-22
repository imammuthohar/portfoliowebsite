<?php
session_start();

// Cek jika ada parameter 'status' di URL
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    // Set session untuk menunjukkan bahwa data berhasil dikirim
    $_SESSION['status'] = 'success';
    header('Location: index.php');
    exit();
}



if (isset($_SESSION['status']) && $_SESSION['status'] === 'success') {
    echo "<script>alert('Data berhasil dikirim!');</script>";
    // Hapus session setelah menampilkan pesan
    unset($_SESSION['status']);
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Portfolio Website</title>
    <link rel="stylesheet" href="style.css" />
    <!----Font awesome cdn  font icon css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>

  <?php
        
        include 'koneksi.php';
        $query = "SELECT * FROM users";
        $query_sql = mysqli_query($koneksi,$query);
        $tampil = mysqli_fetch_assoc($query_sql);
      
 
  ?>


    <div id="home" class="hero-header">
      <div class="wrapper">
        <header>
          <div class="logo">
            <i class="fa-solid fa-i"></i>
            <div class="logo-text"><?pHp echo $tampil['name'] ?> </div>
          </div>
          <nav>
            <div class="togglebtn">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <ul class="navlinks">
              <li><a href="#home">Home</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <li><a href="#experience">Experience</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </nav>
        </header>
        <div class="container">
          <div class="hero-pic">
            <img src="images/<?pHp echo $tampil['profile_picture'] ?>" alt="profile pic" />
          </div>
          <div class="hero-text">
            <h5>Hi I'm <span class="input">Frontend Developer</span></h5>
            <h1><?pHp echo $tampil['name'] ?></h1>
            <p><?pHp echo $tampil['bio'] ?></p>

            <div class="btn-group">
              <a href="#contact" class="btn active">Contact</a>
              <!-- <a href="#" class="btn">Contact</a> -->
            </div>

            <div class="social">
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-dribbble"></i></a>
              <a href="#"><i class="fa-brands fa-pinterest"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Section Experience -->
    <section id="experience" class="experience">
    <div class="wrapper">
        <h2>Experience</h2>

        <div class="experience-grid">
        <?php
        include 'koneksi.php';
        $experience_query = "SELECT * FROM experience";
        $query_sql = mysqli_query($koneksi,$experience_query);
        $ambildata = mysqli_fetch_all($query_sql, MYSQLI_ASSOC);  
        ?>
    
<?php
foreach ($ambildata as $tampil ) {
?>
        <div class="experience-item">
            <img src="images/<?pHp echo $tampil['image'] ?>" alt="Experience 1" />
            <h3> <?pHp echo $tampil['company_name'] ?> </h3>
            <p> <?pHp echo $tampil['job_title'] ?> </p>
            <p> <?pHp echo $tampil['start_date'] ?> - <?pHp echo $tampil['end_date'] ?> </p>
            <p> <?pHp echo $tampil['job_description'] ?>  </p>
          </div>
<?php 
  }   
?>
  </div>
  </div>
  </section>

    <!-- Section Portfolio -->
    <section id="portfolio" class="portfolio">
      <div class="wrapper">
        <h2>Portfolio</h2>
        <div class="portfolio-grid">
          <div class="portfolio-item">
            <img src="images/portfolio1.png" alt="Project 1" />
            <h3>PT. Nifty Educate</h3>
            <p>Education Portal</p>
          </div>
          <div class="portfolio-item">
            <img src="images/portfolio2.png" alt="Project 2" />
            <h3>Roud To Vertosity</h3>
            <p>Music Academy</p>
          </div>
          <div class="portfolio-item">
            <img src="images/portfolio3.png" alt="Project 3" />
            <h3>Javabica</h3>
            <p>Ecommerce Website</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Contact -->
    <section id="contact" class="contact">
      <div class="wrapper">
        <h2>Contact Me</h2>
       <form class="contact-form"  action="prosesinput.php" method="post">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required  />
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required />
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" rows="5" name="message" placeholder="Your Message" required></textarea>
          </div>
          <button name="submit" type="submit" class="btn">Send Message</button>
        </form>
      </div>
    </section>

    <!-- Footer Section -->
    <footer>
      <div class="wrapper">
        <div class="footer-content">
          <div class="footer-logo">
            <i class="fa-solid fa-a"></i>
            <div class="footer-logo-text">Imam Muthohar</div>
          </div>
          <p>&copy; 2024 Imam Muthohar. All Rights Reserved.</p>
          <div class="footer-social">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-dribbble"></i></a>
            <a href="#"><i class="fa-brands fa-pinterest"></i></a>
          </div>
        </div>
      </div>
    </footer>

    <!---typed js for typing text effect-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.10/typed.min.js"></script>
    <script>
      /** creating button click show hide navbar **/
      var togglebtn = document.querySelector(".togglebtn");
      var nav = document.querySelector(".navlinks");
      var links = document.querySelector(".navlinks li");

      togglebtn.addEventListener("click", function () {
        this.classList.toggle("click");
        nav.classList.toggle("open");
      });

      var typed = new Typed(".input", {
        strings: ["Frontend Developer", "UX Designer", "Web Developer"],
        typedSpeed: 70,
        backSpeed: 55,
        loop: true,
      });
    </script>
  </body>
</html>
