<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url();?>public/assets/custom.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
        <?=$preload;?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
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
        <script src="<?=base_url();?>public/assets/bootstrap.bundle.js"></script>
        <script src="<?=base_url();?>public/assets/moment.min.js"></script>
    </body>
</html>