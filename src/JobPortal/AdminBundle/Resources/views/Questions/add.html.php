<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Ajouter questions ') ?>
<?php $view['slots']->start('body') ?>
<?php //print_r($categories);  ?>
<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">                                    
            <div class="page_heading">Ajouter questions </div>
            <div class="table_pad">
                <form action="<?php echo $view['router']->generate('_question_add') ?>" method="POST"> 
                    <div class="form-group">
                        <label>catégorie :</label><br />
                        <select name="category_id" class="size" style="height:35px;">
                            <option value="">--sélectionner--</option>
                            <?php
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    ?>
                                    <option value="<?php echo $category->getId(); ?>"><?php echo $category->getCategory(); ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>type standard :</label><br />
                        <select name="standard_type" class="size" style="height:35px;">
                            <option value="">--sélectionner--</option>
                            <option value="1">très facile</option>
                            <option value="2">facile</option>
                            <option value="3">moyen</option>
                            <option value="4">difficile</option>
                            <option value="5">très difficile</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>question :</label>
                        <textarea class="span12 ckeditor m-wrap" name="question" rows="6" data-error-container="#editor2_error">
                        </textarea>

                    </div>
                    <div class="form-group">
                        <label>marque positif :</label><br />
                        <input name="marks_positive" type="text" class="form-control size" value=""/>
                    </div>
                    <div class="form-group">
                        <label>marques négative :</label><br />
                        <input name="marks_negative" type="text" class="form-control size" value=""/>
                    </div>
                    <div style="display: block;">
                    <div class="form-group" style="width:400px; float: left;">
                        <label >répondre :</label><br>
                        <textarea  class="span6 m-wrap" name="answer[]" rows="3" style="width: 90%;text-align: left;"></textarea>
                        

                    </div>
                        
                    <div style=" float: left; margin:0px 10px; width: 250px;" class="form-group">
                        <label>le statut de réponse :</label>
                        <div style="clear: both;margin-left: 55px;">
                            <input type="radio" name="answer_status[]" value="1"/>
                            <input type='hidden' name='answer_status[]' value='0' />
                        </div>
                    </div>
                    <div style=" float: left; margin:0px 10px;" class="form-group">
                        <label>ajouter plus de réponse :</label>
                        <div style="clear: both;margin-left: 55px;">
                            <a href="" onclick="return addMoreAnswer();">
                                <img src="<?php echo $view['assets']->getUrl('JobPortal/images/add.png') ?>" width="30px"/>
                            </a>
                        </div>
                    </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    
                    <div class="clearfix"></div>
                    
                    <!-- Add more Answer-->
                    <div id="more_ans">
                        
                    </div>
                    <div class="form-group">
                        <label>statut :</label><br />
                        <select name="status" class="size" style="height:35px;">
                            <option value="">--sélectionner--</option>
                            <option value="1">actif</option>
                            <option value="0">inactif</option>
                        </select>
                    </div>

                    <div class="profile_button_wrap">
                        <input class="profile_button" type="submit" value="ajouter"/>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>
