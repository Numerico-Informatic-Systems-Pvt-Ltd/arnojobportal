<?php $view['slots']->start('developer_js') ?>
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
<?php $view['slots']->stop('developer_js') ?>