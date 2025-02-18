function hapusData(url,id)
{
    swal({
        title: "Yakin mau dihapus?",
        text: "Data yang telah dihapus, tidak bisa dikembalikan lagi loh",
        icon: "warning",
        dangerMode: true,
        showCancelButton: true,
        confirmButtonText: "Ya, hapus saja",
        cancelButtonText: "Batalkan",
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax(
            {
                "url"  : url+"hapus",
                "type" : "POST",
                "data" : { "id" : id },
                success: function(data, textStatus, xhr)
                {
                    swal("Okey, sudah dihapus datanya", {
                        icon: "success",
                    });
                    table.ajax.reload();
                },
                error: function(textStatus,xhr)
                {
                    swal("Pesan Error : "+textStatus);
                }
            });
        } else {
            swal("Penghapusan data dibatalkan");
        }
    });
}