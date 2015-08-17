<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil utilisateur') ?>
<?php $view['slots']->start('body') ?>
<div class="container-fluid main_body_bg">
	<div class="container">
    	<div class="col-lg-3 col-sm-3">
        	<div class="profile_lt_nav">
            	<ul>
                    <li><a href="<?php echo $view['router']->generate('user_profile') ?>" >Profil du candidat</a></li>
                    <li><a href="<?php echo $view['router']->generate('user_update') ?>" >Editer le profil</a></li>
                    <li><a href="#">Mon CV</a></li>
                    <li><a href="<?php echo $view['router']->generate('chage_password'); ?>" class="active">Changer mot de passe</a></li>
                    <li><a href="#">Confiance et verification</a></li>
                </ul>
            </div>
        </div>
            <div class="col-lg-9 col-sm-9" >
        	<div class="profile_box">
            	<h2>Changer le mot de passe</h2>
                <div class="my_detail">
                    <div class="col-lg-7 col-sm-7">
                        <?php if(!empty($change_password_succ)){ ?>
                        <p style="color:#4cae4c;font-weight: bold; "><?php echo $change_password_succ; ?></p>
                        <?php }?>
                        <form class="form-horizontal" action="<?php echo $view['router']->generate('chage_password') ?>" method="POST" onsubmit="return checkPassword();">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">mot de passe</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="mot de passe">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Confirmez Le Mot De Passe</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="cnf_password" id="cnf_password" placeholder="Confirmez Le Mot De Passe">
                            </div>
                            <div id="password_error" style="color: red;"></div>
                          </div>
                          <?php //print_r($change_password_succ);?>
                          
                          <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="profile_button" type="submit" value="Mise À Jour >">
                            </div>
                          </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>
