$(function(){
	$("#login-form").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			url : $(this).prop('action'),
			type : "POST",
			dataType : "JSON",
			data : $(this).serialize(),
			beforeSend : function(){
				$("#btn-submit").html ( 'Processing...' ).removeClass("btn-primary").addClass("btn-warning").prop("disabled", true);
			},
			success : function(data){
				if ( data.type == "done" ){
					window.location.href = base_url;
				}
				else{
					Swal.fire ( "Failed!", data.msg, "error");
					$("#btn-submit").html ( 'LOGIN' ).removeClass("btn-warning").addClass("btn-primary").prop("disabled", false);
				}				
			},
			error : function(){
				Swal.fire ( "Failed!", "Error Occurred, Please refresh your browser.", "error");
			},
			complete : function(){
				$("#btn-submit").html ( 'LOGIN' ).removeClass("btn-warning").addClass("btn-primary").prop("disabled", false);
			}
		});
	});
});