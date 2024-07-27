/*
 * Analista: Djalma Aguiar Rodrigues
 * 21/12/2014
 */
$(document).ready(function(){
	
	// Parâmetros do calendário datePicker.
	$(function() {
		$("#data").datepicker({
			dateFormat: 'dd/mm/yy',
			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
			dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sb','Dom'],
			monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
			monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
			nextText: 'Prximo',
			prevText: 'Anterior',
			minDate: 0, // Oculta dias anteriores
			beforeShowDay: $.datepicker.noWeekends // Oculta sabado ou domingo.
		});
	});

	// Exibe campos de acordo com o tipo de marcação
	$('#marcacao').change(function(){
			//Convênio
			if( $(this).val() === '1' ){
				
				$('#div_convenio').show();
				$('#div_particular').hide();
				
			// Particular
			} else if( $(this).val()=== '2' ){ 
				
				$('#div_convenio').hide();
				$('#div_particular').show();
	
			// Nenhum	
			}else {
				$('#div_convenio').hide();
				$('#div_particular').hide();
			}
		});
	
	// Formulário submetido
	$( "#frmMarcacao" ).submit(function( e ) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			dataType: 'html',
			data: $(this).serialize(),
			url: 'bin/marcacaoAction.php',
			success: function( data ){
				// Formulário submetido, limpe os campos.
				if( data === "1" ){
					$('#resposta').show();
					$('#resposta').html( 'Pré agendamento efetuado com sucesso.' );
					$("#frmMarcacao")[0].reset();
				} else {
					$('#resposta').html( data );
					$('#resposta').show();
				}
			}
		});
	});
});