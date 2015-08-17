<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil utilisateur') ?>
<?php $view['slots']->start('body') ?>



<div class="container-fluid main_body_bg">
	<div class="container">
    	
        <div class="col-lg-12 col-sm-12">
        	<div class="begin_test_wrap">
            	<h2>Détail du test de</h2>
                <div class="test_detail">
                    <div class="col-lg-9 col-sm-9">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc; margin-bottom:35px;">
                          <tr>
                            <td align="left" valign="top" width="40%" class="td_head">Nom du test</td>
                            <td align="left" valign="top" width="60%" class="td_cont">Programmation informatique PHP</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" width="40%" class="td_head">Nombre de question :</td>
                            <td align="left" valign="top" width="60%" class="td_cont">150</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" width="40%" class="td_head">Temps(minutes):</td>
                            <td align="left" valign="top" width="60%" class="td_cont">45</td>
                          </tr>
                          <tr>
                            <td align="left" valign="top" class="td_cont" colspan="2" style="border-bottom:none;">0.25 points seront deduis pour chaque reponse invalide</td>
                          </tr>
                        </table>
                        
                        <div class="test_start_button_wrap">
                            <a href = "<?php echo $view['router']->generate('test_exams') ?>" ><input type="button" class="test_start_button" value="Démarrer le test >" /></a>
                        </div>

                    </div>
                    <div class="col-lg-3 col-sm-3">
                    	<img src="<?php echo $view['assets']->getUrl('JobPortal/images/ads_img1.jpg') ?>" alt="Ads" class="img-responsive" width="100%" />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>