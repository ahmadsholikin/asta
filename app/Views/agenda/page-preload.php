<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const entriAgendaModal = new bootstrap.Modal('#entriAgendaModal', {
            keyboard: false
        })
        const optionsDate = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
        };
        const calendarEl = document.getElementById('calendar')
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
                document.getElementById('tanggal_terpilih').textContent=moment('01/01/2016', 'MM/DD/YYYY');
                entriAgendaModal.show();
            }
        })
        calendar.render()
    })

    
</script>