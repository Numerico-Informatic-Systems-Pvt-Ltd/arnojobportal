<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Ajouter Catégorie ') ?>
<?php $view['slots']->start('body') ?>
<?php //print_r($category);?>
                        <div class="col-lg-9 col-sm-9">
                            <div class="dashboard_bg">
                                <div class="page_wrap">
                                    
                                    <div class="page_heading">Ajouter Catégorie </div>
                                    <div class="table_pad">
                                        <form action="<?php echo $view['router']->generate('_category_edit', array('id' => $category->getId())); ?>" method="POST"> 
                                            <div class="form-group">
                                                <label>Nom De Catégorie :</label>
                                                <input type="text" class="form-control size" value="<?php echo $category->getCategory();?>" id="" name="category" placeholder=""/>
                                            </div>
                                            <div class="form-group">
                                                <label>catégorie Description :</label>
                                                <textarea class="span12 ckeditor m-wrap" name="details" rows="6" data-error-container="#editor2_error">
                                                <?php echo $category->getDescription();?>
                                                </textarea>

                                            </div>                                            
                                            <div class="form-group">
                                                <label>statut :</label><br />
                                                <select name="status" class="size" style="height:35px;">
                                                    <option value="">--sélectionner--</option>
                                                    <option value="1" <?php if($category->getStatus() == 1){ echo 'selected'; }?>>actif</option>
                                                    <option value="0" <?php if($category->getStatus() == 0){ echo 'selected'; }?>>inactif</option>
                                                </select>
                                            </div>

                                            <div class="profile_button_wrap">
                                                <input class="profile_button" type="submit" value="Mise À Jour"/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
<?php $view['slots']->stop('body') ?>