<?php $view['slots']->start('menu') ?>

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
                                                <li><a href="<?php echo $view['router']->generate('fetch_category') ?>">Categorie</a></li>
                                                
                                                <li><a href="<?php echo $view['router']->generate('my_skills') ?>">Mes Competences</a></li>
                                                
                                                <li><a href="#">Mon Compte</a></li>
                                            </ul>
                                        </div><!-- /.navbar-collapse -->
                                    </div><!-- /.container-fluid -->
                                </nav>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <form action="<?php echo $view['router']->generate('search_exam') ?>" method="GET">
                                    <input type="submit" value="" style="width: 25px; height: 34px; background: none; border: none; position: absolute; top: 7px; left: 16px;">
                                    <input type="text" class="form-control search_ico" placeholder="Rechercher un test" name = "search">
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
<?php $view['slots']->stop('menu') ?>