<?php //echo'<pre>'; print_r($answers); die; ?>
<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | registre de lutilisateur') ?>
<?php $view['slots']->start('body') ?>
<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="container-fluid main_body_bg">
    <div class="container">
        <div class="col-lg-3 col-sm-3">
            <div class="regis_box">
                <p>Evaluez Vos Competences, et laissez les employeurs consulter Votre profil</p>
                <div class="reg_lt_cont">
                    <div class="lt">
                        <img src="<?php echo $view['assets']->getUrl('JobPortal/images/tests_ico.png') ?>" alt="Test" class="img-responsive" />
                    </div>
                    <div class="rt">
                        Test
                    </div>
                    <div class="clearfix"></div>
                    <p>Evaluez Vos Competences dans des metiers techniques et evaluer votre personnaite</p>
                </div>

                <div class="reg_lt_cont">
                    <div class="lt">
                        <img src="<?php echo $view['assets']->getUrl('JobPortal/images/statistiquues_ico.png') ?>" alt="Test" class="img-responsive" />
                    </div>
                    <div class="rt">
                        Statistiques
                    </div>
                    <div class="clearfix"></div>
                    <p>Montrer les statistiques de vos competences</p>
                </div>

                <div class="reg_lt_cont">
                    <div class="lt">
                        <img src="<?php echo $view['assets']->getUrl('JobPortal/images/evolution_ico.png') ?>" alt="Test" class="img-responsive" />
                    </div>
                    <div class="rt">
                        Evolution
                    </div>
                    <div class="clearfix"></div>
                    <p>Fomez vous grace a nos partenaires pour augmenter vos points</p>
                </div>
                <div style="height:123px;"></div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-lg-5 col-sm-5">
            <div class="regis_box">
                <h1>Inscription</h1>
                <form action="<?php echo $view['router']->generate('user_register') ?>" method="POST" onsubmit="return CheckForm();">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nom" name="name" id="name" style="background:url(<?php echo $view['assets']->getUrl('JobPortal/images/name_ico.png') ?>) 5px center no-repeat; height:45px; padding-left:30px;">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" style="background:url(<?php echo $view['assets']->getUrl('JobPortal/images/mail_ico.png') ?>) 5px center no-repeat; height:45px; padding-left:30px;" onchange=" return checkEmail(this.value);">
                    <span id="email_check"></span>
                    <input type="hidden" id="email_error"/>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telephone" name="phone" id="phone" style="background:url(<?php echo $view['assets']->getUrl('JobPortal/images/mobile_ico.png') ?>) 5px center no-repeat; height:45px; padding-left:30px;">
                    </div>
                   
                    <div class="form-group">
                        <select class="form-control" size="3" multiple="multiple" tabindex="1" name="category[]" id="category_id" style="background:url(<?php echo $view['assets']->getUrl('JobPortal/images/category_ico.png') ?>) 5px center no-repeat; height:45px; padding-left:30px;">
                             <option>Choisir Une Catégorie</option>
                            <?php 
                            if(!empty($categories)){
                            foreach ($categories as $category) { ?>                            
                             <option value="<?php echo $category->getId(); ?>"><?php echo $category->getCategory(); ?></option>
                            <?php } }?>
                        </select>
                    </div>
                    <div class="form-group">
