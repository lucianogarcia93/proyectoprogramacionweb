
var inicio = function() {

	$(".eliminar").click(function(e){
		e.preventDefault();
		var id = $(this).attr('data-id'); 
		$(this).parentsUntil(".producto").remove(); 
		$.post("eliminar.php", { 
			Id : id
		}, function(a){
		    //location.href="agregar.php";
			 if (a=='0') {
			 	location.href="agregar.php";
			}
		});
		});
	}

$(document).on('ready', inicio);




