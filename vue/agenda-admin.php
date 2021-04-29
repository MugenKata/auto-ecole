<?php auth(2);

$requete = $bdd->query("SELECT * FROM lessons WHERE id_m = ".$_SESSION['id_u']);
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

$events = implode(",",$events);

?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialDate: '2021-04-27',
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

<div class="d-flex justify-content-center mt-4 mb-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
        + Ajouter un cours
    </button>
</div>

<div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un cours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre du cours</label>
                        <input type="text" name="titre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" placeholder="Description du cours" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dateDebut" class="form-label">Date de début</label>
                        <input type="datetime-local" name="date_l" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="datFin" class="form-label">Date de fin</label>
                        <input type="datetime-local" name="date_fin" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="eleve" class="form-label">Elève</label>
                        <select name="id_e" id="eleve" class="form-select">
                            <?php $requete = $bdd->query("SELECT * FROM users WHERE lvl = 1");
                            $lesEleves = $requete->fetchAll();
                            foreach ($lesEleves as $unEleve) { ?>
                            <option value="<?= $unEleve['id_u'] ?>"><?= $unEleve['prenom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="moniteur" class="form-label">Moniteur</label>
                        <select name="id_m" id="moniteur" class="form-select">
                            <?php $requete = $bdd->query("SELECT * FROM users WHERE lvl = 2");
                            $lesMoniteurs = $requete->fetchAll();
                            foreach ($lesMoniteurs as $unMoniteur) { ?>
                            <option value="<?= $unMoniteur['id_u'] ?>"><?= $unMoniteur['prenom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="calendar"></div>

