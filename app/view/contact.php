<main id="mainContact">

    <section id="contact" class="titleSection">
        <div class="positionTitleSection">
            <h3>Me contacter</h3>
            <p>Parlons plus en detail de votre projet</p>
        </div>
    </section>
    
    <form id="formContact" method="POST" action="../app/controller/traitement-contact.php">
        <div class="identite">
            <input class="formContactInput" id="contactInputNom" type="text" name="contactInputNom" placeholder="Nom" required>
            <input class="formContactInput" id="contactInputPrenom" type="text" name="contactInputPrenom" placeholder="Prénom" required>
        </div>
        <input class="formContactInput" id="contactInputTel" type="tel" name="contactInputTel" placeholder="Téléphone" required>
        <input class="formContactInput" id="contactInputEmail" type="email" name="contactInputEmail" placeholder="E-mail" required>
        <select name="prestation" value="prestation">
            <option>choisir la prestation</option>
            <option>prestation 1</option>
            <option>prestation 2</option>
            <option>prestation 3</option>
        </select>
        <input class="formContactInput" id="contactInputObjet" type="text" name="contactInputObjet" placeholder="Objet" required>
        <textarea id="contactInputMessage" type="text" name="contactInputMessage" placeholder="Message" required></textarea>
        <input id="contactInputBtn" type="submit" name="contactInputBtn" value="Envoyer">
    </form>

</main>