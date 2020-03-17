<?php


function filtrer($name="id")
{
    $resultat = $_REQUEST[$name] ?? "";
    return $resultat;
}



$identifiantFormulaire = filtrer("identifiantFormulaire");

if ($identifiantFormulaire == "update")
{
    
    $tabAssoColonneValeur = [
        "id"               => filtrer("id"),
        "titre"            => filtrer("titre"),
        "contenu"          => filtrer("contenu"),
        "image"            => filtrer("image"),
        "datePublication"  => filtrer("datePublication"),
        "categorie"        => filtrer("categorie"),
    ];
   
    extract($tabAssoColonneValeur);

    
    if ($id != ""                  
        && $titre != "" 
        && $contenu != ""
        && $image != ""
        && $datePublication != ""
        && $categorie != "")
    {
        
        $requeteSQL   =
<<<CODESQL

UPDATE articles 
SET 
    titre           = :titre,
    contenu         = :contenu,
    image           = :image,
    datePublication = :datePublication,
    categorie       = :categorie
WHERE 
    id = :id;


CODESQL;


        
        require_once "php/model/envoyer-sql.php";

        
        echo "VOTRE ARTICLE A ETE MODIFIE ($requeteSQL)";

    }

}

if ($identifiantFormulaire == "delete")
{
   
    $tabAssoColonneValeur = [
        "id"            => filtrer("id"),
    ];
    extract($tabAssoColonneValeur);
    
    $id = intval($id);

    if ($id > 0)
    {
       
        $requeteSQL   =
<<<CODESQL

DELETE FROM articles
WHERE id = :id

CODESQL;

        require_once "php/model/envoyer-sql.php";

        
        echo "VOTRE ARTICLE A ETE SUPPRIME ($requeteSQL)";

    }
    else
    {
       
        echo "MERCI DE NE PAS HAKCER MON SITE...";
    }

}

if ($identifiantFormulaire == "create")
{
    
    $tabAssoColonneValeur = [
        "titre"            => filtrer("titre"),
        "contenu"          => filtrer("contenu"),
        "image"            => filtrer("image"),
        "datePublication"  => filtrer("datePublication"),
        "categorie"        => filtrer("categorie"),
    ];
    
    extract($tabAssoColonneValeur);

    
    if ($titre != "" 
            && $contenu != ""
            && $image != ""
            && $datePublication != ""
            && $categorie != "")
    {
       
        $requeteSQL   =
<<<CODESQL

INSERT INTO articles
( titre, contenu, image, datePublication, categorie)
VALUES
( :titre, :contenu, :image, :datePublication, :categorie) 

CODESQL;


        
        require_once "php/model/envoyer-sql.php";

        
        echo "VOTRE ARTICLE A ETE PUBLIE ($requeteSQL)";
    }
    else
    {
        echo "VEUILLEZ REMPLIR TOUS LES CHAMPS OBLIGATOIRES";
    }

}


