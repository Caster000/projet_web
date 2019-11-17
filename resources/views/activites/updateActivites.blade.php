
<?php
$connect = mysqli_connect("localhost", "root", "", "projet_web");
$query = "SELECT * FROM activite ORDER BY id_activite DESC";                 //  connection  --}}
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
                <th width="70%">Nom de l'activite</th>
                <th width="15%">Modifier</th>

            </tr>
            <?php
            while($row = mysqli_fetch_array($result))
            {
            ?>
            <tr>
                <td><?php echo $row["activite"]; ?></td>
                <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id_activite"]; ?>" class="btn btn-info btn-xs edit_data" /></td>

            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>                 {{-- modal d'affichage du formulaire   --}}
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fenetre de modification des activites</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">

                    <label>Nom de l'activite</label>
                    <input type="text" name="activite" id="activite" class="form-control" />
                    <br />
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                    <br />
                    <div class="form-group " >
                        <label for="recurrence">Réccurence de l'évenement : </label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="recurrence" id="reccurence1" value="unique">
                            <label class="form-check-label" for="Unique">
                                Unique
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="recurrence" id="reccurence2" value="hebdomadaire" >
                            <label class="form-check-label" for="Hebdomadaire">
                                Hebdomadaire
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="recurrence" id="reccurence3" value="mensuelle" >
                            <label class="form-check-label" for="Mensuelle">
                                Mensuelle
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="recurrence" id="reccurence4" value="trimestrielle" >
                            <label class="form-check-label" for="Trimestrielle">
                                Trimestrielle
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="recurrence" id="reccurence5" value="semestrielle" >
                            <label class="form-check-label" for="Semestrielle">
                                Semestrielle
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="recurrence" id="reccurence6" value="annuelle" >
                            <label class="form-check-label" for="Annuelle">
                                Annuelle
                            </label>
                        </div>
                    </div>
                    <label>URL de l'image</label>
                    <input type="text" name="urlImage" id="urlImage" class="form-control" />
                    <br />
                    <label>Date</label>
                    <input type="date" name="date" max="3000-12-31" min="1000-01-01" class="form-control" id="date" required>
                    <br>
                    <label for="prix">Prix en € :</label>
                    <input type="number" class="form-control" placeholder="Ex: 10,99" id="prix" name="prix"required>
                    <br>
                    <input type="hidden" name="activite_id" id="activite_id" />
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
    <a href={{route('activites')}}>
        <button type="button" class="btn btn-black">
            Retour aux activités
        </button>
    </a>
</div>

<script>                 {{--  Permet la recuperation des donnees à modifier   --}}
    $(document).ready(function(){
        $('#add').click(function(){
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function(){
            var activite_id = $(this).attr("id");
            $.ajax({
                url:"updateActivites/"+activite_id,
                method:"POST",
                data:{"_token": "{{ csrf_token() }}",activite_id:activite_id},
                dataType:"json",
                success:function(data){
                    //console.log(data);
                    $('#activite').val(data.activite);
                    $('#description').val(data.description);
                    switch (data.recurrence) {
                        case 'Unique':
                            $('#reccurence1').prop("checked", true);
                            break;
                        case 'Hebdomadaire':
                            $('#reccurence2').prop("checked", true);
                            break;
                        case 'Mensuelle':
                            $('#reccurence3').prop("checked", true);
                            break;
                        case 'Trimestrielle':
                            $('#reccurence4').prop("checked", true);
                            break;
                        case 'Semestrielle':
                            $('#reccurence5').prop("checked", true);
                            break;
                        case 'Anuelle':
                            $('#reccurence6').prop("checked", true);
                            break;
                    }

                    $('#urlImage').val(data.urlImage);
                    $('#date').val(data.date);
                    $('#prix').val(data.prix);
                    $('#activite_id').val(data.id_activite);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });
        $('#insert_form').on("submit", function(event){
            event.preventDefault();
            if($('#activite').val() == "")
            {
                alert("Name is required");
            }
            else if($('#description').val() == '')
            {
                alert("description is required");
            }
            else if($('#recurrence').val() == '')
            {
                alert("recurrence is required");
            }
            else if($('#urlImage').val() == '')
            {
                alert("urlimage is required");
            }
            else if($('#date').val() == '')
            {
                alert("date is required");
            }
            else if($('#prix').val() == '')
            {
                alert("prix is required");
            }
            else
            {
                $.ajax({                     //  permet l'insertion des donnees en ajax  --}}
                    url:"/projet_web/resources/views/activites/insertactivite.php",
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
