<?php require(APPROOT . '/views/includes/header.php'); ?>

<h3><?= $data['title'] ?></h3>

<h4>  <?= $data['rows1']; ?></h4> <br>

<table border='1'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Mobiel</th>
        <th>DatumInDienst</th>
        <th>AantalSterren</th>
        <th>Voertuigen</th>
        <th>Ziekte/Verlof</th>
		<th>Verwijderen</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<br>

</form>

<?php require(APPROOT . '/views/includes/footer.php'); ?>