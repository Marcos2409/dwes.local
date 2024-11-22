<?php

use dwes\app\utils\Utils;
?>

<body id="page-top">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-fixed-top navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <span>[PHOTO]</span>
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="menu">
                <ul class="nav navbar-nav">
                    <li class="lien <?= Utils::esOpcionMenuActiva('/') ? 'active' : '' ?>">
                        <a href="/"><i class="fa fa-home sr-icons"></i> Home</a>
                    </li>

                    <?php if (is_null($app['user'])) : ?>
                        <?php if (Utils::esOpcionMenuActiva('/login') == true) echo '<li class="active lien">';
                        else echo '<li class=" lien">'; ?>
                        <a href="/login"><i class="fa fa-user-secret sr-icons"></i> Login</a></li>
                        
                        <li class="<?= Utils::esOpcionMenuActiva('/registro') ? 'active' : '' ?> lien">
                            <a href="<?= Utils::esOpcionMenuActiva('/registro') ? '#' : '/registro' ?>">
                                <i class="fa fa-sign-in sr-icons"></i> Registro</a>
                        </li>

                    <?php else : ?>
                        <li class="lien <?= Utils::esOpcionMenuActiva('/galeria') ? 'active' : '' ?>">
                            <a href="/galeria"><i class="fa fa-bookmark sr-icons"></i> Galeria</a>
                        </li>
                        <li class="lien <?= Utils::esOpcionMenuActiva('/asociados') ? 'active' : '' ?>">
                            <a href="/asociados"><i class="fa fa-bookmark sr-icons"></i> Asociados</a>
                        </li>
                        <?php if (Utils::esOpcionMenuActiva('/logout') == true) echo '<li class="active lien">';
                        else echo '<li class=" lien">'; ?>
                        <a href="/logout"><i class="fa fa-sign-out sr-icons"></i> Logout: <?= $app['user']->getUsername() ?></a></li>
                    <?php endif; ?>
                    <li class="lien <?= Utils::esOpcionMenuActiva('/about') ? 'active' : '' ?>">
                        <a href="/about"><i class="fa fa-bookmark sr-icons"></i> About</a>
                    </li>
                    <li class="lien <?= Utils::esOpcionMenuActiva('/blog') ? 'active' : '' ?>">
                        <a href="/blog"><i class="fa fa-file-text sr-icons"></i> Blog</a>
                    </li>
                    <li class="<?= Utils::esOpcionMenuActiva('/contact') ? 'active' : '' ?>">
                        <a href="/contact"><i class="fa fa-phone-square sr-icons"></i> Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End of Navigation Bar -->