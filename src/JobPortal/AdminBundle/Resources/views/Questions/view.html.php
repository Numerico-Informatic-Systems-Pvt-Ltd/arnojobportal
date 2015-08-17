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
                                    <option value="<?php echo $category->getId(); ?>" <?php if($category->getId() == $catg_id){ echo 'selected'; }?>><?php echo $category->getCategory(); ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                <?php if(!empty($questions)) { ?>
                <table class="table table-striped" cellpadding="0" cellspacing="0" >
                        <tr>
                            <th>Numéro De Série</th>
                            <th>question</th>                                                                        
                            <th>Type Standared</th>
                            <th>statut</th>
                            <th>voir les détails</th>
                            <th colspan="2">action</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($questions as $question) {
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $question['question']; ?></td>                                            
                                <td><?php 
                                if($question['standard_type'] == 1){
                                    $st_type = 'Very Easy';
                                    }else if($question['standard_type'] == 2){
                                        $st_type = 'Easy';
                                    }else if($question['standard_type'] == 3){
                                        $st_type = 'Medium';
                                    }else if($question['standard_type'] == 4){
                                        $st_type = 'Hard';
                                    }else if($question['standard_type'] == 5){
                                        $st_type = 'Very Hard';
                                    }
                                    echo $st_type;
                                ?></td>
                                <td>
                                    <?php
                                    if ($question['status'] == 1) {
                                        ?>
                                        <span style="margin-left:35px;" class="status_<?php echo $question['id']; ?>" onclick="return changeStatus(<?php echo $question['id']; ?>, 'questions');"> 
                                            <a href="" title="Active"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/active.gif') ?>" alt="Active" ></a>
                                        </span>
                                        <?php } else {
                                        ?>
                                        <span style="margin-left:35px;" class="status_<?php echo $question['id']; ?>" onclick="return changeStatus(<?php echo $question['id']; ?>, 'questions');">    
                                            <a href="" title="Inactive"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/inactive.png') ?>" alt="Inactive" ></a>
                                        </span>
                                    <?php } ?>                                    
                                </td>    
                                <td>
                                    <a href="<?php echo $view['router']->generate('_details_quesion_view').'?id='.$question['id'];?>"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/viewdetails.png') ?>" alt="View Details" class="img-responsive" width="22" style="float:left; margin-right:8px;"/></a>
                                </td>
                                <td><a href="<?php echo $view['router']->generate('_update_quesion_view', array('id' => $question['id'])); ?>" ><img src="<?php echo $view['assets']->getUrl('JobPortal/images/edit.png') ?>" alt="Edit" title="éditer" class="img-responsive" width="22" style="float:left; margin-right:8px;" /></a></td>
                                <td><a href="<?php echo $view['router']->generate('_delete_update', array('id' => $question['id'],'table'=>'questions','route'=>'_question_index')); ?>"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/delete.png') ?>" alt="Delete" class="img-responsive" width="22" style="float:left; margin-right:8px;" title="effacer"/></a></td>
                       </tr> 
                            <?php $i++;
                        }
                        ?>


                    </table>
                <?php } else{
                    echo 'pas question trouvé .';
                }?> 
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>