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
                <h2>Mon profil</h2>
                <div class="col-lg-9">                    
                    <div class="form-group col-lg-12 less_pad">                            
                        <label class="col-sm-4 control-label">Nom de l'entreprise: </label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['company_name'];?>
                        </div>
                    </div>
                    
                    <div class="form-group col-lg-12 less_pad">
                        <label class="col-sm-4 control-label">Nom de l'employeur :</label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['name'];?>
                        </div>
                        
                    </div>
                    <div class="form-group col-lg-12 less_pad">
                        <label class="col-sm-4 control-label">Email :</label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['email'];?>
                        </div>
                        
                    </div>
                    <div class="form-group col-lg-12 less_pad">
                        <label class="col-sm-4 control-label">mobile Pas. :</label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['phone'];?>
                        </div>
                        
                    </div>
                    <div class="form-group col-lg-12 less_pad">
                        <label class="col-sm-4 control-label">adresse :</label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['address'];?>
                        </div>
                        
                    </div>
                    <div class="form-group col-lg-12 less_pad">
                        <label class="col-sm-4 control-label">Code Postal :</label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['pin_code'];?>
                        </div>
                        
                    </div>
                    <div class="form-group col-lg-12 less_pad">
                        <label class="col-sm-4 control-label">ville :</label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['city'];?>
                        </div>
                        
                    </div>
                    <div class="form-group col-lg-12 less_pad">
                        <label class="col-sm-4 control-label">pays :</label>
                        <div class="col-sm-8">
                            <?php echo $employerData[0]['country'];?>
                        </div>
                        
                    </div>
                    <div class="form-group col-lg-12 less_pad">
                            <label class="col-sm-4 control-label">Date de naissance</label>
                            <div class="col-sm-8">
                             <?php echo date('d-m-Y', strtotime($employerData[0]['dob']));?>
                            </div>
                          </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>

