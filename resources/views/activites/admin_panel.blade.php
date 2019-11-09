<div class="row justify-content-center">
    <button type="button" class="btn btn-primary m-4 col-10 " data-toggle="modal" data-target="#exampleModal" data-whatever="@ajouterProduit">Ajouter une nouvelle activité</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouvelle activité</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-5 ml-5">
                <form>
                    <div class="form">
                        <div class="form-group row">
                            <label for="nom">Nom activité :</label>
                            <input type="text" class="form-control" placeholder="Ex: Tournoi Smash" required>
                        </div>
                        <div class="form-group row">
                            <label for="description">Description </label>
                            <textarea class="form-control" placeholder="Description..."required></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="Recurrence">Reccurence de l'évenement : </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="exampleRadios" id="exampleRadios1" value="unique" checked>
                                    <label class="form-check-label" for="Unique">
                                        Unique
                                    </label>
                                </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="hebdomadaire" >
                                <label class="form-check-label" for="Hebdomadaire">
                                    Hebdomadaire
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="mensuelle" >
                                <label class="form-check-label" for="Mensuelle">
                                    Mensuelle
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="trimestrielle" >
                                <label class="form-check-label" for="Trimestrielle">
                                    Trimestrielle
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="semestrielle" >
                                <label class="form-check-label" for="Semestrielle">
                                    Semestrielle
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="annuelle" >
                                <label class="form-check-label" for="Annuelle">
                                    Annuelle
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Image">Choisissez une image</label>
                            <input type="file" class="form-control-file" id="ImageNewProduit">
                        </div>
                        <div class="form-group row">
                            <label >Date :</label>
                            <input type="date" name="bday" max="3000-12-31"
                                   min="1000-01-01" class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <label for="prix">Prix en € :</label>
                            <input type="number" class="form-control" placeholder="Ex: 10,99" required>
                        </div>
                        <div class="modal-footer col mt-4">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
