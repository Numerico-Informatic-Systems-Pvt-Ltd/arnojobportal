<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Changer mot de passe Admin') ?>
<?php $view['slots']->start('body') ?>

                        <div class="col-lg-9 col-sm-9">
                            <div class="dashboard_bg">
                                <div class="page_wrap">
                                    <div class="page_heading">Changer Le Mot De Passe</div>
                                        <div class="table_pad">
                                            <form action = "<?php echo $view['router']->generate('_admin_changePassword') ?>" method = "POST"  onsubmit = "return adminChangePassword_funCheckPassword();">
                                                <div class="form-group">
                                                    <label><span id = "password_error" style = "color: red;"></span></label>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ancien Mot De Passe:</label>
                                                    <input type="password" class="form-control size" id="" name="old_pass"  />
                                                    <input type="hidden" name="hid_id" value = "<?php echo $admin_data[0]['id']; ?>" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Nouveau Mot De Passe:</label>
                                                    <input type="password" class="form-control size" id="new_pass" name="pass"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>retaper Le Mot De Passe:</label>
                                                    <input type="password" class="form-control size" id="re_pass" name="re_pass" />
                                                </div>
                                                <div class="profile_button_wrap">
                                                    <input class="profile_button" type="submit" name="SUB" value=" changement ">
                                                </div>
                                            </form>
                                        </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
<?php $view['slots']->stop('body') ?>