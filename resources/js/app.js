// resources/js/app.js

//FullCalendar komponensek
import './bootstrap';
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

// Amikor az oldal teljesen betöltődött:
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');

    // Tényleg van-e naptár az oldalon
    if (calendarEl) {
        // Új FullCalendar példány létrehozása
        const calendar = new Calendar(calendarEl, {
            // Milyen bővítményeket használjon
            plugins: [dayGridPlugin, interactionPlugin],

            // Alapnézet: havi nézet
            initialView: 'dayGridMonth',

            // Szerkeszthető események (húzás, áthelyezés)
            editable: true,

            // Kívülről is be lehet húzni elemekt elemeket
            droppable: true,

            // Innen tölti be az eseményeket (Laravel route)
            events: '/calendar/tasks',

            // Áthúzunk valamit a naptárra, ez fut le:
            eventReceive: function(info) {
                // ID és dátum lekérése
                const taskId = info.draggedEl.dataset.id;
                const date = info.dateStr;

                // Lekérés küldése a Laravel szervernek
                fetch(`/tasks/${taskId}/update-date`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ due_date: date })
                })
                    .then(response => {
                        if (!response.ok) {
                            console.error('Hiba a dátum mentésénél.');
                        }
                    });
            }
        });

        // Megjelenítjük a naptárt
        calendar.render();
    }
});
