<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Voir questions') ?>
<?php $view['slots']->start('body') ?>

<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">                                  
            <div class="page_heading">Voir questions</div>
            <div class="table_pad">
                <div class="form-group">
                        <label>catégorie :</label>
                        <select name="category_id" class="size" style="height:35px;" onchange="return viewQuestion(this.value);">
                            <option value="">--sélectionner--</option>
                            <?php
                            if (!empty($category)) {
                                foreach ($category as $category) {
                                    ?>
                                    <option value="<?php echo $category->getId(); ?>"><?php echo $category->getCategory(); ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>              
                               
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>