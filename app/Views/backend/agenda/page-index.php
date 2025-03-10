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
        <div class="d-flex border-bottom mb-3">
            <h5 class=" pt-1 flex-grow-1">Agenda Kegiatan</h5>
            <h4 onclick="refreshCalendar()" class="pr-2 pt-2"><i class="fi fi-rr-add"></i></h4>
        </div>
        <div class="list-group" id="list-jadwal" style="height: 700px;overflow:hidden; overflow-y:scroll;">
            
        </div>
    </div>
</div>

<!-- modal -->
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
                <button type="button" class="btn btn-sm btn-light"><i class="fi fi-rr-add"></i> Tambahkan</button>
                <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">batal</button>
            </div>
        </div>
    </div>
</div>
<?= view($path . 'page-js'); ?>