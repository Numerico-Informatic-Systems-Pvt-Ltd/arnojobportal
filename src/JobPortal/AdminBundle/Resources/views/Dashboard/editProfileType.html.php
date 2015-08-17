<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Modifier le profil type') ?>
<?php $view['slots']->start('body') ?>
<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">                                    
            <div class="page_heading">Modifier le profil type </div>
            <div class="table_pad">
                <form action="<?php echo $view['router']->generate('_candidate_profile_type_edit', array('id' => $profiletype->getId())) ?>" method="POST"> 
                    <div class="form-group">
                        <label>Nom de profil :</label>
                        <input type="text" class="form-control size" id="" name="name" placeholder="" value="<?php echo $profiletype->getName();?>"/>
                    </div>
                    <div class="form-group">
                        <label>catégorie Description :</label>
                        <textarea class="span12 ckeditor m-wrap" name="description" rows="6" data-error-container="#editor2_error"><?php echo $profiletype->getDescription();?></textarea>

                    </div>                                            
                    <div class="form-group">
                        <label>statut :</label><br />
                        <select name="status" class="size" style="height:35px;">                            
                            <option value="1" <?php if($profiletype->getStatus() == 1){ echo 'selected'; }?>>actif</option>
                            <option value="0" <?php if($profiletype->getStatus() == 0){ echo 'selected'; }?>>inactif</option>
                        </select>
                    </div>

                    <div class="profile_button_wrap">
                        <input class="profile_button" type="submit" value="Update"/>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>