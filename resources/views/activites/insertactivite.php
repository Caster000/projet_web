<?php
$connect = mysqli_connect("localhost", "root", "", "projet_web");
if(!empty($_POST))
{
    $output = '';
    $message = '';
    $activite = mysqli_real_escape_string($connect, $_POST["activite"]);
    $description = mysqli_real_escape_string($connect, $_POST["description"]);
    $recurrence = mysqli_real_escape_string($connect, $_POST["recurrence"]);
    $urlImage = mysqli_real_escape_string($connect, $_POST["urlImage"]);
    $date = mysqli_real_escape_string($connect, $_POST["date"]);
    $prix = mysqli_real_escape_string($connect, $_POST["prix"]);
    if($_POST["activite_id"] != '')
    {
        $query = "  
           UPDATE activite   
           SET activite='$activite',   
           description='$description',   
           recurrence='$recurrence',   
           urlImage = '$urlImage',
           `date` = '$date',
           prix = '$prix'
           
           WHERE id_activite='".$_POST["activite_id"]."'";
        $message = 'Data Updated';
    }
    else
    {
        $query = "  
           INSERT INTO activite(activite, description, recurrence, urlImage, prix)  
           VALUES('$activite', '$description', '$recurrence', '$urlImage','$date','$prix');  
           ";
        $message = 'Data Inserted';
    }
    if(mysqli_query($connect, $query))
    {
        $output .= '<label class="text-success">' . $message . '</label>';
        $select_query = "SELECT * FROM activite ORDER BY id_activite DESC";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Nom de l activite</th>  
                          <th width="15%">Modifier</th>  
                           
                     </tr>  
           ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '  
                     <tr>  
                          <td>' . $row["activite"] . '</td>  
                          <td><input type="button" name="Modifier" value="Modifier" id="'.$row["id_activite"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                            
                     </tr>  
                ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>

