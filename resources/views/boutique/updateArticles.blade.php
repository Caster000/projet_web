
<?php
$connect = mysqli_connect("localhost", "root", "", "projetweb");
$query = "SELECT * FROM produit ORDER BY id_produit DESC";
$result = mysqli_query($connect, $query);
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<body>


<?php


?>
<br />
<div class="table-responsive">

    <div id="bdd_table">
        <table class="table table-bordered">
            <tr>
                <th width="70%">Nom du produit</th>
                <th width="15%">Modifier</th>

            </tr>
            <?php
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <tr>
                    <td><?php echo $row["nom"]; ?></td>
                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id_produit"]; ?>" class="btn btn-info btn-xs edit_data" /></td>

                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fenetre de modification des produits</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Nom du produit</label>
                    <input type="text" name="nom" id="nom" class="form-control" />
                    <br />
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <br />
                    <label>Prix</label>
                    <textarea name="prix" id="prix" class="form-control"></textarea>

                    <br />
                    <label>URL de l'image</label>
                    <input type="text" name="urlImage" id="urlImage" class="form-control" />
                    <br />
                    <label>ID de la catégories</label>
                    <input type="text" name="id_categorie" id="id_categorie" class="form-control" />
                    <br />
                    <input type="hidden" name="product_id" id="product_id" />
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-sm-4 col-lg-4">
    <a href={{route('boutique')}}>
        <button type="button" class="btn btn-black">
            Retour à la boutique
        </button>
    </a>
</div>

<script>
    $(document).ready(function(){
        $('#add').click(function(){
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function(){
            var product_id = $(this).attr("id");
            $.ajax({
                url:"/projet_web/resources/views/boutique/fetch.php",
                method:"POST",
                data:{product_id:product_id},
                dataType:"json",
                success:function(data){
                    $('#nom').val(data.nom);

                    $('#description').val(data.description);
                    $('#prix').val(data.prix);
                    $('#urlImage').val(data.urlImage);
                    $('#id_categorie').val(data.id_categorie);
                    $('#product_id').val(data.id_produit);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#nom').val() == "")
            {
                alert("Name is required");
            }
            else if($('#description').val() == '')
            {
                alert("Address is required");
            }
            else if($('#urlImage').val() == '')
            {
                alert("Designation is required");
            }
            else if($('#id_categorie').val() == '')
            {
                alert("Age is required");
            }
            else
            {
                $.ajax({
                    url:"/projet_web/resources/views/boutique/insert.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    beforeSend:function(){
                        $('#insert').val("Inserting");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#bdd_table').html(data);
                    }
                });
            }
        });

    });
</script>
