
<?php include_once 'header.html.php'; ?>
<?php include_once 'footer.html.php'; ?>
<?php include_once 'menu.html.php'; ?>
<?php include_once 'sidebar.html.php'; ?>
<?php include_once 'developer_js.html.php'; ?>
<?php if ($view['slots']->has('header'))  ?>
<?php $view['slots']->output('header') ?>
<?php if ($view['slots']->has('menu'))  ?>
<?php $view['slots']->output('menu') ?>
<?php if ($view['slots']->has('sidebar'))  ?>
<?php $view['slots']->output('sidebar') ?>
<?php if ($view['slots']->has('body'))  ?>
<?php $view['slots']->output('body') ?>

<?php if ($view['slots']->has('footer'))  ?>
<?php $view['slots']->output('footer') ?>
<?php if ($view['slots']->has('developer_js'))  ?>
<?php $view['slots']->output('developer_js') ?>