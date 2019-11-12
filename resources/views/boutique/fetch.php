<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "projetweb");
if(isset($_POST["product_id"]))
{
    $query = "SELECT * FROM produit WHERE id_produit = '".$_POST["product_id"]."'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
?>
