<div class="row ">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                <li class="breadcrumb-item"><a href="#">Penerimaan Perjalanan Dinas Dalam Daerah</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="px-3 d-flex">
            <div class="title-page flex-grow-1">
                <h5 class="fw-semibold">Penerimaan Perjalanan Dinas Dalam Daerah</h5>
                <p class="text-muted">Generator Kebutuhan SPJ Perjalanan Dinas Dalam Daerah </p>
            </div>
            <div class="button-page">
                <button type="button" class="btn btn-sm btn-primary fw-semibold" id="btnFilter"><i class="fi fi-rr-filter"></i> Filter </button>
            </div>
        </div>
        <div class="px-3">
            <form action="<?=base_url();?>laporan/penerimaan-dd/eksport" method="POST">
                <table class="table table-sm table-bordered table-striped table-hover" id="datatable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 3%;">Cek</th>
                            <th style="width: 3%;">No.</th>
                            <th style="width: 8%;">Tanggal</th>
                            <th style="width: 26%;">Agenda</th>
                            <th style="width: 24%;">Lokasi</th>
                            <th style="width: 17%;">Pelaksana</th>
                            <th style="width: 8%;">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($data as $row) : ?>
                            <tr>
                                <td rowspan="<?=$row['jml_orang']+1;?>">
                                    <input type="checkbox" name="cek[]" id="cek-<?=$row['agenda']['id'];?>" value="<?=$row['agenda']['id'];?>">
                                </td>
                                <td rowspan="<?=$row['jml_orang']+1;?>"><?=$no;?></td>
                                <td rowspan="<?=$row['jml_orang']+1;?>"><?=tanggal_indo($row['agenda']['tanggal_berangkat']);?></td>
                                <td rowspan="<?=$row['jml_orang']+1;?>"><?=$row['agenda']['kegiatan'];?></td>
                                <td rowspan="<?=$row['jml_orang']+1;?>">
                                    <?php 
                                        $no_lokasi=1;
                                        foreach ($row['lokasi'] as $row_lokasi):
                                            echo $no_lokasi.". ".$row_lokasi['lokasi']." ( Kec. ".$row_lokasi['wilayah']." )<br>";
                                            $no_lokasi++;
                                        endforeach;
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($row['orang'] as $row_orang) : ?>
                                <tr>
                                    <td><?=$row_orang['nama_gelar'];?></td>
                                    <td><?=nominal($row_orang['nominal']);?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <button type="submit" class="btn btn-sm btn-outline-primary">Eksport</button>
            </form>
        </div>
    </div>
</div>