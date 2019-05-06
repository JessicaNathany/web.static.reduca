function reload(){
    var reload = location.reload();
       
}
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('endereco').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
    //document.getElementById('ibge').value = ("");
}
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('endereco').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
        //document.getElementById('ibge').value = (conteudo.ibge);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}
function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('endereco').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";
            //document.getElementById('ibge').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}
;
/* global resposta */

function btn_excluir(id) {
    var resposta = confirm("Deseja excluir o registro?");

    if (resposta === true) {
        window.location.href = "?pagina=1&&id=" + id;

    }

}
/**
 * 
 * @returns {String}
 */
function getRoot() {
    var root = "http://" + document.location.hostname + "/sgvm/";
    return root;
}
/**
 * 
 * @returns {undefined}
 */
function showForm() {
    document.getElementById("formEspecie").style.display = "block";
    document.getElementById("tableEspecie").style.display = "none";
}
/**
 * 
 * @returns {undefined}
 */
function hideForm() {
    document.getElementById("cadastrarfunc").style.display = "none";
    document.getElementById("tabelafunc").style.display = "block";
}



/**
 * 
 */
function getCaptcha() {
    grecaptcha.ready(function () {
        grecaptcha.execute('6LcF-J0UAAAAAEO7HPxzPhO6Kj6XqLUyTSII-q7Y', {action: 'homepage'}).then(function (token) {
            const gRecaptchaResponse = document.querySelector('#g-recaptcha-response').value = token;

        });
    });

}
;
getCaptcha();


/**
 * AJAX formulario de usuarios
 * 
 */
$("#formUsers").on("submit", function (event) {
    //event.preventDefault();
    var dados = $(this).serialize();


    $.ajax({
        url: getRoot() + "users",
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            $('#retornoUsers').empty();
            if (response.retorno === 'erro') {
                getCaptcha();
                $.each(response.erros, function (key, value) {
                    $('#retornoUsers').append(value + '<br>');
                });
            } else {
                alert("Cadastrado com Sucesso!");
                $('#retornoUsers').append('Cadastrado com Sucesso!');
            }
        }
    });
});
