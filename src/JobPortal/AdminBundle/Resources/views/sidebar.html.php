<?php $view['slots']->start('sidebar') ?>
<div class="container-fluid main_body_bg">
                        <div class="col-lg-3 col-sm-3">
                            <ul id="accordion" class="accordion">
                                <li>
                                    <div class="link">profil<span class="caret pull-right"></span></div>
                                    <ul class="submenu">
                                        <li><a href="<?php echo $view['router']->generate('_dahboard_index') ?>">gérer le profil</a></li>
                                        <li><a href="<?php echo $view['router']->generate('_admin_changePassword') ?>">Changer Le Mot De Passe</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="link">Coding<span class="caret pull-right"></span></div>
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

    <?php $view['slots']->stop('sidebar') ?>