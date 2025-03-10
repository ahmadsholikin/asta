<script>
    const url_backend = "<?= base_url(); ?>agenda/";
    function refreshCalendar()
    {
        // calendar.render();
        // console.log("exe");
    }
    
    function listJadwal(bulan, tahun)
    {
        $.ajax(
        {
            "url"  : url_backend+"list-jadwal",
            "type" : "POST",
            "data" : { 
                "csrf_app": $("input[name='csrf_app']").val(),
                "bulan"   : bulan,
                "tahun"   : tahun,
            },
            beforeSend: function() {
                $("#list-jadwal").html('<div class="spinner-border" role="status"><span class="visually-hidden">Tunggu, sedang memuat...</span></div>');
            },
            success: function(data, textStatus, xhr)
            {
                $("#list-jadwal").html(data);
            },
            error: function(textStatus,xhr)
            {
                console.log(textStatus);
            }
        });
    }
    
    function detailList(a,b)
    {
        Swal.fire({
                    title: a,
                    html: b,
                });
    }
</script>