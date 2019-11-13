<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "projet_web");
if(isset($_POST["activite_id"]))
{
    $query = "SELECT * FROM activite WHERE id_activite = '".$_POST["activite_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
