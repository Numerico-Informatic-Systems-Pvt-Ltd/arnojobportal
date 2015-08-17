<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Employeur Proile') ?>
<?php $view['slots']->start('body') ?>
<div class="container-fluid search_main_body_bg">
	<div class="container">
    	<div class="col-lg-3 col-sm-3">
        	
            
            <div class="search_lt_box">
            	<h2 class="heading" style="background-image:none;">Mon Compte</h2>
                <ul>
                	<li><a href="<?php echo $view['router']->generate('employer_update');?>" class="active">Editer le profil</a></li>
                    <li><a href="#">Faire un dépôt</a></li>
                </ul>
            </div>
            
            <div class="clearfix"></div>
        </div>
            <?php //print_r($employerData);?>
        <div class="col-lg-9 col-sm-9">       	
            
            <div class="search_list_wrap" style="margin-top:0px; min-height:255px;">
            	<h2>Editer le profil</h2>
            	<div class="col-lg-8">
                    <form class="form-horizontal" action="<?php echo $view['router']->generate('employer_update');?>" method="POST">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nom de I'entreprise</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo $employerData[0]['company_name']; ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Adresse Postale</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $employerData[0]['address']; ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Code Postal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="pin_code" name="pin_code" value="<?php echo $employerData[0]['pin_code']; ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Ville</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $employerData[0]['city']; ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">pays</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="country" name="country" value="<?php echo $employerData[0]['country']; ?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nom</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $employerData[0]['name'];?>" placeholder="">
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="email" name="email" value="<?php echo $employerData[0]['email'];?>" placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Téléphone</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?php echo $employerData[0]['phone'];?>">
                        </div>
                      </div>
                      <div class="form-group">
                            <label class="col-sm-4 control-label">Date de naissance</label>
                            <div class="col-sm-8">
                              <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                                  <input class="form-control" type="text" readonly name="dob" value="<?php echo $employerData[0]['dob'];?>"/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                            </div>
                          </div>
                      <div class="form-group">
                        <div class="profile_button_wrap" style="margin-right:15px;">
                            <input class="profile_button pull-right" type="submit" value="Valider">
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

