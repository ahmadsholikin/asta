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
                <h5 class="fw-semibold">Perjalanan Dinas</h5>
                <p class="text-muted">Cara pas untuk mempermudah kegiatan perjalanan dinas </p>
            </div>
            <div class="button-page">
                <button type="button" class="btn btn-sm btn-primary fw-semibold" id="btnTambahAgenda">Buat Agenda </button>
            </div>
        </div>
        <div class="px-3">
            <table class="table table-sm table-bordered table-striped table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Lokasi</th>
                        <th>Pelaksana</th>
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
                    <h6 class="modal-title fs-6" id="staticBackdropLabel">Lengkapi Formulir</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group mb-3">
                        <label for="kategori_id" class="form-label form-label-sm">Kategori</label>
                        <select class="form-control form-control-sm" id="kategori_id" name="kategori_id">
                            <?php foreach ($kategori as $row) : ?>
                            <option value="<?=$row['id'];?>"><?=$row['nama'];?></option>
                            <?php endforeach;?>
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
                                <input type="text" class="form-control form-control-sm datepicker" name="tanggal_berangkat" id="tanggal_berangkat" autocomplete="off" placeholder="Entrian...">
                                <label class="input-group-text" for="inputGroupSelect02"><i class="fi fi-rr-calendar"></i></label>
                            </div>
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="tanggal_pulang" class="form-label form-label-sm">Tanggal Pulang</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm datepicker" name="tanggal_pulang" id="tanggal_pulang" autocomplete="off" placeholder="Entrian...">
                                <label class="input-group-text" for="inputGroupSelect02"><i class="fi fi-rr-calendar"></i></label>
                            </div>
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="tanggal_surat" class="form-label form-label-sm">Tanggal Surat</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-sm datepicker" name="tanggal_surat" id="tanggal_surat" autocomplete="off" placeholder="Entrian...">
                                <label class="input-group-text" for="inputGroupSelect02"><i class="fi fi-rr-calendar"></i></label>
                            </div>
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="nomor_surat" class="form-label form-label-sm">Nomor Surat</label>
                            <input type="text" class="form-control form-control-sm" name="nomor_surat" id="nomor_surat" placeholder="Entrian...">
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

