<script>
    const entriAgendaModal  = new bootstrap.Modal('#entriAgendaModal', {keyboard: false});
    const calendarEl        = document.getElementById('calendar');
    const calendar          = new FullCalendar.Calendar(calendarEl, {
                                    initialView  : 'dayGridMonth',
                                    locale       : 'id',
                                    selectable   : true,
                                    editable     : true,
                                    dayMaxEvents : 2,
                                    moreLinkClick: "popover",
                                    events: [
                                                <?php 
                                                    foreach ($agenda as $key) :
                                                ?>
                                                {
                                                    start: '<?=$key['tanggal_berangkat'];?>',
                                                    end: '<?=$key['tanggal_pulang'];?>',
                                                    title:"<?=$key['kategori'];?> : <?=$key['lokasi'];?>",
                                                    color: 'blue',
                                                    extendedProps: {
                                                        info      : "<?=$key['kategori'];?>",
                                                        keterangan: "<?=$key['kegiatan'];?> <?=$key['lokasi'];?>",
                                                        orang     : "<?=$key['orang'];?>"
                                                    },
                                                },
                                                <?php endforeach; ?>
                                    ],
                                    eventClick: function(info) {
                                        let obj     = info.event.extendedProps;
                                        let result  = Object.values(obj);
                                        Swal.fire({
                                            title: result[1],
                                            html: result[2],
                                        });
                                    },
                                    dateClick: function(info) {
                                        console.log(info.dateStr);
                                        let tanggal_terpilih = new Date(info.dateStr);
                                        moment.locale('id');
                                        document.getElementById('tanggal_terpilih').textContent = moment(tanggal_terpilih).format('DD MMMM YYYY');
                                        entriAgendaModal.show();
                                    },
                                    eventDidMount: function(info) {
                                        var tooltip = new bootstrap.Tooltip(info.el, {
                                            title: info.event.extendedProps.keterangan,
                                            placement: 'top',
                                            trigger: 'hover',
                                            container: 'body'
                                        });
                                    },
                                    customButtons: {
                                        prev: {
                                            text: 'Prev',
                                            click: function() {
                                                calendar.prev();
                                                var date  = calendar.getDate();
                                                var bulan = moment(date).format('MM');
                                                var tahun = moment(date).format('YYYY');
                                                listJadwal(bulan, tahun);
                                            }
                                        },
                                        next: {
                                            text: 'Next',
                                            click: function() {
                                                calendar.next();
                                                var date  = calendar.getDate();
                                                var bulan = moment(date).format('MM');
                                                var tahun = moment(date).format('YYYY');
                                                listJadwal(bulan, tahun)
                                            }
                                        },
                                        today: {
                                            text: 'Today',
                                            click: function() {
                                                calendar.today();
                                                var date  = calendar.getDate();
                                                var bulan = moment(date).format('MM');
                                                var tahun = moment(date).format('YYYY');
                                                listJadwal(bulan, tahun)
                                            }
                                        },
                                    }
                                });

    document.addEventListener('DOMContentLoaded', function() {
        calendar.render();
        var date  = calendar.getDate();
        var bulan = moment(date).format('MM');
        var tahun = moment(date).format('YYYY');
        listJadwal(bulan, tahun)
    })
</script>