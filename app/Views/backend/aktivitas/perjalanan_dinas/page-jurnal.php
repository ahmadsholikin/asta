<?php
    $db = db_connect();
?>
<link rel="stylesheet" href="<?=base_url();?>public/libs/summernote-0.9.0-dist/summernote-bs4.min.css">
<script src="<?=base_url();?>public/libs/summernote-0.9.0-dist/summernote-bs5.min.js"></script>
<div class="row ">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Aktivitas</a></li>
                <li class="breadcrumb-item"><a href="#">Perjalanan Dinas</a></li>
                <li class="breadcrumb-item"><a href="#">Jurnal</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <table class="table table-sm table-bordered table-striped table-hover" id="datatable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Pelaku Usaha</th>
                    <th>Hasil Temuan Lapangan</th>
                    <th>Rekomendasi</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1; 
                    foreach ($lokasi as $row) : 
                    $hasil = $db->table("perjalanan_dinas_hasil")->where("id_lokasi",$row['id'])->get()->getResultArray();
                ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td>
                        <ul>
                            <li><?=$row['lokasi'];?></li>
                            <li>Risiko : <?=$row['risiko'];?></li>
                            <li>[<?=$row['kbli'];?>] <?=$row['deskripsi_kbli'];?></li>
                        </ul>
                    </td>
                    <td>
                        <div class="list-group">
                            <?php
                                foreach ($hasil as $row_hasil):
                                    if($row_hasil['kategori']=="HASIL")
                                    {
                            ?>
                            
                                <a href="#" class="list-group-item list-group-item-action mb-2">
                                    <div class="d-flex w-100 justify-content-between">
                                        <p class="mb-0"><u><?=$row_hasil['opd'];?></u></p>
                                        <small class="text-body-secondary">Edit</small>
                                    </div>
                                    <?=$row_hasil['keterangan'];?>
                                </a>
                            
                            <?php
                                    }
                                endforeach;
                            ?>
                        </div>
                    </td>
                    <td>
                        <div class="list-group">
                            <?php
                                foreach ($hasil as $row_hasil):
                                    if($row_hasil['kategori']=="REKOMENDASI")
                                    {
                            ?>
                            
                                <a href="#" class="list-group-item list-group-item-action mb-2">
                                    <div class="d-flex w-100 justify-content-between">
                                        <p class="mb-0"><u><?=$row_hasil['opd'];?></u></p>
                                        <small class="text-body-secondary">Edit</small>
                                    </div>
                                    <?=$row_hasil['keterangan'];?>
                                </a>
                            
                            <?php
                                    }
                                endforeach;
                            ?>
                        </div>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-sm p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" style="min-height:0px !important" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i> Aksi
                            </button>
                            <div class="dropdown-menu">
                                <a onclick="jurnal('Hasil','<?=$row['id'];?>')" data-bs-toggle="modal" data-bs-target="#jurnalModal" class="dropdown-item" href="javascript:void(0);">
                                    <i class="fi fi-rr-edit me-1"></i> Tulis Hasil
                                </a>
                                <a onclick="jurnal('Rekomendasi','<?=$row['id'];?>')" data-bs-toggle="modal" data-bs-target="#jurnalModal" class="dropdown-item" href="javascript:void(0);">
                                    <i class="fi fi-rr-edit me-1"></i> Tulis Rekomendasi
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
                    <input type="hidden" name="id_lokasi" id="id_lokasi">
                    <input type="hidden" name="kategori" id="kategori">
                    <div class="form-group mb-3">
                        <label for="opd" class="form-label form-label-sm">OPD Pencatat</label>
                        <select class="form-control form-control-sm" id="opd" name="opd">
                            <option value="-" disabled selected>-- Pilihan OPD --</option>
                            <?php foreach ($opd as $row_opd) : ?>
                            <option value="<?=$row_opd['opd'];?>"><?=$row_opd['opd'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="keterangan" class="form-label form-label-sm">Catatan</label>
                        <textarea type="text" class="form-control form-control-sm" name="keterangan" id="keterangan"></textarea>
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
<script>
    const url_backend = "<?= base_url(); ?>aktivitas/perjalanan-dinas/";
    let responseData;
    
    $(document).ready(function() {
        $('#keterangan').summernote({
            placeholder: 'Tulis hasil atau rekomendasi disini...',
            tabsize: 2,
            height: 220,
            toolbar: [
                ['font', ['bold', 'underline']],
                ['para', ['ul', 'ol', 'paragraph']]
            ]
        });
        
        $('#formEntrianJurnal').validator().on('submit', function (e) {
            $.ajax(
            {
                "url"  : url_backend + "tambah-jurnal",
                "type" : "POST",
                "data" : $('#formEntrianJurnal').serializeArray(),
                success: function(data, textStatus, xhr)
                {
                    $('#formEntrianJurnal').trigger("reset");
                    window.location.reload();
                },
                error: function(textStatus,xhr)
                {
                    console.log("error submit form entrian jurnal");
                }
            });
        });
    });
    
    function jurnal(kategori,id)
    {
        $("#kategori").val(kategori);
        $("#id_lokasi").val(id);
    }
    
</script>