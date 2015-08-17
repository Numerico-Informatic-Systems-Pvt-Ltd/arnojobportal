<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | mise à jour question ') ?>
<?php $view['slots']->start('body') ?>
<?php //print_r($categories);  ?>
<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">                                    
            <div class="page_heading">mise à jour question </div>
            <div class="table_pad">
                <form action="<?php echo $view['router']->generate('_update_quesion_view') ?>" method="POST"> 
                    <?php 
                    //echo '<pre>';
                    //print_r($question);?>
                    <input type="hidden" name="question_id" value="<?php echo $question_id; ?>"/>
                    <div class="form-group">
                        <label>type standard :</label><br />
                        <select name="standard_type" class="size" style="height:35px;">
                            <option value="" >--sélectionner--</option>
                            <option value="1" <?php if($question[0]['standard_type'] == 1){ echo 'selected'; }?>>très facile</option>
                            <option value="2" <?php if($question[0]['standard_type'] == 2){ echo 'selected'; }?>>facile</option>
                            <option value="3" <?php if($question[0]['standard_type'] == 3){ echo 'selected'; }?>>moyen</option>
                            <option value="4" <?php if($question[0]['standard_type'] == 4){ echo 'selected'; }?>>difficile</option>
                            <option value="5" <?php if($question[0]['standard_type'] == 5){ echo 'selected'; }?>>très difficile</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>question :</label>
                        <textarea class="span12 ckeditor m-wrap" name="question" rows="6" data-error-container="#editor2_error"><?php echo $question[0]['question']?></textarea>

                    </div>
                    <div class="form-group">
                        <label>marque positif :</label><br />
                        <input name="marks_positive" type="text" class="form-control size" value="<?php echo $question[0]['marks_positive']?>"/>
                    </div>
                    <div class="form-group">
                        <label>marques négative :</label><br />
                        <input name="marks_negative" type="text" class="form-control size" value="<?php echo $question[0]['marks_negative']?>"/>
                    </div>
                    <?php 
                    if(!empty($question)) {
                    foreach($question as $ques) { ?>
                    <div style="display: block;">
                    <div class="form-group" style="width:400px; float: left;">
                        <label >répondre :</label><br>
                        <textarea  class="span6 m-wrap" name="answer[]" rows="3" style="width: 90%;text-align: left;"><?php echo $ques['answer']; ?></textarea>
                        

                    </div>
                        
                    <div style=" float: left; margin:0px 10px; width: 250px;" class="form-group">
                        <label>le statut de réponse :</label>
                        <div style="clear: both;margin-left: 55px;">
                            <input type="radio" name="answer_status[]" value="1" <?php if($ques['answer_status'] == 1){ echo 'checked'; }?>/>
                            <input type="hidden" name="answer_status[]" value="0" />
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
                    <?php }} ?>
                    
                    <div class="clearfix"></div>
                    
                    <!-- Add more Answer-->
                    <div id="more_ans">
                        
                    </div>
                    <div class="form-group">
                        <label>statut :</label><br />
                        <select name="status" class="size" style="height:35px;">
                            <option value="">--sélectionner--</option>
                            <option value="1" <?php if($question[0]['status'] == 1){ echo 'selected'; }?>>actif</option>
                            <option value="0" <?php if($question[0]['status'] == 0){ echo 'selected'; }?>>inactif</option>
                        </select>
                    </div>

                    <div class="profile_button_wrap">
                        <input class="profile_button" type="submit" value="mise à jour"/>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>
