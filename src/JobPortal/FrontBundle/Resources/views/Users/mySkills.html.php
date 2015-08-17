
<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil du candidat') ?>
<?php $view['slots']->start('body') ?>
<div class="container-fluid main_body_bg">
    <div class="container">
        <div class="col-lg-3 col-sm-3">
            <div class="profile_lt_nav">
                <ul>
                    <li><a href="<?php echo $view['router']->generate('user_profile') ?>" class="active">Profil du candidat</a></li>
                    <li><a href="<?php echo $view['router']->generate('user_update') ?>">Editer le profil</a></li>
                    <li><a href="<?php echo $view['router']->generate('user_cv') ?>">Mon CV</a></li>
                    <li><a href="<?php echo $view['router']->generate('chage_password'); ?>">Changer mot de passe</a></li>
                    <li><a href="#">Confiance et verification</a></li>
                    <li><a href="#" class="active">Mes competences</a></li>
                    <li><a href="#">Ajouter une competence</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-sm-9">
            <div class="profile_box">
                <h2>Mes competences</h2>
                <div class="my_detail">
                    <div class="skill_wrap">
                        <div class="col-lg-3 col-sm-3">
                            <p>Anglais</p>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="points">758points</div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input class="profile_button" type="button" value="Refaire le test >">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="skill_wrap">
                        <div class="col-lg-3 col-sm-3">
                            <p>Developpement web</p>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="points">758points</div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input class="profile_button" type="button" value="Refaire le test >">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>

