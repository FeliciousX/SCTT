function clearForm(form) {

    // iterate over all of the inputs for the form

    // element that was passed in

    $(':input', form).each(function() {

      var type = this.type;

      var tag = this.tagName.toLowerCase(); // normalize case

      // it's ok to reset the value attr of text inputs,

      // password inputs, and textareas

      if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'email')

        this.value = "";

      // checkboxes and radios need to have their checked state cleared

      // but should *not* have their 'value' changed

      else if (type == 'checkbox' || type == 'radio')

        this.checked = false;

      // select elements need to have their 'selectedIndex' property set to -1

      // (this works for both single and multiple select elements)

      else if (tag == 'select')

        this.selectedIndex = -1;

    });

  };

function validatePassword() {
	var password = $('#password').val();
	var confirm_password = $('#confirm_password').val();
	var validate = false;

	if (password.length === confirm_password.length) {
		if (password != confirm_password) {
			$('div.control-group.confirm-password-group').addClass('error');
			$('span.help-inline.confirm-password').removeClass('hide');
			validate = false;
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
		validate = false;
	};

	if (password.length < 5) {
		$('div.control-group.password-group').addClass('error');
		$('span.help-inline.password').removeClass('hide');
		validate = false;
	}
	else {
		$('div.control-group.password-group').removeClass('error');
		$('span.help-inline.password').addClass('hide');
		validate = true;
	};

	return validate;
}

function validateUsername()
{
	var username = $('#username').val();
	var validate = false;

	if (username.length < 4) {
		$('div.control-group.username-group').addClass('error');
		$('span.help-inline.username').removeClass('hide');

		validate = false;
	}
	else {
		$('div.control-group.username-group').removeClass('error');
		$('span.help-inline.username').addClass('hide');

		validate = true;
	};

	return validate;
}

function validateAddAdminForm()
{
	var password = $('#password').val();
	var confirm_password = $('#confirm_password').val();
	var name = $('#name').val();
	var email = $('#email').val();

	var validate = true;

	validate = validateUsername();
	validate = validatePassword();	

	return validate;
}

function editAdmin()
{
	var Send = function() {

        var Name = $( '#name' ).val();
        var Something = $(this).closest('tr').find('td:eq(1)').text();
        
        $.ajax( {
            async: false,
            data: { name: Name, somedata: Something },
            type: 'POST',
            url: here
        } );

    };
}