<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($articles as $article):
    ?>
    <article>
        <header>
            <a href="<?= "article/" . $this->clean($article['id']) ?>">
                <h1 class="titreBillet"><?= $this->clean($article['titre']) ?></h1>
            </a>
            <p><em>Date</em> : <b><?= $article['date'] ?></b></p>
        </header>
        <p><?= $this->clean($article['contenu']) ?></p>
    </article>
    <hr />
<?php endforeach; ?>

<?= $this->includeJS('content/js/app.js') ?>