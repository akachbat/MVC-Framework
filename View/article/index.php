<?php $this->titre = "Mon Blog - " . $this->clean($article['titre']) ?>

<article>
    <header>
        <h1 class="titreArticle"><?= $this->clean($article['titre']) ?></h1>
        <p><em>Date</em> : <b><?= $article['date'] ?></b></p>
    </header>
    <p class="content"><?= $this->clean($article['contenu']) ?></p>
</article>
<hr />

<h3 id="titreReponses">Commentaires</h3>
<?php foreach ($commentaires as $commentaire): ?>

    <p><em><?= $this->clean($commentaire['auteur']) ?></em> dit :</p>
    <p><?= $this->clean($commentaire['contenu']) ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="article/commenter">
    <div class="col-xs-4">
        <div class="form-group">
            <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" required class="form-control" />
        </div>
        <div class="form-group">
            <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required class="form-control"></textarea>
        </div>
        <input type="hidden" name="id" value="<?= $this->clean($article['id']) ?>" />
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </div>
</form>

