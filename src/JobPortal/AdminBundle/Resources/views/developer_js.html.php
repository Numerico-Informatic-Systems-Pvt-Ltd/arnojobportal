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
<script>
function changeStatus(id,table){ 
    //alert(id);
    //return false;
        $.ajax({
            url: "<?php echo $view['router']->generate('_status_update'); ?>",
            type: "POST",
            data: {
                dataId: id,
                table:table
            },
            success: function (response) {        
                if(response == 1){
                    $('span.status_'+id).html('<a href="" title="Inactive"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/inactive.png') ?>"></a>');
                }
                if(response == 2){
                    $('span.status_'+id).html('<a href="" title="Active"><img src="<?php echo $view['assets']->getUrl('JobPortal/images/active.gif');?>"></a>');
                }
            }
        });
        return false;
        }
</script>

<script type="text/javascript">
    
 function addMoreAnswer(){     
     $('#more_ans').append("<div style='display: block;'><div class='form-group' style='width:400px; float: left;'><label >répondre :</label><br><textarea  class='span6  m-wrap' name='answer[]' rows='3' style='width: 90%;'></textarea></div><div style='float: left; margin:0px 10px; width: 250px;' class='form-group'><label>le statut de réponse :</label><div style='clear: both;margin-left: 55px;'><input type='radio' name='answer_status[]' value='1'/><input type='hidden' name='answer_status[]' value='0'/></div></div><div style='float: left; margin:0px 10px;' class='form-group'><label>ajouter plus de réponse :</label><div style='clear: both;margin-left: 55px;'><a href='' onclick='return remove_service(this);'><img src='<?php echo $view['assets']->getUrl('JobPortal/images/remove.png') ?>' width='30px'/></a></div></div><div class='clearfix'></div></div>");
     return false;
 }
 function remove_service(ele){                
                $(ele).parent().parent().parent().remove();
                return false;
            };
 
 
 
 function viewQuestion(category_id){     
     window.location.href = '<?php echo $view['router']->generate('_ajax_quesion_view'); ?>?category_id='+category_id;
 }
</script>

<?php $view['slots']->stop('developer_js') ?>