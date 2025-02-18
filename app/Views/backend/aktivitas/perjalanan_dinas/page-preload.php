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
                                { data: 'kategori_nama' },
                                { data: 'tanggal' },
                                { data: 'kegiatan' },
                                { data: 'lokasi' },
                                { data: 'orang' },
                                { data: 'progress' },
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


    const autoCompleteJS2 = new autoComplete({ 
        selector: "#person",
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

    document.querySelector("#person").addEventListener("selection", function (event) {
        res2 = Object.values(event.detail.selection.value);
        $("#person").val(res2);
        let person    =  $("#person").val();
        let splitdata = person.split(" - ");
        //set data person
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
                Swal.close();
                responseData = data;
                console.log(responseData);
                //
                $("#nip").val(responseData.nip_baru);
                $("#nama").val(responseData.nama);
                $("#nama_gelar").val(responseData.nama_gelar);
                $("#jabatan").val(responseData.jabatan_nm);
                $("#golru").val(responseData.gol);
                $("#pangkat").val(responseData.pangkat);
                $("#opd").val(responseData.unit_kerja_nm);
                //eselon_kd
                $("#eselon").val(responseData.eselon_kd);
            },
            error: function(textStatus, xhr) {
                console.log("Error");
            }
        });
    });

    var res2 = "";
    
    const autoCompleteJS3 = new autoComplete({ 
        selector: "#perusahaan",
        placeHolder: "Ketikkan kata kunci pencarian...",
        data: {
            src: async (query) => {
                try {
                    const source = await fetch(`http://localhost/asta/perusahaan/${query}`);
                    const data   = await source.json();
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
            noResults: true,
            maxResults: 15,
            position: "afterend"
        },
        resultItem: {
            highlight: true,
        } 
    });
    
    var res3 = "";
    
    document.querySelector("#perusahaan").addEventListener("selection", function (event) {
        res3 = Object.values(event.detail.selection.value);
        $("#perusahaan").val(res3);
        let perusahaan  =  $("#perusahaan").val();
        let splitdata   = perusahaan.split(" - ");
        //set data perusahaan
        $.ajax({
            "url"   : url_backend + "detail-perusahaan?id="+splitdata[2],
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
                Swal.close();
                responseData = data;
                console.log(responseData);
                $("#lokasi").val(responseData.nama_perusahaan);
                $("#alamat").val(responseData.alamat_usaha+" "+responseData.kelurahan+" "+responseData.kecamatan);
                $("#wilayah").val(responseData.kecamatan);

                // $("#nip").val(responseData.nip_baru);
            },
            error: function(textStatus, xhr) {
                console.log("Error");
            }
        });
    });

    $('#formEntrian').validator().on('submit', function (e) {
        $.ajax(
        {
            "url"  : url_backend + "simpan",
            "type" : "POST",
            "data" : $('#formEntrian').serializeArray(),
            success: function(data, textStatus, xhr)
            {
                console.log($('#formEntrian').serializeArray());
                $('#formEntrian').trigger("reset");
                table.ajax.reload();
            },
            error: function(textStatus,xhr)
            {
                console.log("error submit form entrian");
            }
        });
    });

    //edit
    function edit(id)
    {
        $.ajax(
        {
            "url"     : url_backend + "ambil-data",
            "type"    : "POST",
            "dataType": "json",
            "data"    : { 
                "id"  : id,
            },
            success: function(data, textStatus, xhr)
            {
                console.log(data);
                param = data;
                $("#id").val(id);
                $("#kategori_id").val(param.kategori_id);
                $("#pptk_id").val(param.pptk_id+' - '+param.pptk_nama);
                $("#kegiatan").val(param.kegiatan);
                $("#tanggal_berangkat").val(moment(param.tanggal_berangkat).format('DD-MM-YYYY'));
                $("#tanggal_pulang").val(moment(param.tanggal_pulang).format('DD-MM-YYYY'));
            },
            error: function(textStatus,xhr)
            {
                console.log("error");
            }
        });
    }

    //delete
    function hapus(id)
    {
        Swal.fire({
            title: "Yakin mau dihapus?",
            text: "Data yang telah dihapus, tidak bisa dikembalikan lagi loh",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yaa, hapus saja"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax(
                {
                    "url"  : url_backend+"hapus",
                    "type" : "POST",
                    "data" : { "id" : id },
                    success: function(data, textStatus, xhr)
                    {
                        Swal.fire({
                            title: "Terhapus!",
                            text: "Datanya sudah berhasil dihilangkan.",
                            icon: "success"
                        });
                        table.ajax.reload();
                    },
                    error: function(textStatus,xhr)
                    {
                        Swal.fire({
                            icon: "error",
                            text:"Pesan Error : "+textStatus,
                        });
                    }
                });
            }
        });
    }

    function setIdReferensiAgenda(id)
    {
        $('#formEntrianOrang').trigger("reset");
        $('#formEntrianLokasi').trigger("reset");
        $("input[name='referensi_agenda']").val(id);
    }
    
    function setTanggal(tanggal)
    {
        $("#tanggal").val(tanggal);
    }
    
    $('#formEntrianOrang').validator().on('submit', function (e) {
        $.ajax(
        {
            "url"  : url_backend + "tambah-orang",
            "type" : "POST",
            "data" : $('#formEntrianOrang').serializeArray(),
            success: function(data, textStatus, xhr)
            {
                console.log($('#formEntrianOrang').serializeArray());
                $('#formEntrianOrang').trigger("reset");
                table.ajax.reload();
            },
            error: function(textStatus,xhr)
            {
                console.log("error submit form entrian orang");
            }
        });
    });
    
    $('#formEntrianLokasi').validator().on('submit', function (e) {
        $.ajax(
        {
            "url"  : url_backend + "tambah-lokasi",
            "type" : "POST",
            "data" : $('#formEntrianLokasi').serializeArray(),
            success: function(data, textStatus, xhr)
            {
                console.log($('#formEntrianLokasi').serializeArray());
                $('#formEntrianLokasi').trigger("reset");
                table.ajax.reload();
            },
            error: function(textStatus,xhr)
            {
                console.log("error submit form entrian lokasi");
            }
        });
    });
</script>