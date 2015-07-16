<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <base href="<?= $webRoot ?>"></base>
        <link rel="stylesheet" href="content/css/bootstrap.min.css" />
        <!--CUSTOM CSS -->
        <?= $this->fetch('css') ?>
        <!--/ CUSTOM CSS -->
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand" href="#">Simple MVC Framework</a>
            </div>
        </nav>

        </header>
        <section id="content">
            <div class="container">
                <div class="content">
                    <?= $content ?>
                </div> <!-- #contenu -->
            </div>
        </section>
        <!--CUSTOM JS -->
        <?= $this->fetch('js') ?>
        <!--/ CUSTOM JS -->        
    </body>
</html>