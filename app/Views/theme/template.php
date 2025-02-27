<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url();?>public/libs/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?=base_url();?>public/libs/select2/dist/select2-bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>public/libs/datepicker/css/bootstrap-datepicker-min.css">
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel='stylesheet' href='https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url();?>vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
        <!-- Javascript -->
        <script src="<?=base_url();?>public/assets/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
        <!-- cdn autocomplete -->
        <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.9/dist/autoComplete.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.9/dist/css/autoComplete.02.min.css">
        <!-- overwrite all -->
        <link rel="stylesheet" href="<?=base_url();?>public/assets/custom.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?=base_url();?>public/assets/image/logo_flow.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <b>Aswatama</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav d-flex">
                        <a class="nav-link" href="<?= base_url('beranda'); ?>">Beranda</a>
                        <a class="nav-link" href="<?= base_url('agenda'); ?>">Agenda</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Aktivitas </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('aktivitas/perjalanan-dinas'); ?>">Perjalanan Dinas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Laporan </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('laporan/penerimaan-dd'); ?>">Penerimaan Perjadin DD</a>
                                </li>
                            </ul>
                        </li>
                        <a class="nav-link" href="#">Kelola</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Referensi </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('referensi/rekening'); ?>">Rekening</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('referensi/standar-harga'); ?>">Standar Harga</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('referensi/template'); ?>">Template</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Akun </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= base_url('logout'); ?>">keluar</a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid main">
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
        <script src="<?=base_url();?>public/libs/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?=base_url();?>public/libs/select2/select2.min.js"></script>
        <script src="<?=base_url();?>public/assets/validator.js"></script>
        <script src="<?=base_url();?>public/assets/cleave.min.js"></script>
        <?=$preload;?>
    </body>
</html>