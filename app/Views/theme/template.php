<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url();?>public/assets/custom.css">
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container-xl">
                <a class="navbar-brand" href="#">
                    <img src="<?=base_url();?>public/assets/image/logo_flow.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <b>Aswatama</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="<?= base_url(''); ?>">Beranda</a>
                        <a class="nav-link" href="<?= base_url('agenda'); ?>">Agenda</a>
                        <a class="nav-link" href="#">Laporan</a>
                        <a class="nav-link" href="#">Kelola</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Referensi </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">Rekening</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Standar Harga</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Template</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>
                <form class="d-flex" role="search">
                    <input class="form-control form-control-sm me-2" type="search" placeholder="Ketik pencarian..." aria-label="Search">
                    <button class="btn btn-sm btn-outline-dark" type="submit">Cari</button>
                </form>
            </div>
        </nav>
        <div class="container-xl main">
            <?php if (!empty($page)) { echo $page; } ?>
        </div>
        <footer>
            <div class="environment">
                <p>Page rendered in {elapsed_time} seconds<br>Environment: <?= ENVIRONMENT ?></p>
            </div>
            <div class="copyrights">
                <p class="pt-1">&copy; <?= date('Y') ?> CodeIgniter Foundation. CodeIgniter is open source project released under the MIT open source licence.</p>
            </div>
        </footer>
        <script src="<?=base_url();?>public/assets/bootstrap.bundle.js"></script>
        <script src="<?=base_url();?>public/assets/moment.min.js"></script>
        <?=$preload;?>
        
    </body>
</html>