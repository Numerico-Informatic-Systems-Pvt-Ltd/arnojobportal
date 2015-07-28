<?php

/* JobPortalAdminBundle:Login:index.html.php */
class __TwigTemplate_ed7b29accbb67f592947213d4b6dbbb4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php //\$view->extend('::base.html.twig') ?>

<?php \$view['slots']->set('title', 'JobPortalAdminBundle:Login:index') ?>

<?php \$view['slots']->start('body') ?>
    <h1>Welcome to the Login:index page</h1>
<?php \$view['slots']->stop() ?>
";
    }

    public function getTemplateName()
    {
        return "JobPortalAdminBundle:Login:index.html.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
