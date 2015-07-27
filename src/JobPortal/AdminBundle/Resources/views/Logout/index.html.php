<?php $view->extend('::base.html.twig') ?>

<?php $view['slots']->set('title', 'JobPortalAdminBundle:Logout:index') ?>
<a href="<?php echo $view['router']->generate('hello', array('name' => 'Thomas')) ?>"> Greet Thomas! </a>


<?php $view['slots']->start('body') ?>
    <h1>Welcome to the Logout:index page</h1>
<?php $view['slots']->stop() ?>
