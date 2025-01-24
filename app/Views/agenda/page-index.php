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

<!-- modal -->
 <!-- Modal -->
<div class="modal fade" id="entriAgendaModal" tabindex="-1" aria-labelledby="entriAgendaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title" id="entriAgendaModalLabel">Entri Kegiatan Baru di tanggal <span id="tanggal_terpilih"></span></label>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success">Tambahkan</button>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">batal</button>
            </div>
        </div>
    </div>
</div>