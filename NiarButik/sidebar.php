<div class="col-lg-3">
            <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel" style="width: 250px;">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                                <li class="nav-item">
                                    <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x']=='home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ; ?>" aria-current="page" href="home"><iconify-icon
                                            icon="ion:home"></iconify-icon> Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='product') ? 'active link-light' : 'link-dark' ; ?>" href="product"><iconify-icon
                                            icon="game-icons:ample-dress"></iconify-icon> Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='kategori') ? 'active link-light' : 'link-dark' ; ?>" href="kategori"><iconify-icon
                                            icon="bxs:category"></iconify-icon> Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='request') ? 'active link-light' : 'link-dark' ; ?>" href="request"><iconify-icon
                                            icon="iconoir:git-pull-request"></iconify-icon> Request</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='user') ? 'active link-light' : 'link-dark' ; ?>" href="user"><iconify-icon
                                            icon="mdi:user-outline"></iconify-icon> User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='report') ? 'active link-light' : 'link-dark' ; ?>" href="report"><iconify-icon
                                            icon="mdi:report-bar"></iconify-icon> Report</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>