<!-- Modal -->
<div class="modal fade" id="orangModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?=base_url();?>aktivitas/perjalanan-dinas/tambah-orang" id="formEntrianOrang" name="formEntrianOrang" method="POST" data-toggle='validator' role='form' onsubmit='return false;'>
                <div class="modal-header">
                    <h6 class="modal-title fs-6" id="staticBackdropLabel">Tambah Keikutsertaan Personil</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="referensi_agenda" id="referensi_agenda">
                    <input type="hidden" name="personId" id="personId">
                    <input type="hidden" name="eselon" id="eselon">
                    <input type="hidden" name="rekening" id="rekening">
                    <input type="hidden" name="bank" id="bank" value="BANK JATENG">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" id="person" name="person" class="form-control form-control-sm" placeholder="Ketikkan Nama atau NIP Person" autocomplete="off"/>
                                <label class="input-group-text" for="inputGroupSelect02" id="person"><i class="fi fi-rr-search"></i></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nip" class="form-label form-label-sm">NIP</label>
                        <input type="text" class="form-control form-control-sm" name="nip" id="nip" placeholder="Entrian..."  
                                minlength="3" data-error="Maaf, entrian hanya berupa angka saja | Wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="nama" class="form-label form-label-sm">Nama</label>
                        <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Entrian..."  
                                minlength="3" data-error="Maaf, entrian hanya berupa huruf dan spasi | Wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="nama_gelar" class="form-label form-label-sm">Nama dengan Gelar</label>
                        <input type="text" class="form-control form-control-sm" name="nama_gelar" id="nama_gelar" placeholder="Entrian..."  
                                minlength="3" data-error="Maaf, entrian hanya berupa huruf dan spasi | Wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="jabatan" class="form-label form-label-sm">Jabatan</label>
                        <input type="text" class="form-control form-control-sm" name="jabatan" id="jabatan" placeholder="Entrian..."  
                                minlength="3" data-error="Maaf, entrian hanya berupa huruf dan spasi | Wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="golru" class="form-label form-label-sm">Golongan</label>
                            <input type="text" class="form-control form-control-sm" name="golru" id="golru" placeholder="Entrian...">
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="pangkat" class="form-label form-label-sm">Pangkat</label>
                            <input type="text" class="form-control form-control-sm" name="pangkat" id="pangkat" placeholder="Entrian...">
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="opd" class="form-label form-label-sm">OPD</label>
                        <input type="text" class="form-control form-control-sm" name="opd" id="opd" placeholder="Entrian..."  
                                minlength="3" data-error="Maaf, entrian hanya berupa huruf dan spasi | Wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="tingkat" class="form-label form-label-sm">Kategori Tingkatan</label>
                        <select class="form-control form-control-sm" id="tingkat" name="tingkat">
                            <option value="Golongan B">Golongan B</option>
                            <option value="Golongan C">Golongan C</option>
                            <option value="Golongan D">Golongan D</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex">
                    <div class="flex-grow-1">
                        <button type="button" onclick="hapusOrang()" class="btn btn-sm btn-danger float-start" data-bs-dismiss="modal">Hapus</button>
                    </div>
                    <button type="submit" class="btn btn-sm btn-teal" data-bs-dismiss="modal" id="btnSimpan">Simpan</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="lokasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?=base_url();?>aktivitas/perjalanan-dinas/tambah-lokasi" id="formEntrianLokasi" name="formEntrianLokasi" method="POST" data-toggle='validator' role='form' onsubmit='return false;'>
                <div class="modal-header">
                    <h6 class="modal-title fs-6" id="staticBackdropLabel">Tambah Lokasi Tujuan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="referensi_agenda" id="referensi_agenda">
                    <input type="hidden" name="id_proyek" id="id_proyek">
                    <input type="hidden" name="id_lokasi" id="id_lokasi">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" id="perusahaan" name="perusahaan" class="form-control form-control-sm" placeholder="Ketikkan Nama Perusahaan atau Nama Proyek" autocomplete="off"/>
                                <label class="input-group-text" for="inputGroupSelect02" id="perusahaan"><i class="fi fi-rr-search"></i></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="lokasi" class="form-label form-label-sm">Nama Lokasi</label>
                        <input type="text" class="form-control form-control-sm" name="lokasi" id="lokasi" placeholder="Entrian..."  
                                minlength="3" data-error="Maaf, entrian wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-label form-label-sm">Alamat</label>
                        <input type="text" class="form-control form-control-sm" name="alamat" id="alamat" placeholder="Entrian..."  
                                minlength="20" data-error="Maaf, entrian wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>
                    <div class="row">
                        <div class="col-2 mb-3">
                            <label for="kbli" class="form-label form-label-sm">KBLI</label>
                            <input type="text" class="form-control form-control-sm" name="kbli" id="kbli" placeholder="Entrian...">
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>

                        <div class="col-10 mb-3">
                            <label for="deskripsi_kbli" class="form-label form-label-sm">Deskripsi KBLi</label>
                            <input type="text" class="form-control form-control-sm" name="deskripsi_kbli" id="deskripsi_kbli" placeholder="Entrian...">
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="sektor_usaha" class="form-label form-label-sm">Sektor Usaha</label>
                        <input type="text" class="form-control form-control-sm" name="sektor_usaha" id="sektor_usaha" placeholder="Entrian..."  
                                minlength="20" data-error="Maaf, entrian wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="risiko" class="form-label form-label-sm">Risiko</label>
                        <input type="text" class="form-control form-control-sm" name="risiko" id="risiko" placeholder="Entrian..."  
                                minlength="20" data-error="Maaf, entrian wajib diisikan">
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="wilayah" class="form-label form-label-sm">Wilayah Kecamatan</label>
                        <select class="form-control form-control-sm" id="wilayah" name="wilayah">
                            <option value="-" disabled selected>-- Pilihan Wilayah Kecamatan --</option>
                            <?php foreach($kecataman as $row_kecamatan): ?>
                            <option value="<?=$row_kecamatan['nama'];?>"><?=$row_kecamatan['nama'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="longitude" class="form-label form-label-sm">Longitude</label>
                            <input type="text" class="form-control form-control-sm" name="longitude" id="longitude" placeholder="Entrian...">
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="latitude" class="form-label form-label-sm">Latitude</label>
                            <input type="text" class="form-control form-control-sm" name="latitude" id="latitude" placeholder="Entrian...">
                            <div id='defaultFormControlHelp' class='form-text text-danger help-block with-errors'></div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal" class="form-label form-label-sm">Tanggal</label>
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-sm datepicker" name="tanggal" id="tanggal" placeholder="Entrian..." autocomplete="off">
                            <label class="input-group-text" for="inputGroupSelect02"><i class="fi fi-rr-calendar"></i></label>
                        </div>
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
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

<!-- modal -->
<div class="modal fade" id="jurnalModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?=base_url();?>aktivitas/perjalanan-dinas/tambah-jurnal" id="formEntrianJurnal" name="formEntrianJurnal" method="POST" data-toggle='validator' role='form' onsubmit='return false;'>
                <div class="modal-header">
                    <h6 class="modal-title fs-6" id="staticBackdropLabel">Jurnal Catatan Kunjungan Dinas</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="kategori" class="form-label form-label-sm">Kategori</label>
                        <select class="form-control form-control-sm" id="kategori" name="kategori">
                            <option value="Hasil">Hasil</option>
                            <option value="Rekomendasi">Rekomendasi</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="opd_jurnal" class="form-label form-label-sm">OPD Pencatat</label>
                        <select class="form-control form-control-sm" id="opd_jurnal" name="opd_jurnal">
                            <option value="-" disabled selected>-- Pilihan OPD --</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nip" class="form-label form-label-sm">Catatan</label>
                        <textarea type="text" class="form-control form-control-sm" name="catatan" id="catatan"></textarea>
                        <div id="defaultFormControlHelp" class="form-text text-danger help-block with-errors"></div>
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
