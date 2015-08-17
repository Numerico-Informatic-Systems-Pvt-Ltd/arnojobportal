<?php //echo'<pre>'; print_r($answers); die;?>
<?php $view->extend('JobPortalAdminBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Voir questions') ?>
<?php $view['slots']->start('body') ?>

<div class="col-lg-9 col-sm-9">
    <div class="dashboard_bg">
        <div class="page_wrap">                                  
            <div class="page_heading">Voir questions</div>
            <div class="table_pad">
                <?php if(!empty($answers)) { ?>
                <p style="font-weight: bold;"><span style="font-weight: bold;">Question :</span> <?php echo strip_tags($answers[0]['question']);?></p>
                <?php 
                $i =1 ;
                foreach ($answers as $answer ) {?>
                <p><?php echo $i.' . '.$answer['answer'];?></p>
                
                <?php 
                if($answer['answer_status'] == 1){ ?>
                <p><span style="font-weight: bold;">Correct Answer :</span> Option <?php echo $i; ?>.. is <?php echo $answer['answer'];?></p>
               <?php  }
                
                $i++;} ?>
                <p> <span style="font-weight: bold;">Correct Marks :</span> <?php echo $answers[0]['marks_positive'];?></p>
                <p> <span style="font-weight: bold;">Wrong Marks : </span><?php echo $answers[0]['marks_negative'];?></p>
                <?php } ?>
                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>



<?php $view['slots']->stop('body') ?>