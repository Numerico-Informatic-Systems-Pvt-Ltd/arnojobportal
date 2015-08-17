<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil Admin Update') ?>
<?php $view['slots']->start('body') ?>
                        <div class="col-lg-9 col-sm-9">
                            <div class="dashboard_bg">
                                <div class="page_wrap">
                                    <div class="page_heading">Mise à jour administrative profil</div>

                                        <div class="table_pad">
                                            <form action = "<?php echo $view['router']->generate('_admin_profile_update') ?>" method = "POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>nom:</label>
                                                    <input type="text" class="form-control size" id="" name="name" placeholder="" value = "<?php echo $admin_data[0]['name']; ?>" />
                                                    <input type="hidden" name="hid_id" value = "<?php echo $admin_data[0]['id']; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>email:</label>
                                                    <br>
                                                    <?php echo $admin_data[0]['email']; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>mot de passe:</label>
                                                    <br>
                                                    ********
                                                </div>
                                                <div class="form-group">
                                                    <label>image:</label>
                                                    <?php
                                                    if (!empty($admin_data[0]['image'])) {
                                                        echo "<img src = '" . $view['assets']->getUrl('uploads/').$admin_data[0]['image'] . "' height = '75' width = '55' >";
                                                    } else {
                                                        echo "<img src = '" . $view['assets']->getUrl('JobPortal/images/admin.png') . "' height = '75' width = '55' >";
                                                    }
                                                    ?>
                                                    <input type = "file" name = "image">
                                                </div>
                                                <div class="profile_button_wrap">
                                                    <input class="profile_button" type="submit" name="SUB" value=" éditer ">
                                                </div>
                                            </form>
                                        </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php $view['slots']->stop('body') ?>