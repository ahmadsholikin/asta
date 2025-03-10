<?php 
    $i=1;
    foreach($agenda as $row): 
    $a = $row['kegiatan']. " ". $row['lokasi'];
    $b = $row['orang']; 
?>
<a onclick='detailList("<?=$a;?>","<?=$b;?>")' class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true" style="cursor: pointer;">
    <h2><span class="badge text-bg-success"><?=tanggal_d($row['tanggal_berangkat']);?></span></h2>
    <div class="d-flex gap-2 w-100 justify-content-between">
        <div>
            <h6 class="mb-0"><?=$row['kategori'];?></h6>
            <p class="mb-0 opacity-75"><?=$row['kegiatan'];?> <?=$row['lokasi'];?>.</p>
        </div>
        <p><small class="opacity-50 text-nowrap"><?=tanggal_dMY($row['tanggal_berangkat']);?></small></p>
    </div>
</a>
<?php $i++;endforeach; ?>