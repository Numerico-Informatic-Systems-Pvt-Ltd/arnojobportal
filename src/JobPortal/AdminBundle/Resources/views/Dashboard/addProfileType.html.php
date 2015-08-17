<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | ajouter Type de profil') ?>
<?php $view['slots']->start('body') ?>
<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">                                    
            <div class="page_heading">ajouter Type de profil </div>
            <div class="table_pad">
                <form action="<?php echo $view['router']->generate('_candidate_profile_type') ?>" method="POST"> 
                    <div class="form-group">
                        <label>Nom de profil :</label>
                        <input type="text" class="form-control size" id="" name="name" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label>catégorie Description :</label>
                        <textarea class="span12 ckeditor m-wrap" name="description" rows="6" data-error-container="#editor2_error">
                        </textarea>

                    </div>                                            
                    <div class="form-group">
                        <label>statut :</label><br />
                        <select name="status" class="size" style="height:35px;">                            
                            <option value="1">actif</option>
                            <option value="0">inactif</option>
                        </select>
                    </div>

                    <div class="profile_button_wrap">
                        <input class="profile_button" type="submit" value="Add"/>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>