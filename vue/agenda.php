<?php auth(1);

$requete = $bdd->query("SELECT * FROM lessons WHERE id_e = ".$_SESSION['id_u']);
$lessons = $requete->fetchAll();

$events = [];

foreach($lessons as $lesson)
{
    $events[] =  "{
        title: '".$lesson['titre']."',
        start: '".$lesson['date_l']."',
        end: '".$lesson['date_fin']."'
    }";
}

$events = implode($events,",");

?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialDate: '2021-04-14',
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        height: 'auto',
        navLinks: true,
        editable: false,
        selectable: true,
        selectMirror: true,
        nowIndicator: true,
        events: [<?php echo $events; ?>]
    });
    calendar.render();
});
</script>



<div class="d-flex justify-content-center mt-4">
    <h3 class="text-center mt-4">Bienvenue <?= $_SESSION['prenom'] ?> !</h3>
</div>

<div id="calendar"></div>

