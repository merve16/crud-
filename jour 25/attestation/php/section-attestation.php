<section>
     <h2>FORMULAIRE DE DECLARATION POUR ATTESTATION</h2>
     <form action="" method="POST">
         <input type="text" name="nom" required placeholde="votre nom">
         <input type="text" name="prenom" required placeholder="votre prenom">
         <textarea name="adresse" cols="60" rows="60" required placeholder="votre adresse"></textarea>
         <h3>cocher la raison de votre deplacement</h3>


         <label>
             <input type="radio" name="raison" required value="courses alimentaires">
             <span>courses alimentaires</span>
         </label>

         
         <label>
                    <input type="radio" name="raison" required value="travail">
                    <span>travail</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="aide aux proches">
                    <span>aide aux proches</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="necessité médicale">
                    <span>nécessité médicale</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="necessité familiale">
                    <span>necessité familiale</span>
                </label>

                <label>
                    <input type="radio" name="raison" required value="sortie sport individuel">
                    <span>sortie sport individuel</span>
                </label>

                <button type="submit">enregistrer ma déclaration</button>
            </form>
        </section>
