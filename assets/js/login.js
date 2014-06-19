$('document').ready(function(){
	$('#form_login').submit(function(e){
	            e.preventDefault();
				var url = base_url + "index.php/login/validate_user/";
				var data = {
					'email' 	: $('#username').val(),
					'password'	: $('#password').val(),
				}
				$.post(
					url,
					data,
					function(r){
						if(r.result) {
							location.reload();
						} else {
							alert(r.message);
						}
					},
					'json'
				)
	        });
});