<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Mon CV Détails') ?>
<?php $view['slots']->start('body') ?>
<div class="container-fluid main_body_bg">
    <div class="container">
        <div class="col-lg-3 col-sm-3">
            <div class="profile_lt_nav">
                <ul>
                    <li><a href="<?php echo $view['router']->generate('user_profile') ?>" >Profil du candidat</a></li>
                    <li><a href="<?php echo $view['router']->generate('user_update') ?>">Editer le profil</a></li>
                    <li><a href="<?php echo $view['router']->generate('user_cv') ?>" class="active">Mon CV</a></li>
                    <li><a href="<?php echo $view['router']->generate('chage_password'); ?>">Changer mot de passe</a></li>
                    <li><a href="#">Confiance et verification</a></li>
                </ul>
            </div>
        </div>
        <?php //print_r($userSession); ?>
        <div class="col-lg-9 col-sm-9">
            <div class="profile_box">
                <h2>Mon CV Détails</h2>
                <div class="my_detail">                    
                    <div class="col-lg-12 col-sm-12">
                        <table class="table table-striped" cellpadding="0" cellspacing="0">
                            <tr>                            
                                <th>Votre état d'esprit</th>
                                <th>date de création</th>                                          

                                <th colspan="2">action</th>
                            </tr>
                            <tr>
                                <?php
                                foreach ($profileDetails as $profileDetail) {
                                    ?>
                                    <td><?php echo $profileDetail->getYourStateOfMind(); ?></td>
                                    <td><?php echo $profileDetail->getCreatedDate(); ?></td>
                                    <td><a href="">Update</a></td>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>
