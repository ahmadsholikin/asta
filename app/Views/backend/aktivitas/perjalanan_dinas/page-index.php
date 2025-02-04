<div class="row ">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Aktivitas</a></li>
                <li class="breadcrumb-item"><a href="#">Perjalanan Dinas</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="px-3 d-flex">
            <div class="title-page flex-grow-1">
                <h5 class="text-teal fw-semibold">Perjalanan Dinas</h5>
                <p class="text-muted">Cara pas untuk mempermudah kegiatan perjalanan dinas </p>
            </div>
            <div class="button-page">
                <button type="button" class="btn btn-sm btn-teal" id="btnTambahAgenda"><i class="fi fi-rr-add"></i> Buat Agenda </button>
            </div>
        </div>
        <div class="px-3">
            <table class="table table-sm table-bordered table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        <th>Orang</th>
                        <th>Progress</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?=base_url();?>aktivitas/perjalanan-dinas/tambah" id="formEntrian" name="formEntrian" method="POST" data-toggle='validator' role='form' onsubmit='return false;'>
                <div class="modal-header">
                    <h6 class="modal-title fs-5" id="staticBackdropLabel">Lengkapi Formulir</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="kategori_id" class="form-label form-label-sm">Kategori</label>
                        <select class="form-control form-control-sm" id="kategori_id" name="kategori_id">
                            <option value="DL">Dinas Luar</option>
                            <option value="DD-R">Dinas Dalam - Rapat</option>
                            <option value="DD-PM">Dinas Dalam - Pengawasan Modal</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="kegiatan" class="form-label form-label-sm">Nama Kegiatan</label>
                        <input type="text" class="form-control form-control-sm" name="kegiatan" id="kegiatan" placeholder="Entrian..." 
                            minlength="3"
                            data-error="Maaf, entrian hanya berupa huruf,angka dan spasi | Wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="tanggal_berangkat" class="form-label form-label-sm">Tanggal Berangkat</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm datepicker" name="tanggal_berangkat" id="tanggal_berangkat" placeholder="Entrian...">
                                <label class="input-group-text" for="inputGroupSelect02"><i class="fi fi-rr-calendar"></i></label>
                            </div>
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="tanggal_pulang" class="form-label form-label-sm">Tanggal Pulang</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm datepicker" name="tanggal_pulang" id="tanggal_pulang" placeholder="Entrian...">
                                <label class="input-group-text" for="inputGroupSelect02"><i class="fi fi-rr-calendar"></i></label>
                            </div>
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="pptk_id" class="form-label form-label-sm">PPTK</label>
                            <div class="input-group input-group-sm">
                                <input type="text" id="pptk_id" name="pptk_id" class="form-control form-control-sm" placeholder="Ketikkan Nama atau NIP PPTK" autocomplete="off"/>
                                <label class="input-group-text" for="inputGroupSelect02" id="cekPPTK"><i class="fi fi-rr-search"></i></label>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-teal" data-bs-dismiss="modal" id="btnSimpan">Simpan</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
