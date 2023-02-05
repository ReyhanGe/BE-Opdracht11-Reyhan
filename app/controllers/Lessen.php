<?php

class Lessen extends Controller
{

    public function __construct()
    {
        $this->lesModel = $this->model('Les');
    }

    public function index()
    {
        $result = $this->lesModel->getLessons();

        // var_dump($result);
        $rows = '';

        $rows1 = '';

        foreach ($result as $info) {
            $d = new DateTimeImmutable($info->DatumInDienst, new DateTimeZone('Europe/Amsterdam'));
            $rows .= "<tr>
                        <td>$info->Voornaam</td>
                        <td>$info->Tussenvoegsel</td>
                        <td>$info->Achternaam</td>

                        <td>$info->Mobiel</td>
                        <td>{$d->format('d-m-Y')}</td>
                        <td>$info->AantalSterren</td>
                        <td><a href='" . URLROOT . "/lessen/topicslesson/{$info->Id}'><img src='" . URLROOT . "/img/car.png' alt='Voertuig'></a></td>                        
                    </tr>";

            $rows1 = " 
                    Aantal Instructeurs: $info->Id <br>

        ";
        }
        // <td>$info->DatumInDienst</td>

        $data = [
            'title' => "Instructeurs in dienst  ",
            'rows' => $rows,
            'rows1' => $rows1,

        ];
        $this->view('lessen/index', $data);
    }

    function topicsLesson($lesId)
    {
        $result = $this->lesModel->getTopicsLesson($lesId);

        // var_dump($result);

        $rows = "";
        $rows2 = '';
        foreach ($result as $mankement) {
            $rows .= "<tr>      
                        <td>$mankement->TypeVoertuig</td>
                        <td>$mankement->Type</td>
                        <td>$mankement->Kenteken</td>
                        <td>$mankement->Bouwjaar</td>
                        <td>$mankement->Brandstof</td>
                        <td>$mankement->Rijbewijscategorie</td>
                      </tr>";

            $rows2 = " 
                    
                      Naam: $mankement->Voornaam <br>
                      Datum in dienst: $mankement->DatumInDienst <br>
                      Aantal Sterren: $mankement->AantalSterren <br>  ";
        }

        $data = [
            'title' => 'Door instructeur gebruikte voertuigen',
            'rows'  => $rows,
            'lesId' => $lesId,
            'rows2' => $rows2,

        ];
        $this->view('lessen/topicslesson', $data);
    }

    function addTopic($lesId = NULL)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->lesModel->addTopic($_POST);

            if ($result) {
                echo "<p>Het nieuwe onderwerp is succesvol toegevoegd</p>";
            } else {
                echo "<p>Het nieuwe onderwerp is niet toegevoegd</p>";
            }
            header('Refresh:3; url=' . URLROOT . '/lessen/index');
        }

        $data = [
            'title' => 'Onderwerp Toevoegen',
            'lesId' => $lesId
        ];
        $this->view('lessen/addTopic', $data);
    }
}
