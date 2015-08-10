<?php $view['slots']->start('developer_js') ?>
<script type = "text/javascript">
    
function CheckForm(){     
     var name = $("#name").val();     
     var email = $("#email").val();
     var phone = $("#phone").val();
     var category = $("#category_id").val();    
     var terms_condition = document.getElementById("terms_condition").checked;
     var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
     var emailvalid = emailReg.test(email); //returns true & false
     var mobileReg = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
     var mobilevalid = mobileReg.test(phone);     
     if(name != '' && email != '' && phone != '' && category !=''){
        if(emailvalid){
            if(mobilevalid){
                if(terms_condition){
                return true;
                }else{
                    alert('sil vous plaît vérifier termes accord');
                    return false;
                }
            }else{
                 alert('invalide pas de téléphone');
                 return false;
            }
            
        }else{
            alert('email invalide');
            return false;
        }
         
     }else{
          alert('Tous les champs sont obligatoires');
          return false;
     }
 }

</script>


<?php $view['slots']->stop('developer_js') ?>