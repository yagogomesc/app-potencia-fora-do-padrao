//Apresenta tooltip abaixo dos valores de potência
$(document).ready(function(){
    $("[rel=tooltip]").tooltip({ placement: 'bottom'});
});

//Ao clicar no botão de tentativa de contato, irá preencher o campo do formulario contato_id com o id do mesmo
$(document).on("click", "#tentativaBotao", function(){
  var id = $(this).data('id');
  
  $("#contato_id").attr("value", id);
});
//Ao clicar no botão de regitros, retorna os registros de contato com o cliente especifico
$(document).on("click", "#registrosBotao", function(){
    limparModal();

    //recebe id do usuario
    var id = $(this).data('id');
  
    //Recebe um Json com os registros de contato daquele cliente
    registros = getRegistros(id);
    
});

//Limpa os dados contidos no modal para que sejam novamente preenchidos ao ser chamado para ver dados de registro de outro cliente
function limparModal(){
$("#registrosContatos").html("");
}

//Utiliza jquery para recuperar dados de registro por JSON via api
function getRegistros(id){
    $.getJSON('/api/registros/'+id, function(data){
        //For each do jquery
        $.each(data, function(i, value){
            dataFormatada = formatDataHora(value['data_contato']);
            tipoContato = getTipoContato(value['tipo_contato']);

            //Recebe o html no formato a ser inserido no modal
            registro = "<tr>" +
            "<td>" + tipoContato + "</td>" +
            "<td>" + dataFormatada + "</td>" +
            "</tr>";
            //Utiliza o append para adicionar o dado no modal
            $('#registrosContatos').append(registro);
        });
    });
}
//Formata data e hora para padrão data/mes/ano hora:minuto
function formatDataHora(dataHoraContato){
            //Utiliza o split para dividir o dado de data e hora em 2 partes
            split = dataHoraContato.split(" ");
            //Recebe a hora
            hora = split[1];
            //Recebe a data a dividindo por cada -
            data = split[0].split('-');
            //Define o novo formato da data e hora a ser exibido
            novaData = data[2] + "/" + data[1]+"/"+data[0]+' '+ hora;
            //Retorna nova data e hora
            return novaData;
}
//Retorna o tipo de contato realizado
function getTipoContato(idTipo){
    switch(idTipo){
        case 1:
        tipo = 'Telefone';
        break;
        case 2:
        tipo = 'Whatsapp'
        break;
        case 3:
        tipo = 'Email';
        break;
        case 4:
        tipo = 'Telefone e Whatsapp';
        break;
        case 5:
        tipo = 'Telefone e Email';
        break;
        case 6:
        tipo = 'Whatsapp e Email';
        break;
        case 7:
        tipo = 'Telefone, Whatsapp e Email';
        break;
    }

    return tipo;
}