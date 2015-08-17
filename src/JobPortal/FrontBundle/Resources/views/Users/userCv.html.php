<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | candidat Cv') ?>
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
            	<h2>Editer mon CV</h2>
                <div class="my_detail">
                    
                    <div class="col-lg-12 col-sm-12">
                        <form class="form-horizontal" action="<?php echo $view['router']->generate('user_cv') ?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                              <input type="hidden" name="user_id" value="<?php echo $userSession['login_candidate_id'];?>"/>
                            <label class="col-sm-4 control-label">Votre etat d'esprit</label>
                            <div class="col-sm-8">
                                <textarea class="form-control ckeditor m-wrap" rows="3" name="your_state_of_mind"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">CV au format PDF</label>
                            <div class="col-sm-8">
                                <input type="file" class="foraam-control" name="cv_in_pdf" data-bfi-disabled id="" placeholder="Upload" >
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Votre ecoute au marche ?</label>
                            <div class="col-sm-8">
                                <?php if(!empty($ProfileTypes)){ 
                                    foreach ($ProfileTypes as $ProfileType){                                    ?>
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="looking_for[]" value="<?php echo $ProfileType->getId(); ?>">
                                    <?php echo $ProfileType->getName();?>
                                  </label>
                              </div>
                                <?php } } ?>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                              <input class="profile_button" type="submit" value="Valider >">
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
