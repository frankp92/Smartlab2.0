<?php
    require('php/db_conn.php');

    //controlla se stiamo cercando qualche evento o se stiamo visualizzando tutti gli eventi semplicemente
    if(isset($_GET['ricerca'])){

        $cerca = $_GET['ricerca'];
        $array_eventi = array();

        //seleziona gli eventi in base alla ricerca
        $sql = "SELECT M.IDmoderatore, E.IDevento, E.titolo, E.descrizione, E.data, E.ora, E.durata, E.posti, E.privacy, A.Titolo AS tag
        FROM moderatore AS M JOIN evento AS E
        on M.IDevento = E.IDevento
            JOIN tag_e AS T
        on E.IDevento = T.IDevento
            JOIN area_tematica AS A
        on T.IDareatematica = A.IDareatematica
            WHERE E.Titolo LIKE '%$cerca%'
            ";

        $result = $conn->query($sql);

        for ( $array_eventi; $row = $result->fetch_assoc(); $array_eventi[] = $row );
        
    }else{//seleziona tutti gli eventi

        $array_eventi = array();

        $sql = "SELECT M.IDmoderatore, E.IDevento, E.titolo, E.descrizione, E.data, E.ora, E.durata, E.posti, E.privacy, A.Titolo AS tag
        FROM moderatore AS M JOIN evento AS E
        on M.IDevento = E.IDevento
            JOIN tag_e AS T
        on E.IDevento = T.IDevento
            JOIN area_tematica AS A
        on T.IDareatematica = A.IDareatematica    
        ";

        $result = $conn->query($sql);

        for ( $array_eventi; $row = $result->fetch_assoc(); $array_eventi[] = $row ); 

    }

    $conn->close();
?>