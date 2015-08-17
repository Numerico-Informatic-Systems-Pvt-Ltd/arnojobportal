<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Voir Catégories') ?>
<?php $view['slots']->start('body') ?>

<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">                                  
            <div class="page_heading">Voir Catégories</div>
            <div class="table_pad">
                <?php if (!empty($categories)) { ?>
                    <table class="table table-striped" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Numéro De Série</th>
                            <th>Catégories Nom</th>
                            <th>description</th>                                            
                            <th>statut</th>
                            <th colspan="2">action</th>
                        </tr>

                        <?php
                        $i = 1;
                        foreach ($categories as $categorie) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $categorie->getCategory(); ?></td>                                            
                                <td><?php echo strip_tags($categorie->getDescription()); ?></td>
                                <td>
                                    <?php
                                    if ($categorie->getStatus() == 1) {
                                        ?>
                                        <span style="margin-left:35px;" class="status_<?php echo $categorie->getId(); ?>" onclick="return changeStatus(<?php echo $categorie->getId(); ?>, 'categories');"> 
                                            <a href="" title="Active"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/active.gif') ?>" alt="Active" ></a>
                                        </span>
                                        <?php } else {
                                        ?>
                                        <span style="margin-left:35px;" class="status_<?php echo $categorie->getId(); ?>" onclick="return changeStatus(<?php echo $categorie->getId(); ?>, 'categories');">    
                                            <a href="" title="Inactive"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/inactive.png') ?>" alt="Inactive" ></a>
                                        </span>
                                    <?php } ?>                                    
                                </td>                               
                                <td><a href="<?php echo $view['router']->generate('_category_edit', array('id' => $categorie->getId())); ?>" ><img src="<?php echo $view['assets']->getUrl('JobPortal/images/edit.png') ?>" alt="Edit" title="éditer" class="img-responsive" width="22" style="float:left; margin-right:8px;" /></a></td>
                                <td><a href="<?php echo $view['router']->generate('_delete_update', array('id' => $categorie->getId(),'table'=>'categories','route'=>'_category_index')); ?>"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/delete.png') ?>" alt="Delete" class="img-responsive" width="22" style="float:left; margin-right:8px;" title="effacer"/></a></td>
                            </tr> 
                            <?php $i++;
                        }
                        ?>


                    </table>
    <?php
} else {
    echo '<p>Non Catégorie Trouvé</p>';
}
?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>