jQuery(function($){
$().ready(function() {

	// validate signup form on keyup and submit
	$("#UserAddForm").validate({
		rules: {
			UserUsername: {
				required: true,
				minlength: 4
			},
			UserPassword: {
				required: true,
				minlength: 6
			},
			UserConfirmPassword: {
				required: true,
				minlength: 6,
				equalTo: "#UserPassword"
			},
			UserEmail: {
				required: true,
				email: true
			},
                        UserConfirmEmail: {
				required: true,
				email: true,
                                equalTo: "#UserEmail"
			}

		},
		messages: {
			UserUsername: {
				required: "Por favor ingrese su Usuario",
				minlength: "Su nombre de usuario debe estar formado por un mínimo de 4 caracteres"
			},
			UserPassword: {
				required: "Por Favor ingrese una contraseña",
				minlength: "Su contraseña debe tener al menos 6 caracteres y contener Mayusculas, Minusculas y Numeros"
			},
			UserConfirmPassword: {
				required: "Por Favor ingrese una contraseña",
				minlength: "Su contraseña debe tener al menos 6 caracteres y contener Mayusculas, Minusculas y Numeros",
				equalTo: "La contraseña ingresada no coincide con la anterior"
			},
                        UserEmail: {
				required: "Por Favor ingrese una dirección de Correo Valida"
			},
			UserConfirmEmail: {
				required: "Por Favor ingrese una contraseña",
				equalTo: "El Correo ingresado no coincide con el anterior"
			}
		}
	});

});
});