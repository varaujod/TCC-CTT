<?php $this->extend('template') ?>

<?php $this->section('conteudo') ?>
<link rel="stylesheet" href="/assets/css/admin/planejamento.css">
<div class="container text-center position-absolute top-50 start-50 translate-middle">

  <div id='calendar'></div>

  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        events: <?php
                echo json_encode($eventos);
                ?>,
                 eventColor  : 'orange',
        eventClick: function(info) {
          alert('Event: ' + info.event.title);
          // change the border color just for fun
          info.el.style.borderColor = 'red';
        },
        locale: 'pt-br',
        weekends: false,
        weekday: 'short',
        Duration: '00:300:00',
        headerToolbar: {
          center: 'dayGridMonth,dayGridWeek'
        },
        views: {
          timeGridFourDay: {
            type: 'timeGrid',
            duration: {
              days: 7
            },
            buttonText: '4 day'
          }
        },
        selectable: true,
        Boolean,
        default: true,
        dateClick: function() {
          ;
        }

      });
      calendar.render();

    });
  </script>
  <?php $this->endSection() ?>