<div class="row ">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Dashboard Monitoring</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-7">
        <div class="p-3">
            <h5>Hello Worker, </h5>
            <p class="text-muted">Sini biar Asta permudah pekerjaanmu </p>
        </div>
        <div class="p-3">
            <div class="row">
                <?php for ($i=0; $i < 3; $i++) : ?>
                <div class="col-4">
                    <div class="card" aria-hidden="true">
                        <img style="height: 170px;" src="<?=base_url('public/assets/image/loader.gif');?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title placeholder-glow">
                                <span class="placeholder col-9"></span>
                            </h5>
                            <p class="card-text placeholder-glow">
                                <span class="placeholder col-7"></span>
                                <span class="placeholder col-12"></span>
                                <span class="placeholder col-10"></span>
                            </p>
                            <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
                        </div>
                    </div>
                </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
    <div class="col-5">
        
    </div>
</div>