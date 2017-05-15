$(document).ready(function() {

	$("#datatable").DataTable();

	$('.btnselect').click(function(event) {
		var id = $(this).attr('id');
		var puesto;

		switch (id){
			case "btntodos":
				puesto = "";
				break;
			case "btn1":
				puesto = "oficialobras";
				break;
			case "btn2":
				puesto = "oficialjardines";
				break;
			case "btn3":
				puesto = "peonobras";
				break;
			case "btn4":
				puesto = "peonjardines";
				break;			
			case "btn5":
				puesto = "conserje";
				break;
			case "btn6":
				puesto = "auxiliar";
				break;
		}	

		$('#datatable_filter > label > input').focus().val(puesto).keyup().val('');
	});

});

