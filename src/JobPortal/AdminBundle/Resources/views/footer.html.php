
<?php $view['slots']->start('footer') ?>
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
<?php $view['slots']->stop('footer') ?>