<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Mot de passe oublié') ?>
<?php $view['slots']->start('body') ?>

<div class="container-fluid main_body_bg">
    <div class="container">
        <div class="col-lg-12 col-sm-12">
            <div class="regis_box login_wrap">
                <h1>Indiquez votre e-mail enregistrée</h1>
                <?php
                if (!empty($_GET['msg_error'])) {
                    echo "<span style = 'color: red;'>" . $_GET['msg_error'] . "</span>";
                }
                ?>
                <form action = "<?php echo $view['router']->generate('employer_forget_password') ?>" method = "POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="inscrivez-vous Email" style="height:45px;">
                    </div>
                    <div class="regis_button_wrap">
                        <input class="regis_button" type="submit" value="confirmer">
                    </div>

                </form>


                <div class="clearfix"></div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php $view['slots']->stop('body') ?>


