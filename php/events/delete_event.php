<?php
    require('../db_conn.php');

    $id = $_GET['id_evento'];

    //rimuove moderatore
    $sq2 = "DELETE FROM moderatore 
            WHERE IDevento ='$id' 
    ";

    $result = $conn->query($sq2);
    if($conn->query($sq2) === TRUE){
        echo "Record deleted successfully";
    }else{
        echo "Error deleting record: " . $conn->error;
    }
    
    //rimuove tag
    $sq3 = "DELETE FROM tag_e 
            WHERE IDevento ='$id' 
    ";

    $result = $conn->query($sq3);
    if($conn->query($sq3) === TRUE){
        echo "Record deleted successfully";
    }else{
        echo "Error deleting record: " . $conn->error;
    }

    //rimuove partecipanti
    $sq4 = "DELETE FROM partecipa 
            WHERE IDevento ='$id' 
    ";

    $result = $conn->query($sq4);
    if($conn->query($sq4) === TRUE){
        echo "Record deleted successfully";
    }else{
        echo "Error deleting record: " . $conn->error;
    }
    
    //rimuove evento
    $sql = "DELETE FROM evento 
            WHERE IDevento ='$id' 
    ";

    $result = $conn->query($sql);
    if($conn->query($sql) === TRUE){
        echo "Record deleted successfully";
        header("location: ../../events.php");
    }else{
        echo "Error deleting record: " . $conn->error;
    }    
?>