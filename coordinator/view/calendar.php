<!DOCTYPE html>
<html>
<head>
<link href='calendar/fullcalendar.css' rel='stylesheet' />
<link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='calendar/jquery-1.9.1.min.js'></script>
<script src='calendar/jquery-ui-1.10.2.custom.min.js'></script>
<script src='calendar/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Grade 10- Science',
					start: new Date(y, m, d-18, 10.30, 0),
					end: new Date(y, m, d-18, 12.30, 0),
					allDay: false
				},
                                {
					title: 'Grade 11- Mathametics',
					start: new Date(y, m, d-18, 10.30, 0),
					end: new Date(y, m, d-18, 12.30, 0),
					allDay: false
				},
                                {
					title: 'Spoken English',
					start: new Date(y, m, d-18, 13, 0),
					end: new Date(y, m, d-18, 18, 0),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
		
	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
</head>
<body>
<div id='calendar'></div>
</body>

</html>
