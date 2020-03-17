<section>
    <h2>FORMULAIRE DE CREATION D'ARTICLE</h2>
    <form id="create" class="admin" action="" method="POST">
        <input type="text" name="titre" required placeholder="entrer le titre">
        <textarea name="contenu" cols="60" rows="8" required placeholder="entrer le contenu"></textarea>
        
        <input type="text" name="image" required value="assets/img/photo1.jpg">
       
        <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?>">
        <input type="text" name="categorie" required placeholder="entrez la catégorie">
        
        <input type="hidden" name="identifiantFormulaire" value="create">

        <button type="submit">PUBLIER L'ARTICLE</button>
        <div class="confirmation">
            <?php 
$identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
if ($identifiantFormulaire == "create")
{
    require "php/controller/form-articles.php"; 
}        
            ?>
        </div>
    </form>
</section>


<section class="updateSection cache">
    <button class="closePopup">fermer la popup</button>
    <h2>FORMULAIRE POUR MODIFIER UN ARTICLE (UPDATE)</h2>
    <form id="update" class="admin" action="" method="POST">
        <div class="infosUpdate">
            <input type="text" name="titre" required placeholder="entrer le titre">
            <textarea name="contenu" cols="60" rows="8" required placeholder="entrer le contenu"></textarea>
           
            <input type="text" name="image" required value="assets/img/photo1.jpg">
           
            <input type="text" name="datePublication" value="<?php echo date("Y-m-d H:i:s") ?>">
            <input type="text" name="categorie" required placeholder="entrez la catégorie">
            
            <input type="text" name="id" required placeholder="entrez id ligne">
        </div>

        
        <input type="hidden" name="identifiantFormulaire" value="update">
        <button type="submit">MODIFIER L'ARTICLE</button>
        <div class="confirmation">
        <?php 
$identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
if ($identifiantFormulaire == "update")
{
    require "php/controller/form-articles.php"; 
}        
            ?>
        </div>

    </form>
</section>

<section class="cache">
    <h2>FORMULAIRE DE DELETE</h2>
    <form id="delete" action="" method="POST">
        <input type="text" name="id" required placeholder="entrez id">
       
        <input type="hidden" name="identifiantFormulaire" value="delete">
        <button>SUPPRIMER LA LIGNE</button>
        <div class="confirmation">
        <?php 
$identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
if ($identifiantFormulaire == "delete")
{
    require "php/controller/form-articles.php"; 
}        
            ?>
        </div>
    </form>    
</section>


<section>
    <h2>LISTE DES ARTICLES</h2>

    <table>
        <thead>
           
            <tr>
                <td>id</td>
                <td>titre</td>
                <td>contenu</td>
                <td>image</td>
                <td>categorie</td>
                <td>modifier</td>
                <td>supprimer</td>
            </tr>
        </thead>
        <tbody>
           
            <?php

$requeteSQL =
<<<CODESQL

SELECT * FROM `articles`
ORDER BY datePublication DESC

CODESQL;


$tabAssoColonneValeur = [];


require "php/model/envoyer-sql.php";


$tabLigne = $pdoStatement->fetchAll();


foreach($tabLigne as $tabAsso)
{
   
    extract($tabAsso); 

    echo
<<<CODEHTML

<tr>
    <td>$id</td>
    <td>$titre</td>
    <td>$contenu</td>
    <td>$image</td>
    <td>$categorie</td>
    <td>
        <button data-id="$id" class="update">modifier</button>
        <!-- ON PEUT DONNER PLUSIEURS CLASSES A UNE BALISE -->
        <div class="infosUpdate cache">
            <input type="text" name="titre" required placeholder="entrer le titre" value="$titre">
            <textarea name="contenu" cols="60" rows="8" required placeholder="entrer le contenu">$contenu</textarea>
            <!-- POUR L'IMAGE, ON DEVRAIT PROPOSER UN UPLOAD => PLUS TARD... -->
            <input type="text" name="image" required value="$image">
            <!-- https://www.php.net/manual/fr/function.date.php -->
            <input type="text" name="datePublication" value="$datePublication">
            <input type="text" name="categorie" required placeholder="entrez la catégorie" value="$categorie">
            <!-- POUR LE UPDATE ON DOIT SAVOIR QUELLE LIGNE ON VEUT MODIFIER -->
            <input type="text" name="id" required placeholder="entrez id ligne" value="$id">
        </div>

    </td>  
    <td><button data-id="$id" class="delete">supprimer</button></td>  
</tr>

CODEHTML;
}


?>
        </tbody>
    </table>
</section>


<script>

var boutonClose = document.querySelector("button.closePopup");
boutonClose.addEventListener("click", function(){
    var baliseSectionUpdate = document.querySelector("section.updateSection");
    baliseSectionUpdate.classList.add("cache");
});


var listeBoutonUpdate = document.querySelectorAll("button.update");

listeBoutonUpdate.forEach(function(bouton){
    
    bouton.addEventListener("click", function(event){
        
        console.log("CLICK SUR UN BOUTON modifier");
        
        var baliseBouton = event.target;
        var baliseTd = baliseBouton.parentNode;
        var baliseUpdate = baliseTd.querySelector(".infosUpdate");

        
        console.log(baliseBouton);
        console.log(baliseTd);
        console.log(baliseUpdate);

       
        var baliseUpdateForm = document.querySelector("form#update div.infosUpdate");
        
        baliseUpdateForm.innerHTML = baliseUpdate.innerHTML;

        
        var baliseSection = document.querySelector(".updateSection");
        baliseSection.classList.remove("cache"); 
    });

});




var listeBoutonDelete = document.querySelectorAll("button.delete");

listeBoutonDelete.forEach(function(bouton){
    
    bouton.addEventListener("click", function(event){
        console.log("TU AS CLIQUE");
       
        var idBouton = event.target.getAttribute("data-id");
        console.log(idBouton);
        
        var champId = document.querySelector("form#delete input[name=id]");
        
        champId.value = idBouton;

       
        var confirmation = window.confirm("ES TU SUR DE CE QUE TU FAIS");
        if (confirmation)
        {
           
            var formDelete = document.querySelector("form#delete");
            
            formDelete.submit();
        }
        else
        {
            
        }
    });

});



</script>



