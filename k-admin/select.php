
<?php
include("functions/k_a_init.php");

if (isset($_POST["employee_id"])) {
    
    $sql    = "SELECT * FROM city WHERE id = '" . $_POST["employee_id"] . "'";
    $result = query($sql);
    confirm($result);
    $row       = fetch_array($result);
    $city_name = $row['city_name'];
    $city_id   = $row['city_id'];
    
    echo '<input type="text" name="update_city_name" class="form-control"  value="' . htmlspecialchars($row['city_name']) . '">';
    echo '<input type="hidden" name="city_id" class="form-control"  value="' . htmlspecialchars($row['id']) . '">';
    echo "City ID:" . " " . $city_id;
}