<section>
            <h2>LE MEİLLEUR CUİSİNE DU MONDE</h2>
            <div class="listeArticle">
<?php

$requeteSQL =
<<<CODESQL

SELECT * FROM `articles`
ORDER BY datePublication DESC

CODESQL;


$tabAssoColonneValeur = [];


require_once "php/model/envoyer-sql.php";


 $tabLigne = $pdoStatement->fetchAll();


foreach($tabLigne as $tabAsso)
{
    
    extract($tabAsso); 

    echo
<<<CODEHTML

    <article class="$categorie">
        <img src="$image" alt="photo1">
        <h3>$titre</h3>
        <p>$contenu</p>
    </article>

CODEHTML;
}



?>
        </section>

        <section>
            <h2>liste des articles EN HTML</h2>
            <div class="listeArticle">
                <article>
                    <img src="assets/img/img1.jpg" alt="img1">
                    <h3>titre article1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi rerum placeat! Nisi ullam eaque nobis sequi quod obcaecati ipsum ipsa repellendus facilis tenetur delectus quos hic tempora, soluta veritatis?</p>
                </article>
                <article>
                    <img src="assets/img/img1.jpg" alt="img1">
                    <h3>titre article2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi rerum placeat! Nisi ullam eaque nobis sequi quod obcaecati ipsum ipsa repellendus facilis tenetur delectus quos hic tempora, soluta veritatis?</p>
                </article>
                <article>
                    <img src="assets/img/img1.jpg" alt="img1">
                    <h3>titre article3</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi rerum placeat! Nisi ullam eaque nobis sequi quod obcaecati ipsum ipsa repellendus facilis tenetur delectus quos hic tempora, soluta veritatis?</p>
                </article>
                <article>
                    <img src="assets/img/img1.jpg" alt="img1">
                    <h3>titre article1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi rerum placeat! Nisi ullam eaque nobis sequi quod obcaecati ipsum ipsa repellendus facilis tenetur delectus quos hic tempora, soluta veritatis?</p>
                </article>
                <article>
                    <img src="assets/img/img1.jpg" alt="img1">
                    <h3>titre article2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi rerum placeat! Nisi ullam eaque nobis sequi quod obcaecati ipsum ipsa repellendus facilis tenetur delectus quos hic tempora, soluta veritatis?</p>
                </article>
                <article>
                    <img src="assets/img/img.jpg" alt="img1">
                    <h3>titre article3</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi rerum placeat! Nisi ullam eaque nobis sequi quod obcaecati ipsum ipsa repellendus facilis tenetur delectus quos hic tempora, soluta veritatis?</p>
                </article>
            </div>
        </section>


        <section>
            <h2>news</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse, amet incidunt inventore nemo vero culpa, beatae, architecto explicabo officia adipisci iste. Nobis, maiores ea! Ipsum ullam ut fugit accusantium ea!</p>
            <img src="assets/img/img2.jpg" alt="img2">
        </section>

