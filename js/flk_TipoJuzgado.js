// JavaScript Document
//Fecha creado: 27/05/2016
//Propósito: Modificación Tipo de Juzgado

$(document).ready(function()
{
  //Evento sobre el botón modifica un cliente en vista flk_TipoUsuario.php

  $('#btn_ModTipJuzg').click(function()
  {
    //Validación del formulario
    $('#flk_TipoJuzgadof').validate(
    {
      rules:
      {
            item:{required:true},
            descripcion:{required:true},          
      },
      invalidHandler:function()
      {
        alert("Se requiere información obligatoria para la modificación de un Tipo de Juzgado!");
        return false;
      },
      submitHandler:function()
      {
             var Id1            = $("#item").val();
             var descripcion1   = $("input[name='descripcion']").val();        

            var parametros      = {'txt_id':Id1, 'txt_descripcion':descripcion1};

           
        $.ajax({
                type: 'POST',
                url:  '../model/flk_TipoJuzgado.php',
                data: parametros,
                async : true,
                success: function(data){
                  $("#mensaje").slideDown();
                  $("#mensaje").html(data);
                }
              });
      }
    });
  });
});