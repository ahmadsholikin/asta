<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap.css">
        <link rel="stylesheet" href="<?=base_url();?>public/assets/custom.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
        <script>

        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar')
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'id',
                events: [
                            {
                                start: '2025-01-11T10:00:00',
                                end: '2025-01-11T16:00:00',
                                display: 'background',
                                color: '#ff9f89'
                            },
                            {
                                start: '2025-01-13T10:00:00',
                                end: '2025-01-13T16:00:00',
                                display: 'background',
                                color: '#ff9f89'
                            },
                            {
                                start: '2025-01-24',
                                end: '2025-01-28',
                                overlap: false,
                                display: 'background'
                            },
                            {
                                start: '2025-01-06',
                                end: '2025-01-08',
                                overlap: false,
                                display: 'background'
                            }
                ]
            })
            calendar.render()
        })

        </script>
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
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                        <a class="nav-link" href="#">Agenda</a>
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
            <div class="row ">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Agenda</a></li>
                            <li class="breadcrumb-item"><a href="#">Kalendar Agenda Kegiatan</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div id='calendar'></div>
                </div>
                <div class="col-4">
                    <h5 class="border-bottom pb-2 mb-3 pt-1">Agenda Kegiatan</h5>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <h6 class="mb-0">Zoom LKPM</h6>
                                    <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                                </div>
                                <p><small class="opacity-50 text-nowrap">02 Jan</small></p>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <h6 class="mb-0">Zoom LKPM</h6>
                                    <p class="mb-0 opacity-75">Some placeholder content in a paragraph that goes a little longer so it wraps to a new line.</p>
                                </div>
                                <p><small class="opacity-50 text-nowrap">03 Jan</small></p>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <h6 class="mb-0">Zoom LKPM</h6>
                                    <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                                </div>
                                <p><small class="opacity-50 text-nowrap">06 Jan</small></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url();?>public/assets/bootstrap.bundle.js"></script>
    </body>
</html>