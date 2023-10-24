<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <!-- Header -->
  <nav class="navbar navbar-expand navbar-dark bg-primary">
  <div class="container-lg">
    <a class="navbar-brand" href="#"><i class="bi bi-cup-hot"></i> DECAFE</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            username
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person-fill"></i> Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Setting</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Header -->
<div class="container-lg">
    <div class="row">
        <!-- Sidebar-->
        <div class="col-lg-3">
        <nav class="navbar navbar-expand-lg bg-light rounded-3 border mt-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 250px">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
          <li class="nav-item">
            <a class="nav-link active link-light" aria-current="page" href="#"><i class="bi bi-house"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-cart4"></i> Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-person-fill"></i> Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-receipt"></i> Product</a>
            <li class="nav-item">
            <a class="nav-link link-dark" href="#"><i class="bi bi-file-earmark-bar-graph"></i> Report</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
        </div>
        <!--End Sidebar-->

        <!-- Content -->
        <div class="col-lg-9 bg-secondary mt-2">

        </div>
        <!-- End Content -->
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>


