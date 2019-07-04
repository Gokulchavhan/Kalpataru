<?php
include("functions/k_a_init.php");

if (isset($_POST["country_id"]) && !empty($_POST["country_id"])) {
    
    
    $sqlF    = "SELECT * FROM assign_service WHERE city_id = " . $_POST['country_id'] . " ";
    $resultF = (query($sqlF));
    if (row_count($resultF) > 0) {
        while ($rowF = mysqli_fetch_array($resultF)) {
            
            $service_id = $rowF["service_id"];
            $sqlS       = "SELECT * FROM services WHERE id = '$service_id'";
            $resultS    = query($sqlS);
            confirm($resultS);
            $rowS = fetch_array($resultS);
            
            echo '<option value="' . $rowS['id'] . '">' . $rowS['name'] . '</option>';
        }
    } else {
        echo '<option value="">Service not available</option>';
    }
    
}
?>


