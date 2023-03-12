<?php

class Les
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLessons()
    {

        $this->db->query("SELECT instructeur.Id
                                 ,instructeur.Voornaam
                                 ,instructeur.Tussenvoegsel
                                 ,instructeur.Achternaam
                                 ,Instructeur.Mobiel
                                 ,Instructeur.DatumInDienst
                                 ,Instructeur.AantalSterren 
                                 
                          FROM instructeur

                          ORDER BY AantalSterren DESC;");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getTopicsLesson()
    {
        $this->db->query("SELECT Voertuig.Kenteken
                                ,Voertuig.Type
                                ,Voertuig.Bouwjaar
                                ,Voertuig.Brandstof
                                ,TypeVoertuig.TypeVoertuig
                                ,TypeVoertuig.Rijbewijscategorie
                                
                                ,Instructeur.Voornaam
                                ,Instructeur.Tussenvoegsel
                                ,Instructeur.Achternaam
                                ,Instructeur.DatumInDienst
                                ,Instructeur.AantalSterren

                            FROM VoertuigInstructeur

                            INNER JOIN Voertuig
                                ON VoertuigInstructeur.VoertuigId = Voertuig.Id

                            INNER JOIN TypeVoertuig
                                ON Voertuig.TypeVoertuigId = TypeVoertuig.Id

                            INNER JOIN Instructeur
                                ON VoertuigInstructeur.InstructeurId = Instructeur.Id  ");


        $result = $this->db->resultSet();

        return $result;


        //         function addTopic($post) 
        //     {
        //         $sql = "INSERT INTO Onderwerp (LesId
        //                                       ,Onderwerp)
        //                 VALUES                (:lesId
        //                                       ,:topic)";

        //         $this->db->query($sql);
        //         $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
        //         $this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
        //         return $this->db->execute();
        //     }
    }

    public function deleteLessons($id)
    {
        $this->db->query("CALL spDeleteInstructeur(:id);");
        $this->db->bind(":id", $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}
