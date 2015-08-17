<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <link rel="shortcut icon"  type="image/x-icon" href="<?php echo $view['assets']->getUrl('JobPortal/images/favicon.ico') ?>"/>
                <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('JobPortal/css/my_boots.css') ?>" type="text/css" media="all" />
                <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('JobPortal/css/bootstrap-theme.css') ?>" type="text/css" media="all" />
                <link rel="stylesheet" href="<?php echo $view['assets']->getUrl('JobPortal/css/style.css') ?>" type="text/css" media="all" />



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
                                    <li><a href="#">Se Deconnecter</a></li>
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
                        <div class="container">
                            <div class="col-lg-12 col-sm-12">
                                <div class="regis_box login_wrap">
                                    <h1>changez votre mot de passe</h1>
                                    <?php
                                        if(isset($_GET['msg_success'])){
                                            echo "<span style = 'color: red;' >".$_GET['msg_success']."</span>";
                                        }
                                    ?>
                                    <span style = 'color: red;' id ="password_error" ></span>
                                    <form action = "<?php echo $view['router']->generate('_change_forget_password') ?>" method = "POST" onsubmit = "return adminChangePassword_funCheckPassword();">
                                        
                                        <div class="form-group">
                                            <input type="password" name="password" id = "new_pass" class="form-control" placeholder="tapez le nouveau mot de passe" style="height:45px;">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="repassword" id = "re_pass" class="form-control" placeholder="retaper le mot de passe" style="height:45px;">
                                        </div>
                                        <input type = "hidden" name = "hid_id" value = "<?php echo $_GET['slug']; ?>" >
                                        <div class="regis_button_wrap">
                                            <input class="regis_button" type="submit" value="Se Connecter">
                                        </div>

                                    </form>


                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('JobPortal/js/jquery.min.js') ?>"></script>
                    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('JobPortal/js/bootstrap.js') ?>"></script>
                    <script type = "text/javascript">
                        function adminChangePassword_funCheckPassword() {
                            var new_pass = $("#new_pass").val();
                            var re_pass = $("#re_pass").val();
                            if (new_pass != re_pass) {
                                $("#password_error").html("Mot de passe ne correspond");
                                return false;
                            } else {
                                var passReg = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
                                var passwordvalid = passReg.test(new_pass);
                                if (passwordvalid) {
                                    $("#password_error").html("");
                                    return true;
                                } else {
                                    $("#password_error").html("Le mot de passe de 8 caractères minimum. Mot de passe doit contenir un caractère spécial , une lettre de bouchons , une petite lettre et un chiffre.");
                                    return false;
                                }
                            }
                        }
                    </script>
                </body>
                </html>
