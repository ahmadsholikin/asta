<script>
    document.addEventListener('DOMContentLoaded', function() {
        const entriAgendaModal  = new bootstrap.Modal('#entriAgendaModal', {keyboard: false})
        const calendarEl        = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            selectable: true,
            events: [
                        // {
                        //     start: '2025-01-11T10:00:00',
                        //     end: '2025-01-11T16:00:00',
                        //     display: 'background',
                        //     color: '#ff9f89'
                        // }
            ],
            dateClick: function(info) {
                let tanggal_terpilih = new Date(info.dateStr);
                moment.locale('id');
                document.getElementById('tanggal_terpilih').textContent = moment(tanggal_terpilih).format('DD MMMM YYYY');
                entriAgendaModal.show();
            }
        })
        calendar.render()
    })
</script>