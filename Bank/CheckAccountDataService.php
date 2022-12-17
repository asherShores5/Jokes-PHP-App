<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

function getCBalance() {
    include "Database.php";

    //$mysqli -> autocommit(FALSE);

    $sql = "SELECT BALANCE FROM CHECKING";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return $row['BALANCE'];
        }
    } else {
        // Commit transaction
        if (!$mysqli -> commit()) {
            exit();
        }
        echo "E1: Commit transaction failed<br>";
        // Rollback transaction
        $mysqli -> rollback();
        
        $mysqli -> close();
    }

}

function updateCBalance($balance) {
    include "Database.php";
    
    //$mysqli -> autocommit(FALSE);
    
    $sql = "UPDATE CHECKING SET BALANCE=$balance";
    $result = $mysqli->query($sql);
    
    if ($result !== false) {
        //echo "update success<br>";
        return 1;
      }
    else {
        // Commit transaction
        if (!$mysqli -> commit()) {
            exit();
        }
        echo "E2: Commit transaction failed<br>";
        // Rollback transaction
        echo "ROLLBACK <br>";
        $mysqli -> rollback();
        
        $mysqli -> close();

      return 0;
    }
    }

?>