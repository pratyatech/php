<form id="example-form" name="my-form">
    <input id="phone-number" name="phone-number" type="text" maxlength="16" placeholder="(XXX) XXX-XXXX" /><br /><br />
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
$('#phone-number', '#example-form')

	.keydown(function (e) {
		var key = e.charCode || e.keyCode || 0;
		$phone = $(this);

		// Auto-format- do not expose the mask as the user begins to type
		if (key !== 8 && key !== 9) {
			if ($phone.val().length === 4) {
				$phone.val($phone.val() + ')');
			}
			if ($phone.val().length === 5) {
				$phone.val($phone.val() + ' ');
			}			
			if ($phone.val().length === 9) {
				$phone.val($phone.val() + ' ');
			}
                        if ($phone.val().length === 10) {
				$phone.val($phone.val() + ' ');
			}
                        if ($phone.val().length === 13) {
				$phone.val($phone.val() + ' ');
			}
		}

		// Allow numeric (and tab, backspace, delete) keys only
		return (key == 8 || 
				key == 9 ||
				key == 46 ||
				(key >= 48 && key <= 57) ||
				(key >= 96 && key <= 105));	
	})
	
	.bind('focus click', function () {
		$phone = $(this);
		
		if ($phone.val().length === 0) {
			$phone.val('(');
		}
		else {
			var val = $phone.val();
			$phone.val('').val(val); // Ensure cursor remains at the end
		}
	})
	
	.blur(function () {
		$phone = $(this);
		
		if ($phone.val() === '(') {
			$phone.val('');
		}
	});
</script>
