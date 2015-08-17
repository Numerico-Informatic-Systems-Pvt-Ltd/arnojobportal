<?php $view['slots']->start('developer_js') ?>
<script type = "text/javascript">



    function checkPassword() {
        var new_pass = $("#password").val();
        var re_pass = $("#cnf_password").val();
        if (new_pass != re_pass) {
            $("#password_error").html("Mot de passe ne matchs");
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

    function checkEmployerPassword() {
        var new_pass = $("#password").val();
        var re_pass = $("#cnf_password").val();
        if (new_pass != re_pass) {
            $("#password_error").html("Mot de passe ne matchs");
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

    function checkUserName() {
        var email_id = $("#candidate_email").val();
        var password = $("#password").val();
        var emil_chek = $("#emil_chek").val();
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var emailvalid = emailReg.test(email_id); //returns true & false       
        if (emailvalid) {
            return true;
        } else {
            $("#invalid_cred").html("");
            $("#emil_chek").html('<p style ="color:red;">Sil vous plaît fournir correcte email.</p>');
            return false;
        }
    }

    function CheckEmployerLogin() {
        var email_id = $("#employer_email").val();
        var password = $("#employer_password").val();
        var emil_chek = $("#emil_chek").val();
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var emailvalid = emailReg.test(email_id); //returns true & false   
        if (email_id != '' && password != '') {
            if (emailvalid) {
                return true;
            } else {
                $("#invalid_cred").html("");
                $("#emil_chek").html('<p style ="color:red;">Sil vous plaît fournir correcte email.</p>');
                return false;
            }
        } else {
            alert('Sil vous plaît fournir des informations didentification connexion');
            return false;
        }
    }

    function checkEmail(email) {
        $.ajax({
            url: "<?php echo $view['router']->generate('ajax_user_login_check'); ?>",
            type: "POST",
            data: {
                email_id: email,
            },
            success: function (data) {
                //alert(data);
                if ($.trim(data) != 'success') {
                    $("#email_check").html("");
                    $("#email_check").html('<p style="color:red">Email déjà enregistré avec nous.</p>');
                    $("#email_error").val('error_email_id');
                    return false;

                }
                else {

                    $("#email_check").html("");
                    $("#email_check").html('');
                    $("#email_error").val('');
                    return true;
                }
            }
        });


    }


    function CheckForm() {
        var email_checkq = $("#email_error").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var category = $("#category_id").val();
        var terms_condition = document.getElementById("terms_condition").checked;
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var emailvalid = emailReg.test(email); //returns true & false
        var mobileReg = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        var mobilevalid = mobileReg.test(phone);
        if (name != '' && email != '' && phone != '' && category != '') {
            if (emailvalid) {

                if (email_checkq != 'error_email_id')
                {
                    if (mobilevalid) {
                        if (terms_condition) {
                            return true;
                        } else {
                            alert('sil vous plaît vérifier termes accord');
                            return false;
                        }
                    } else {
                        alert('invalide pas de téléphone');
                        return false;
                    }

                } else {
                    $("#email_check").html('');
                    $("#email_check").html('<p style="color:red">Email déjà enregistré avec nous.</p>');
                    return false;
                }

            } else {
                alert('email invalide');
                return false;
            }

        } else {
            alert('Tous les champs sont obligatoires');
            return false;
        }
    }




    function employerRegisterValidation() {
        var email_checkq = $("#email_error").val();
        var company_name = $('#company_name').val();
        var address = $('#address').val();
        var pin_code = $('#pin_code').val();
        var city = $('#city').val();
        var country = $('#country').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var terms_condition = document.getElementById("terms_condition").checked;
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var emailvalid = emailReg.test(email); //returns true & false
        var mobileReg = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        var mobilevalid = mobileReg.test(phone);

        if (company_name != '' && address != '' && pin_code != '' && city != '' && country != '' && name != '' && email != '' && phone != '') {
            if (emailvalid) {
                if (email_checkq != 'error_email_id')
                {
                    if (mobilevalid) {
                        if (terms_condition) {
                            return true;
                        } else {
                            alert('sil vous plaît vérifier termes accord');
                            return false;
                        }
                    } else {
                        alert('invalide pas de téléphone');
                        return false;
                    }

                } else {
                    $("#email_check").html('');
                    $("#email_check").html('<p style="color:red">Email déjà enregistré avec nous.</p>');
                    return false;
                }
            } else {
                alert('email invalide');
                return false;
            }
        } else {
            alert('Tous les champs sont obligatoires');
            return false;
        }

    }


    function checkEmployerEmail(email) {
        //alert(email);
        $.ajax({
            url: "<?php echo $view['router']->generate('ajax_employer_login_check'); ?>",
            type: "POST",
            data: {
                email_id: email,
            },
            success: function (data) {
                //alert(data);
                if ($.trim(data) != 'success') {
                    $("#email_check").html("");
                    $("#email_check").html('<p style="color:red">Email déjà enregistré avec nous.</p>');
                    $("#email_error").val('error_email_id');
                    return false;

                }
                else {

                    $("#email_check").html("");
                    $("#email_check").html('');
                    $("#email_error").val('');
                    return true;
                }
            }
        });
    }
</script>


<?php $view['slots']->stop('developer_js') ?>
