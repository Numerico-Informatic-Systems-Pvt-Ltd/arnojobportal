<?php //echo'<pre>'; print_r($answers); die; ?>
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
                    <li><a href="<?php echo $view['router']->generate('fetch_category'); ?>">commencer Test</a></li>
                    <li><a href="#">Confiance et verification</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-sm-9">
        	<div class="profile_box">
            	<h2>Profil du candidat</h2>
                <div class="my_detail">
                    <div class="col-lg-5 col-sm-5">
                        <?php 
                        if($userData[0]['image']){
                        $image =    'uploads/users/'.$userData[0]['image']; 
                        }else{
                            $image = 'JobPortal/images/user.png';
                        }   
                                               
                        ?>
                    	<div class="user_img">
                        	<img src="<?php echo $view['assets']->getUrl('').$image; ?>" alt="<?php echo $userData[0]['image'];?>" class="img-responsive" />
                        </div>
                        <form action="<?php echo $view['router']->generate('user_img_upload') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" id="" name="image">
                            <input type="hidden" name="user_id" value="<?php echo $userData[0]['id'];?>"/>
                        </div>
                        <div class="profile_button_wrap">
                            <input class="profile_button" type="submit" value="Ajouter >">
                        </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <?php //print_r($userData); ?>
                    <div class="col-lg-7 col-sm-7">
                    	<form class="form-horizontal">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Nom</label>
                            <div class="col-sm-8">
                              <?php echo $userData[0]['name'];?>
                            </div>
                          </div>                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Adresse Postale</label>
                            <div class="col-sm-8">
                             <?php echo $userData[0]['address'];?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Code Postal</label>
                            <div class="col-sm-8">
                             <?php echo $userData[0]['pin_code'];?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Ville</label>
                            <div class="col-sm-8">
                             <?php echo $userData[0]['city'];?>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Telephone</label>
                            <div class="col-sm-8">
                              <?php echo $userData[0]['phone'];?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                              <?php echo $userData[0]['email'];?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Date de naissance</label>
                            <div class="col-sm-8">
                             <?php echo date('d-m-Y', strtotime($userData[0]['dob']));?>
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
