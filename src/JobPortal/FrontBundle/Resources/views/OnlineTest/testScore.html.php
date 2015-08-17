<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil utilisateur') ?>
<?php $view['slots']->start('body') ?>
<div class="container-fluid main_body_bg">
	<div class="container">
    	
        <div class="col-lg-12 col-sm-12 result_wrap">
        	
            <div class="col-lg-9 col-sm-9">
                <h2>Résultat de votre test</h2>
                <div class="result">
                    <div class="info">
                        <p><strong>Nom du test</strong>:Programmation informatique PHP</p>
                    </div>
                    <div class="info pull-right">
                        <p><strong>Date</strong>:27 mars 2015</p>
                    </div>
                    
                    <div class="col-lg-12 less_pad">
                        <div class="result_head"><span>Votre score</span></div>
                        <div class="result_box_wrap">
                            <div class="col-lg-4 col-sm-4">
                                <p><strong>Réponses correctes</strong></p>
                                <p>10 sur 12</p>
                            </div>
                            <div class="col-lg-4 col-sm-4" style="border-left:1px solid #ccc; border-right:1px solid #ccc;">
                                <p><strong>Score</strong></p>
                                <p>9.5 sur 12</p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <p><strong>Temps</strong></p>
                                <p>0 Min 9Sec</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 less_pad">
                        <div class="result_head"><span>Partager vos resultats sur</span></div>
                        <div class="result_box_wrap">
                            <div class="col-lg-6 col-sm-6">
                                <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/result_facebook.png') ?>" alt="Facebook" class="img-responsive pull-right" style="margin-bottom:8px;" /></a>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/result_linkedin.png') ?>" alt="Linkedin" class="img-responsive pull-left" style="margin-bottom:8px;" /></a>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/result_twitter.png') ?>" alt="Twitter" class="img-responsive pull-right" /></a>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/result_viadeo.png') ?>" alt="Viadeo" class="img-responsive pull-left" /></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="result_button_wrap">
                        <input type="button" class="result_button" value="Faire des tests similaire >" />
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3">
                <div class="result">
                    <img src="<?php echo $view['assets']->getUrl('JobPortal/images/ads_img2.jpg') ?>" alt="Ads" class="img-responsive" width="100%" />
                </div>
            </div>
            <div class="clearfix"></div>
            
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>