// Iniciar a seção de pagamento
function iniciarSessao()
{
    $.ajax({
       url: Root+"Controllers/ControllerId.php",
        type: 'POST',
        dataType: 'json',
        success:function(data){
            PagSeguroDirectPayment.setSessionId(data.id);
        }
    });
}
iniciarSessao();
