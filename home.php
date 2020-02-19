<!-- <?php
session_start();
//include 'database/config.php';
if (!isset($_SESSION['email'])) {
  header('location:index.html');
}
 ?> -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="static/css/style.css" type="text/css">
    <title>Music for Everyone - Wingx</title>
  </head>
  <body>

    <header class="home">
      <div class="container">
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand brand-name" href="#">Wingx</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars" style="color:#fff;"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <div class="dropdown open">
                  <button class="btn btn-profile dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span id="profile"><?php echo $_SESSION['username']; ?> </span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <a class="dropdown-item" href="logout.php">log out</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <section class="content">
      <div class="container">
        <div class="heading-tag">
          <h2>Looking for music?</h2>
          <p>Start listening to the best new releases.</p>
          <a class="btn btn-outline-warning"  href="player/">launch player</a>
        </div>
        <div class="song">
          <ul>
            <div class="row">
              <li class="col-md-4"> <img src="static/images/song-icon.jpg" alt=""> </li>
              <li class="col-md-4"> <img src="static/images/song-icon.jpg" alt=""> </li>
              <li class="col-md-4"> <img src="static/images/song-icon.jpg" alt=""> </li>
              <li class="col-md-4"> <img src="static/images/song-icon.jpg" alt=""> </li>
              <li class="col-md-4"> <img src="static/images/song-icon.jpg" alt=""> </li>
              <li class="col-md-4"> <img src="static/images/song-icon.jpg" alt=""> </li>
            </div>
          </ul>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="footer-top">
          <div class="row">
            <div class="col-md-3">
              <h3>Wingx</h3>
            </div>
            <div class="col-md-3">
              <h5>Company</h5>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">For the Records</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h5>Community</h5>
              <ul>
                <li><a href="#">For Artist</a></li>
                <li><a href="#">Developers</a></li>
                <li><a href="#">Brand</a></li>
                <li><a href="#">Invester</a></li>
                <li><a href="#">Vender</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /footer-top-->
        <div class="footer-bottom">
          <div class="row">
            <div class="col-md-6">
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Legal</a></li>
                <li class="list-inline-item"><a href="#">Privacy Center</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="#">Cookie</a></li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul class="ml-auto right">
                <li>India</li>
                <li>&copy 2019 Wingx</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
