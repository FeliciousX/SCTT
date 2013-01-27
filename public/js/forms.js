function validatePassword() {
	var password = $('#password').val();
	var confirm_password = $('#confirm_password').val();
	var validate = false;

	if (password.length === confirm_password.length) {
		if (password != confirm_password) {
			$('div.control-group.confirm-password-group').addClass('error');
			$('span.help-inline.confirm-password').removeClass('hide');
		}
		else {
			$('div.control-group.confirm-password-group').removeClass('error');
			$('span.help-inline.confirm-password').addClass('hide');
			validate = true;
		};
	}
	else {
		$('div.control-group.confirm-password-group').addClass('error');
		$('span.help-inline.confirm-password').removeClass('hide');
	};

	return validate;
}

function validateAddAdminForm()
{
	var username = $('#username').val();
	var password = $('#password').val();
	var confirm_password = $('#confirm_password').val();
	var name = $('#name').val();
	var email = $('#email').val();

	var validate = true;

	if (username.length < 4) {
		$('div.control-group.username-group').addClass('error');
		$('span.help-inline.username').removeClass('hide');

		validate = false;
	}
	else {
		$('div.control-group.username-group').removeClass('error');
		$('span.help-inline.username').addClass('hide');
	};

	if (validatePassword() != true) { validate = false; };

	if (password.length < 5) {
		$('div.control-group.password-group').addClass('error');
		$('span.help-inline.password').removeClass('hide');
		validate = false;
	}
	else {
		$('div.control-group.password-group').removeClass('error');
		$('span.help-inline.password').addClass('hide');
	};

	return validate;
}