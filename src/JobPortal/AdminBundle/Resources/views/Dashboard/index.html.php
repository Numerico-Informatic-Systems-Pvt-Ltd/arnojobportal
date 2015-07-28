<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | admin Profil') ?>
<?php $view['slots']->start('body') ?>
<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">
            <div class="page_heading">admin Profil</div>
            <div class="table_pad">
                <?php //print_r($admin_data); ?>

                <table width = "100%" height = "300">
                    <tr>
                        <td width = "15%" class="no_border"><b>nom: </b></td><td class="no_border"><?php echo $admin_data[0]['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="no_border"><b>email: </b></td><td class="no_border"><?php echo $admin_data[0]['email']; ?></td>
                    </tr>
                    <tr>
                        <td class="no_border"><b>mot de passe: </b></td><td class="no_border">********</td>
                    </tr>
                    <tr>
                        <td class="no_border"><b>image: </b></td><td class="no_border"><?php
                            if (!empty($admin_data[0]['image'])) {
                                echo "<img src = '" . $admin_data[0]['image'] . "' height = '75' width = '55' >";
                            } else {
                                echo "<img src = '" . $view['assets']->getUrl('JobPortal/images/admin.png') . "' height = '75' width = '55' >";
                            }
                            ?></td>
                    </tr>
                    <tr>
                        <td class="no_border"></td><td align = "right" class="no_border"><a href = "<?php echo $view['router']->generate('_admin_profile_update') ?>">Mise À Jour</a></td>
                    </tr>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>