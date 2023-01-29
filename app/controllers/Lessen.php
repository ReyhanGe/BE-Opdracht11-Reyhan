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
                      Aantal Sterren: $mankement->AantalSterren <br>
  
          ";
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
        $data = [
            'title' => 'Voer In ',
            'lesId' => $lesId,
            'topicError' => ''
        ];

   

    $data = [
        'title' => 'Voer In ',
        'lesId' => $_POST['lesId'],
        'mankement' => $_POST['mankement'],
        'topicError' => ''
    ];

    $data = $this->addTopic($data);

    if(empty($result)) {
        echo "Er zijn op dit moment nog geen voertuigen toegewezen aan deze instructeur.";
    } else {
       
    }
    header("Refresh: 3; url='" . URLROOT . "/lessen/index'");
    }
 }
