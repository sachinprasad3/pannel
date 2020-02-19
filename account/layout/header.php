<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Home</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto mr-5">
    <li class="nav-item">
      <div class="dropdown open">
        <button class="btn btn-profile dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span id="profile"><?php echo $_SESSION['username']; ?> </span>

        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <a class="dropdown-item" href="../logout.php">log out</a>
        </div>
      </div>
    </li>
  </ul>
</nav>
