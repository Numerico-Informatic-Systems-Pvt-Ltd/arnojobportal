<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil utilisateur') ?>
<?php $view['slots']->start('body') ?>



<div class="container-fluid main_body_bg">
	<div class="container">
    	
        <div class="col-lg-12 col-sm-12">
        	<div class="profile_box">
            	<h2>Les derniers tests en ligne</h2>
                <div class="test_list_wrap">
            <?php
                foreach( $categories[0] as $parent_category){
            ?>
                    <div class="col-lg-3 col-sm-3">
                    	<h3 class="heading"><?php echo $parent_category['category']; ?></h3>
                        <ul>
            <?php
                    foreach( $categories[$parent_category['id']] as $index => $category){
            ?>
                            <li><a href="<?php echo $view['router']->generate('begin_test',  array('id' => $category['id'])) ?>"><?php echo $category['category']; ?></a></li>
            <?php
                    }
            ?>
                        </ul>
                    </div>
            <?php
                }
            ?>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>