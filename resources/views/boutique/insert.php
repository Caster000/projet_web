<?php
$connect = mysqli_connect("localhost", "root", "", "projetweb");
if(!empty($_POST))
{
    $output = '';
    $message = '';
    $nom = mysqli_real_escape_string($connect, $_POST["nom"]);
    $description = mysqli_real_escape_string($connect, $_POST["description"]);
    $prix = mysqli_real_escape_string($connect, $_POST["prix"]);
    $urlImage = mysqli_real_escape_string($connect, $_POST["urlImage"]);
    $id_categorie = mysqli_real_escape_string($connect, $_POST["id_categorie"]);
    if($_POST["product_id"] != '')
    {
        $query = "  
           UPDATE produit   
           SET nom='$nom',   
           description='$description',   
           prix='$prix',   
           urlImage = '$urlImage',   
           id_categorie = '$id_categorie'   
           WHERE id_produit='".$_POST["product_id"]."'";
        $message = 'Data Updated';
    }
    else
    {
        $query = "  
           INSERT INTO produit(nom, description, prix, urlImage, id_categorie)  
           VALUES('$nom', '$description', '$prix', '$urlImage', '$id_categorie');  
           ";
        $message = 'Data Inserted';
    }
    if(mysqli_query($connect, $query))
    {
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM produit ORDER BY id_produit DESC";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Nom du produit</th>  
                          <th width="15%">Modifier</th>  
                           
                     </tr>  
           ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '  
                     <tr>  
                          <td>' . $row["nom"] . '</td>  
                          <td><input type="button" name="Modifier" value="Modifier" id="'.$row["id_produit"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                            
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>

