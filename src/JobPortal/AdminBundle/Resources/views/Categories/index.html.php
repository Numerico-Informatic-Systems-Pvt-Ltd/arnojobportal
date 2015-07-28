<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="shortcut icon"  type="image/x-icon" href="<?php echo $view['assets']->getUrl('JobPortal/images/favicon.ico') ?>"/>
                <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('JobPortal/css/my_boots.css') ?>" />
                <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('JobPortal/css/bootstrap-theme.css') ?>" />
                <link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('JobPortal/css/style.css') ?>" />
                <script src="//cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
                <style type="text/css">
                    table{border:1px solid #ccc; margin:0px; padding:0px;}
                    table tr{margin:0px; padding:0px;}
                    table tr th{text-align: left;}
                    table tr th, table tr td{border-left:1px solid #ccc;}
                </style>


                <title>Dasti</title>
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

                    <div class="container-fluid main_menu_bg">
                        <div class="container">
                            <div class="col-lg-8 col-sm-8">
                                <nav class="navbar navbar-default">
                                    <div class="container-fluid less_pad">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse less_pad" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav">
                                                <li><a href="#">Home</a></li>
                                                <li><a href="#">Categorie</a></li>
                                                <li><a href="#">Mes Competences</a></li>
                                                <li><a href="#">Mon Compte</a></li>
                                            </ul>
                                        </div><!-- /.navbar-collapse -->
                                    </div><!-- /.container-fluid -->
                                </nav>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <input type="text" class="form-control search_ico" placeholder="Rechercher un test">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                    <div class="container-fluid main_body_bg">
                        <div class="col-lg-3 col-sm-3">
                            <ul id="accordion" class="accordion">
                                <li>
                                    <div class="link">Web Design<span class="caret pull-right"></span></div>
                                    <ul class="submenu">
                                        <li><a href="#">Photoshop</a></li>
                                        <li><a href="#">HTML</a></li>
                                        <li><a href="#">CSS</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link">gérer Catégorie<span class="caret pull-right"></span></div>
                                    <ul class="submenu">
                                        <li><a href="#">Javascript</a></li>
                                        <li><a href="#">jQuery</a></li>
                                        <li><a href="#">Ruby</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link">Devices<span class="caret pull-right"></span></div>
                                    <ul class="submenu">
                                        <li><a href="#">Tablet</a></li>
                                        <li><a href="#">Mobile</a></li>
                                        <li><a href="#">Desktop</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link">Global<span class="caret pull-right"></span></div>
                                    <ul class="submenu">
                                        <li><a href="#">Google</a></li>
                                        <li><a href="#">Bing</a></li>
                                        <li><a href="#">Yahoo</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-9 col-sm-9">
                            <div class="dashboard_bg">
                                <div class="page_wrap">                                  
                                    <div class="page_heading">Voir Catégories</div>
                                    <div class="table_pad">
                                        <table class="table table-striped" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Categories Name</th>
                                            <th>Description</th>                                            
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                        
                                            <?php 
                                            if(!empty($categories)){
                                                $i=1;
                                            foreach ($categories as $categorie){ ?>
                                            <tr>
                                                <td ><?php echo $i;?></td>
                                            <td><?php echo $categorie->getCategory();?></td>                                            
                                            <td><?php echo strip_tags($categorie->getDescription());?></td>
                                            <td><a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/active.gif') ?>" alt="Active" class="img-responsive" /></a></td>
                                            <td>
                                                <a href="<?php echo $view['router']->generate('_category_edit').'/'.$categorie->getId(); ?>"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/edit.png') ?>" alt="Edite" class="img-responsive" width="22" style="float:left; margin-right:8px;" /></a>
                                                <a href="#"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/delete.png') ?>" alt="Delete" class="img-responsive" width="22" style="float:left; margin-right:8px;" /></a>
                                            </td>
                                               </tr> 
                                           <?php $i++;  } 
                                            
                                            }
                                            
                                            ?>
                                            
                                        
                                    </table>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('JobPortal/js/jquery.min.js') ?>"></script>
                    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('JobPortal/js/bootstrap.js') ?>"></script>



                    <script>
                        $(function () {
                            var Accordion = function (el, multiple) {
                                this.el = el || {};
                                this.multiple = multiple || false;

                                // Variables privadas
                                var links = this.el.find('.link');
                                // Evento
                                links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
                            }

                            Accordion.prototype.dropdown = function (e) {
                                var $el = e.data.el;
                                $this = $(this),
                                        $next = $this.next();

                                $next.slideToggle();
                                $this.parent().toggleClass('open');

                                if (!e.data.multiple) {
                                    $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
                                }
                                ;
                            }

                            var accordion = new Accordion($('#accordion'), false);
                        });
                    </script>



                </body>
                </html>
