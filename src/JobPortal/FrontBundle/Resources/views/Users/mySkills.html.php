
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
            <?php
                foreach( $scores as $score ){
            ?>
                    <div class="skill_wrap">
                        <div class="col-lg-3 col-sm-3">
                            <p><?php echo $score['category']; ?></p>
                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="points">
                                <?php
                                    if(!empty($score['score'])){
                                        echo $score['score'];
                                    }else{
                                        echo 0;
                                    }
                                ?> points</div>
                            <?php
                                $persentage = ( $score['score'] / 10 );
                            ?>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $persentage; ?>%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <a href="<?php echo $view['router']->generate('begin_test',  array('id' => $score['id'])) ?>"><input class="profile_button" type="button" value="Refaire le test >"></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
            <?php
                }
                    
            ?>
<!--                    <div class="skill_wrap">
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
                    </div>-->

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>