<!--                        <div class="col-sm-4 less_lt"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/captcha_img.png') ?>" alt="Captcha" class="img-responsive" style="height:45px;" /></div>
                        
                        
                        <div class="col-sm-6 less_pad">
                            <input type="text" class="form-control" placeholder="" style="height:45px;">
                        </div>
                        <div class="col-sm-2"><a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/refresh_btn.png') ?>" alt="Refresh" class="img-responsive" /></a></div>
                        -->
                        <div class="col-sm-12">
                            <?php if(!empty($captach_code)){ echo '<p style="color:red;">'.$captach_code.'</p>'; }?>
                            <div class="g-recaptcha" data-sitekey="6LfAIPwSAAAAAHoMtsvgjmuH0WP54KAinrWzNXRZ"></div>
                        </div>
                        <div class="clearfix"></div> 
                    </div>

                    <p class="help-block"> <input type="checkbox" name="terms_condition" id="terms_condition"> En souscrivant vous acceptez les CGU</p>

                    <div class="regis_button_wrap">
                        <input class="regis_button" type="submit" value="Je m'inscris">
                    </div>

                    <div class="clearfix"></div>     
                </form>

                <div class="regis_or">
                    <div class="cont">OU</div>
                </div>
                <div class="regis_social_wrap">
                    <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/regis_linkedin.png') ?>" alt="LinkedIn" class="img-responsive" /></a>
                </div>

                <div class="regis_or">
                    <div class="cont">OU</div>
                </div>
                <div class="regis_social_wrap">
                    <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/regis_fb.png') ?>" alt="Facebook" class="img-responsive" /></a>
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
            <div class="regis_box">
                <h1>Deja Inscrit</h1>

                <div class="regis_social_wrap">
                    <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/connect_linkedin.png') ?>" alt="LinkedIn" class="img-responsive" /></a>
                </div>
                <div class="regis_or">
                    <div class="cont">OU</div>
                </div>

                <div class="regis_social_wrap">
                    <a onClick="fblogin();" style="cursor:pointer"><img  src="<?php echo $view['assets']->getUrl('JobPortal/images/connect_fb.png') ?>" alt="Facebook" class="img-responsive" /></a>
                </div>
                <div class="regis_or">
                    <div class="cont">OU</div>
                </div>
                <?php //print_r($user_cookies_remember);?>
                <form id="loginForm" action="<?php echo $view['router']->generate('user_login') ?>" method="POST" onsubmit="return checkUserName();"> 
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name= "candidate_email" id="candidate_email" style="height:45px;" value="<?php if(!empty($user_cookies_remember)){ echo $user_cookies_remember['useremail']; }?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="height:45px;" value="<?php if(!empty($user_cookies_remember)){ echo $user_cookies_remember['password']; }?>">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" value="1" <?php if(!empty($user_cookies_remember)){ echo 'checked'; }?>> Se souvenir de moi
                    </div>
                    <div class="form-group">
                        <p id="invalid_cred" style="color:red;"><?php if(!empty($candiLogin)){ echo $candiLogin; }?></p>
                        <span id="emil_chek"></span>
                    </div>
                    <div class="regis_button_wrap">
                        <input class="regis_button" type="submit" value="Je me connecte">
                    </div>

                </form>
                <?php
                    if(isset($_GET['msg_success'])){
                        echo "<span style = 'color: green;'>".$_GET['msg_success']."</span>";
                    }
                ?>
                <p class="help-block"><center><a href="<?php echo $view['router']->generate('forget_password'); ?>">Vous avez perdu votre mot de passe?</a></center></p>

                <div class="clearfix"></div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>




<script src="//connect.facebook.net/en_US/all.js&appId=138232979848762" type="text/javascript"></script>
    <div id="fb-root" style="float:left; width:1px;"></div>
    <script>
                        window.fbAsyncInit = function() {
                        FB.init({
                        appId: '138232979848762',
                                cookie: true,
                                xfbml: true,
                                oauth: true
                        });
                        };
                        (function() {
                        var e = document.createElement('script'); e.async = true;
                                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                                document.getElementById('fb-root').appendChild(e);
                        }());
                        function fblogin(){                         
                        FB.login(function(response){
                        if (response.authResponse) {
                        window.location = '<?php echo $view['router']->generate('user_login_facebook'); ?>';
                        }
                        }, {scope: 'email'});
                        }
//                function fbregister(){
//
//                FB.login(function(response){
//                if (response.authResponse) {
//                window.location = '';
//                }
//                }, {scope: 'email'});
//                }
    </script>
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '138232979848762',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<?php $view['slots']->stop('body') ?>