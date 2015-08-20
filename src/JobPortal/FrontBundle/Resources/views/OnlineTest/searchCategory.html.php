<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil utilisateur') ?>
<?php $view['slots']->start('body') ?>



<div class="container-fluid main_body_bg">
	<div class="container">
    	
        <div class="col-lg-12 col-sm-12">
        	<div class="profile_box">
            	<h2>Les derniers tests en ligne</h2>
                <div class="test_list_wrap">
            
                    <div class="col-lg-3 col-sm-3">
                    	<h3 class="heading">Search Results</h3>
                        <ul>
            <?php
                    foreach( $categories as $index => $category){
                        if($category['parent_id'] != 0){
            ?>
                            <li><a href="<?php echo $view['router']->generate('begin_test',  array('id' => $category['id'])) ?>"><?php echo $category['category']; ?></a></li>
            <?php
                        }
                    }
                    
            ?>
                        </ul>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>