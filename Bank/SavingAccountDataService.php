<?php

function getSBalance() {
    include "Database.php";

    //$mysqli -> autocommit(FALSE);

    $sql = "SELECT BALANCE FROM SAVINGS";
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
        echo "E3: Commit transaction failed<br>";
        // Rollback transaction
        $mysqli -> rollback();
        
        $mysqli -> close();
    }
}

function updateSBalance($balance) {
    include "Database.php";
    
    //$mysqli -> autocommit(FALSE);
    
    $sql = "UPDATE SAVINGS SET BALANCE=$balance";
    $result = $mysqli->query($sql);
    
    if ($result !== false) {
        //echo "update success<br>";
        return 1;
      }
    else {

        // Commit transaction
        if (!$mysqli -> commit()) {
            echo "E4: Commit transaction failed<br>";
            exit();
        }
        // Rollback transaction
        echo "ROLLBACK <br>";

        $mysqli -> rollback();
        
        $mysqli -> close();

      return 0;
    }
    }

?>