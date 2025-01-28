<script>
    const entriAgendaModal  = new bootstrap.Modal('#entriAgendaModal', {keyboard: false});
    const calendarEl        = document.getElementById('calendar');
    const calendar          = new FullCalendar.Calendar(calendarEl, {
                                    initialView: 'dayGridMonth',
                                    locale: 'id',
                                    selectable: true,
                                    editable:true,
                                    dayMaxEvents:2,
                                    moreLinkClick:"popover",
                                    events: [
                                                {
                                                    start: '2025-01-01',
                                                    end: '2025-01-01',
                                                    title:"Zoom",
                                                    color: 'blue',
                                                    extendedProps: {
                                                        info: 'informasi here',
                                                        keterangan : 'keterangan here'
                                                    },
                                                },
                                                {
                                                    start: '2025-01-01',
                                                    end: '2025-01-01',
                                                    title:"Rapat",
                                                    color: 'green',
                                                    extendedProps: {
                                                        info: 'informasi here',
                                                        keterangan : 'keterangan here'
                                                    },
                                                },
                                                {
                                                    start: '2025-01-01',
                                                    end: '2025-01-01',
                                                    title:"Dinas Dalam",
                                                    color: 'purple',
                                                    extendedProps: {
                                                        info: 'informasi here',
                                                        keterangan : 'keterangan here'
                                                    },
                                                },
                                                {
                                                    start: '2025-01-01',
                                                    end: '2025-01-01',
                                                    title:"Dinas Luar",
                                                    color: 'red',
                                                    extendedProps: {
                                                        info: 'informasi here',
                                                        keterangan : 'keterangan here'
                                                    },
                                                },
                                    ],
                                    eventClick: function(info) {
                                        let obj     = info.event.extendedProps;
                                        let result  = Object.values(obj);
                                        Swal.fire({
                                            title: info.event.title,
                                            text: result[0],
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
                                });

    document.addEventListener('DOMContentLoaded', function() {
        calendar.render();
    })
</script>