<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@ajouterProduit">Ajouter un nouveau produit</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nouveau Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mr-5 ml-5">
                <form>
                    <div class="form">
                        <div class="form-group row">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control" placeholder="Ex: Sweat BDE">
                        </div>
                        <div class="form-group row">
                            <label for="description">Description </label>
                            <textarea class="form-control" placeholder="Description..."></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="prix">Prix en € :</label>
                            <input type="number" class="form-control" placeholder="Ex: 10,99">
                        </div>
                        <div class="form-group row">
                            <label for="Image">Choisissez une image</label>
                            <input type="file" class="form-control-file" id="ImageNewProduit">
                        </div>
                        <div class="form-group row ">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Catégorie :</label>
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Choose...</option>
                                <option value="1">T-shirt</option>
                                <option value="2">Sweat-shirt</option>
                                <option value="3">Casquette</option>
                                <option value="3">Goodies</option>
                            </select>
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
