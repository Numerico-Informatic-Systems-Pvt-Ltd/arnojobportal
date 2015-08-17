<?php //echo'<pre>'; print_r($answers); die;    ?>
<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Employeur enregistrer') ?>
<?php $view['slots']->start('body') ?>
<div class="container-fluid search_main_body_bg">
    <div class="container">
        <div class="col-lg-3 col-sm-3">     	
            <div class="search_lt_box">
                <h2 class="heading" style="background-image:none;">Mon Compte</h2>
                <ul>
                    <li><a href="#" class="active">Editer le profil</a></li>
                    <li><a href="#">Faire un dépôt</a></li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="col-lg-9 col-sm-9">


            <div class="search_list_wrap" style="margin-top:0px; min-height:255px;">
                <h2>Editer le profil</h2>
                <div class="col-lg-8">
                    <form onsubmit="return checkEmployerPassword();" class="form-horizontal" action="<?php echo $view['router']->generate('employer_change_password'); ?>" method="POST">
                        <div class="form-group">
                            <?php if (!empty($change_password_succ)) { ?>
                                <p style="color:#4cae4c;font-weight: bold; "><?php echo $change_password_succ; ?></p>
                            <?php } ?>
                            <label class="col-sm-4 control-label">mot de passe</label>
                            <div class="col-sm-8">
                                <input type="password" name= "password" class="form-control" id="password" placeholder="mot de passe">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Confirmez le mot de passe</label>
                            <div class="col-sm-8">
                                <input type="password" name="cnf_password" class="form-control" id="cnf_password" placeholder="Confirmez le mot de passe">
                            </div>
                            <div id="password_error" style="color: red;"></div>
                        </div>                     

                        <div class="form-group">
                            <div class="profile_button_wrap" style="margin-right:15px;">
                                <input class="profile_button pull-right" type="submit" value="mettre à jour">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>
