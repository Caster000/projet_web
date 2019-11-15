<div class="row justify-content-center">                                        {{--  Bouttons pour les admin, declenche des modals  --}}
    <button type="button" class="btn btn-primary m-2 col-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@ajouterProduit">Ajouter une nouvelle activité</button>
    <a href="{{route('updateActivites')}}" class="btn btn-primary m-2 col-2">Modifier les activités</a>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">            {{--  Formulaire pour ajouter une activite   --}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvelle activité</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-5 ml-5">
                <form action="{{route('addactivite')}}" method="post" enctype="multipart/form-data">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="form">
                        <div class="form-group row">
                            <label >Nom de l'activité :</label>
                            <input type="text" class="form-control" placeholder="Ex: Tournoi Smash" name="nom" required>
                        </div>
                        <div class="form-group row">
                            <label>Description </label>
                            <textarea class="form-control" placeholder="Description..." name="description" required></textarea>
                        </div>
                        <div class="form-group ">
                            <label>Réccurence de l'évenement : </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="recurrence" value="unique" checked>
                                    <label class="form-check-label">
                                        Unique
                                    </label>
                                </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="recurrence" value="Hebdomadaire" >
                                <label class="form-check-label">
                                    Hebdomadaire
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="recurrence" value="Mensuelle" >
                                <label class="form-check-label">
                                    Mensuelle
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="recurrence" value="Trimestrielle" >
                                <label class="form-check-label">
                                    Trimestrielle
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="recurrence" value="Semestrielle" >
                                <label class="form-check-label">
                                    Semestrielle
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="recurrence" value="Annuelle" >
                                <label class="form-check-label">
                                    Annuelle
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Choisissez une image</label>
                            <input type="file" class="form-control-file" id="ImageNewProduit" name="image" >
                        </div>
                        <div class="form-group row">
                            <label>Date :</label>
                            <input type="date" name="date" max="3000-12-31"
                                   min="1000-01-01" class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <label>Prix en € :</label>
                            <input type="number" class="form-control" placeholder="Ex: 10,99" name="prix" required>
                        </div>
                        <div class="modal-footer col mt-4">
                            <button type="submit" class="btn btn-primary">Ajouter</button>            {{--  submit   --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
