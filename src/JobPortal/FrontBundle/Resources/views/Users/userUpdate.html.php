<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil utilisateur') ?>
<?php $view['slots']->start('body') ?>
<div class="container-fluid main_body_bg">
	<div class="container">
    	<div class="col-lg-3 col-sm-3">
        	<div class="profile_lt_nav">
            	<ul>
                    <li><a href="<?php echo $view['router']->generate('user_profile') ?>">Profil du candidat</a></li>
                    <li><a href="<?php echo $view['router']->generate('user_update') ?>" class="active">Editer le profil</a></li>
                    <li><a href="#">Mon CV</a></li>
                    <li><a href="<?php echo $view['router']->generate('chage_password'); ?>">Changer mot de passe</a></li>
                    <li><a href="#">Confiance et verification</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 col-sm-9">
        	<div class="profile_box">
            	<h2>Editer le profil</h2>
                <div class="my_detail">
                    <div class="col-lg-5 col-sm-5">
                        <?php 
                        if($candidateData[0]['image']){
                        $image =    'uploads/users/'.$candidateData[0]['image']; 
                        }else{
                            $image = 'JobPortal/images/user.png';
                        }                        
                        ?>
                    	<div class="user_img">
                        	<img src="<?php echo $view['assets']->getUrl('').$image; ?>" alt="User" class="img-responsive" />
                        </div>
                         <form action="<?php echo $view['router']->generate('user_img_upload') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <input type="file" id="" name="image">
                            <input type="hidden" name="user_id" value="<?php echo $candidateData[0]['id'];?>"/>
                        </div>
                        <div class="profile_button_wrap">
                            <input class="profile_button" type="submit" value="Ajouter >">
                        </div>
                         </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-lg-7 col-sm-7">
                        <form class="form-horizontal" action="<?php echo $view['router']->generate('user_update') ?>" method="POST">
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Nom</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" id="" placeholder="" value="<?php echo $candidateData[0]['name'];?>">
                            </div>
                          </div>                          
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Adresse Postale</label>
                            <div class="col-sm-8">
                                <input type="text" name="address" class="form-control" id="" placeholder="" value="<?php echo $candidateData[0]['address'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Code Postal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="" name="pin_code" placeholder="" value="<?php echo $candidateData[0]['pin_code'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Ville</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="" placeholder="" name="city" value="<?php echo $candidateData[0]['city'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Pays</label>
                            <div class="col-sm-8">
                              <select style="width:100%; height:34px;">
                                  <option value="">--Select Pays--</option>
                                  <option value="India">India</option>
                                  <option value="England">England</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Telephone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="" name="phone"  value="<?php echo $candidateData[0]['phone']; ?>" placeholder="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="" placeholder="" name="email" value="<?php echo $candidateData[0]['email'];?>" readonly>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-4 control-label">Date de naissance</label>
                            <div class="col-sm-8">
                              <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                  <input class="form-control" type="text" readonly name="dob" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
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

