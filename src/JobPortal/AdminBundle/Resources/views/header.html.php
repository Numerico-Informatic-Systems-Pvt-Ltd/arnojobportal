<?php $view['slots']->start('header') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="shortcut icon"  type="image/x-icon" href="<?php echo $view['assets']->getUrl('JobPortal/images/favicon.ico') ?>"/>
                <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('JobPortal/css/my_boots.css') ?>" />
                <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('JobPortal/css/bootstrap-theme.css') ?>" />
                <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('JobPortal/css/style.css') ?>" />

                <style type="text/css">
                    table{border:1px solid #ccc; margin:0px; padding:0px;}
                    table tr{margin:0px; padding:0px;}
                    table tr th{text-align: left;}
                    table tr th, table tr td{border-left:1px solid #ccc;}
                    .no_border{border: none;}
                </style>


                <title><?php $view['slots']->output('title', 'Dasti') ?></title>
                </head>

                <body>

                    <div class="container-fluid">
                        <div class="col-lg-2 col-sm-2">
                            <div class="logo">
                                <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/logo.png') ?>" alt="Dasti" class="img-responsive" /></a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-10">
                            <div class="top_header_nav">
                                <ul>
                                    <li><a href="#">Besoni D'aide?</a></li>
                                    <li><a href="#">Acces Enterprise</a></li>
                                    <li><a href="<?php echo $view['router']->generate('_logout_index') ?>">Se Deconnecter</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
<?php $view['slots']->stop('header') ?>