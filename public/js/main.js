/**
 * 
 * @returns {String}
 */
function getRoot(){
    var root="http://"+document.location.hostname+"/MVC_php/";
    return root;
}


/**
 * 
 */
function getCaptcha(){
   grecaptcha.ready(function() {
      grecaptcha.execute('6LcF-J0UAAAAAEO7HPxzPhO6Kj6XqLUyTSII-q7Y', {action: 'homepage'}).then(function(token) {
         const gRecaptchaResponse=document.querySelector('#g-recaptcha-response').value=token;

      });
  });

};
getCaptcha();


/**
 * AJAX formulario de usuarios
 * 
 */
$("#formUsers").on("submit",function(event){
    //event.preventDefault();
    var dados=$(this).serialize();
    
    
    $.ajax({
        url: getRoot()+"users",
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function(response){
            $('#retornoUsers').empty();
            if(response.retorno === 'erro'){
                getCaptcha();
                $.each(response.erros,function(key,value){
                    $('#retornoUsers').append(value+'<br>');
                });
            }else{
                alert("Cadastrado com Sucesso!");
                $('#retornoUsers').append('Cadastrado com Sucesso!');
            }
        }
    });
});
