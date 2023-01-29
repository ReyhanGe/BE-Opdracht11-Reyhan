<?php require(APPROOT . '/views/includes/header.php'); ?>
<h3><?= $data['title'] ?></h3>

<h4><?= $data['rows2']; ?></h4> <br>


<table border='1'>
    <thead>
        <th>Type Voertuig</th>
        <th>Type</th>
        <th>Kenteken</th>
        <th>Bouwjaar</th>
        <th>Brandstof</th>
        <th>Rijbewijscategorie</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>

<?php require(APPROOT . '/views/includes/footer.php'); ?>