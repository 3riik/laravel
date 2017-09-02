$(function(){

	$('#register').on('submit',function(e){
		$.ajaxSetup({
			header:$('meta[name="_token"]').attr('content')
		})
		e.preventDefault(e);

			$.ajax({

				type:"POST",
				url:'register',
				data:$(this).serialize(),
				dataType: 'json',
				success: function(data){
					alert(""+data.responseText);
					window.location.replace("compare");
					
				},
				error: function(data){		
					var errors = data.responseJSON;	
					$("#ajaxResponse").removeClass("hidden");
					$("#ajaxResponse ul").empty();
					
					$.each( errors, function( key, value ) {
					    	$("#ajaxResponse ul").append("<li>" +value+ "</li>");
					    });		
					
					
				}

			})

	});

});

