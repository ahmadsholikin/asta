<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
<script>
    const url_backend = "<?= base_url(); ?>aktivitas/perjalanan-dinas/";
    let responseData;

    let table = new DataTable('#datatable', {
                            info: false,
                            ordering: false,
                            paging: true,
                            pageLength: 10,
                            destroy:true,
                            processing: true,
                            serverSide: true,
                            responsive: true,
                            ajax: url_backend+'data',
                            columns: [
                                { data: 'no' },
                                { data: 'no' },
                                { data: 'no' },
                                { data: 'no' },
                                { data: 'no' },
                                { data: 'no' },
                                { data: 'no' },
                                { data: 'action', orderable: false },
                            ]
                        });

    const tambahAgenda  = new bootstrap.Modal('#tambahModal', {keyboard: false});
    
    $("#btnTambahAgenda").click(function(){
        tambahAgenda.show();
    });

    $(".autosearch").select2({
        theme: "bootstrap",
        dropdownParent: $(".modal")
    });

    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        startDate: '+0d',
        autoclose: true
    });

    $("#cekPPTK").click(function(){
        let pptk        =  $("#pptk_id").val();
        let splitdata   = pptk.split(" - ");
        if(pptk=="")
        {
            alert("Cari terlebih dahulu PPTK kegiatan tersebut");
        }
        else
        {
            $.ajax({
                "url"   : url_backend + "info-asn?id="+splitdata[0],
                "type"  : "GET",
                dataType: 'json',
                beforeSend: function() {
                    Swal.fire({
                        text:"Mohon tunggu sebentar....",
                        showCloseButton: false,
                        showCancelButton: false,
                        showConfirmButton: false,
                        imageUrl: "<?= base_url()?>public/assets/image/dna.svg",
                        imageWidth: 100,
                        imageHeight: 100,
                    })
                },
                success: function(data, textStatus, xhr) {
                    responseData = data;
                    console.log(data);

                    Swal.fire({
                        imageUrl: "https://sipgan.magelangkab.go.id/sipgan/images/photo/"+responseData.nip_baru+".jpg",
                        imageWidth: 150,
                        imageHeight: 200,
                        html:   '<ul class="list-group list-group-flush">'+
                                    '<li class="list-group-item"><small>'+responseData.nama+'</small></li>'+
                                    '<li class="list-group-item"><small>'+responseData.nip_baru+'</small></li>'+
                                    '<li class="list-group-item"><small>'+responseData.jabatan_nm+'</small></li>'+
                                    '<li class="list-group-item"><small>'+responseData.gol+' - '+responseData.pangkat+'</small></li>'+
                                    '<li class="list-group-item"><small>'+responseData.skpd_nm+'</small></li>'+
                                '</ul>',
                        draggable: true,
                        showCloseButton: true,
                    });
                },
                error: function(textStatus, xhr) {
                    console.log("Error");
                }
            });
        }
    });

    const autoCompleteJS = new autoComplete({ 
        selector: "#pptk_id",
        placeHolder: "Ketikkan kata kunci pencarian...",
        data: {
            src: async (query) => {
                try {
                    const source = await fetch(`https://sipgan.magelangkab.go.id/sipgan/api/restpns/search?key=${query}&TOKEN=378dea469fcaeab303d2f0ec9d1c2898989oi`);
                    const data = await source.json();
                    return data;
                } catch (error) {
                    return error;
                }
            },
            keys: ["hasil"]
        },
        resultsList: {
            element: (list, data) => {
                if (!data.results.length) {
                    const message = document.createElement("div");
                    message.setAttribute("class", "no_result");
                    message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                    list.prepend(message);
                }
            },
            noResults: true
        },
        resultItem: {
            highlight: true,
        } 
    });

    document.querySelector("#pptk_id").addEventListener("selection", function (event) {
        res = Object.values(event.detail.selection.value);
        $("#pptk_id").val(res);
    });

    var res = "";
    let response;

    $('#formEntrian').validator().on('submit', function (e) {
        $.ajax(
        {
            "url"  : url_backend+"simpan",
            "type" : "POST",
            "data" : $('#formEntrian').serializeArray(),
            success: function(data, textStatus, xhr)
            {
                console.log(data);
                
                $('#formEntrian').trigger("reset");
                table.ajax.reload();
            },
            error: function(textStatus,xhr)
            {
                
            }
        });
    });
</script>