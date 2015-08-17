<?php //echo'<pre>'; print_r($answers); die;  ?>
<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Employeur enregistrer') ?>
<?php $view['slots']->start('body') ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container-fluid main_body_bg">
    <div class="container">
        <div class="col-lg-3 col-sm-3">
            <div class="regis_box">
                <p>Recherchez les candidats Suivant leurs experiences</p>
                <div class="reg_lt_cont">
                    <div class="lt">
                        <img src="<?php echo $view['assets']->getUrl('JobPortal/images/tests_ico.png') ?>" alt="Test" class="img-responsive" />
                    </div>
                    <div class="rt">
                        Test
                    </div>
                    <div class="clearfix"></div>
                    <p>Consultez leurs resultats</p>
                </div>

                <div class="reg_lt_cont">
                    <div class="lt">
                        <img src="<?php echo $view['assets']->getUrl('JobPortal/images/statistiquues_ico.png') ?>" alt="Test" class="img-responsive" />
                    </div>
                    <div class="rt">
                        Statistiques
                    </div>
                    <div class="clearfix"></div>
                    <p>Comparer les resultats</p>
                </div>

                <div class="reg_lt_cont">
                    <div class="lt">
                        <img src="<?php echo $view['assets']->getUrl('JobPortal/images/evolution_ico.png') ?>" alt="Test" class="img-responsive" />
                    </div>
                    <div class="rt">
                        Evolution
                    </div>
                    <div class="clearfix"></div>
                    <p>Surveillez leur evolution</p>
                </div>
                <div style="height:123px;"></div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-5 col-sm-5">
            <div class="regis_box">
                <h1>Inscription</h1>
                <form action="<?php echo $view['router']->generate('employer_register') ?>" method="POST" onsubmit="return employerRegisterValidation();">
                    <div class="form-group">
                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Nom de I'entreprise" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" id="address" class="form-control" placeholder="Adresse Postale" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="text" name="pin_code" id="pin_code" class="form-control" placeholder="Code postal" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" id="city" class="form-control" placeholder="Ville" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="text" name="country" id="country" class="form-control" placeholder="Pays" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="surname" placeholder="Prenom" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" onchange=" return checkEmployerEmail(this.value);" name="email" id="email" placeholder="Email" style="height:45px;">
                        <span id="email_check"></span>
                    <input type="hidden" id="email_error"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Telephone" style="height:45px;">
                    </div>

                    <div class="form-group">
<!--                        <div class="col-sm-4 less_lt"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/captcha_img.png') ?>" alt="Captcha" class="img-responsive" style="height:45px;" /></div>
                        <div class="col-sm-6 less_pad">
                            <input type="text" class="form-control" placeholder="" style="height:45px;">
                        </div>
                        <div class="col-sm-2"><a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/refresh_btn.png') ?>" alt="Refresh" class="img-responsive" /></a></div>-->
                        <div class="col-sm-12">
                            <?php if(!empty($captach_code)){ echo '<p style="color:red;">'.$captach_code.'</p>'; }?>
                            <div class="g-recaptcha" data-sitekey="6LfAIPwSAAAAAHoMtsvgjmuH0WP54KAinrWzNXRZ"></div>
                        </div>
                        <div class="clearfix"></div> 
                    </div>

                    <p class="help-block"><input type="checkbox" name="terms_condition" id="terms_condition">   En souscrivant vous acceptez les CGU</p>

                    <div class="regis_button_wrap">
                        <input class="regis_button" type="submit" value="Je m'inscris">
                    </div>

                    <div class="clearfix"></div>     
                </form>

            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
            <div class="regis_box">
                <h1>Deja Inscrit</h1>

                <form action="<?php echo $view['router']->generate('employer_login') ?>" method="post" onsubmit="return CheckEmployerLogin();">
                    <div class="form-group">
                        <input type="text" name="email" id="employer_email" class="form-control" placeholder="email" value="<?php if(!empty($employer_remember_cookies)){ echo $employer_remember_cookies['useremail']; }?>" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="password" id="employer_password" name="password" class="form-control" placeholder="Password" value="<?php if(!empty($employer_remember_cookies)){ echo $employer_remember_cookies['password']; }?>" style="height:45px;">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" <?php if(!empty($employer_remember_cookies)){ echo 'checked'; }?>> Se souvenir de moi
                    </div>
                    <p id="invalid_cred" style="color:red;"><?php if(!empty($employer_login)){ echo $employer_login; }?></p>
                    <span id="emil_chek"></span>
                    <div class="regis_button_wrap">
                        <input class="regis_button" type="submit" value="Je me connecte">
                    </div>

                </form>

                <p class="help-block"><center><a href="<?php echo $view['router']->generate('employer_forget_password'); ?>">Vous avez perdu votre mot de passe?</a></center></p>

                <div class="clearfix"></div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>
