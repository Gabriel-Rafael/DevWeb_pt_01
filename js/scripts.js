$(function(){
    $('[name=preco_max],[name=preco_min]').maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

    $(":input").bind('keyup change input', function(){
        sendRequest();
    });

    function sendRequest(){
        $('form').ajaxSubmit({
            data:{'nome_imovel':$('input[name=texto-busca]').val()},
            success:function(data){
                $('.lista-imoveis .container').html(data);
            }
        })
    }

})