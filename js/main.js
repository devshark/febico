
		$(document).ready(function () {	
			$('ul#nav>li').hover(
				function () {
					$('ul', this).slideDown(150);
				}, 
				function () {
					$('ul', this).slideUp(150);
				}
			);
			$('a.ui-button').button();
			$('input[type=submit]')
			.button()
			.click(function(event){
				event.preventDefault();
				var $form = $(this).parent('form');
				$.post(
					$form.attr('action'),
					$form.serialize(),
					function(data)
					{
						if(data.status == 'success'){
							window.location.href='index.php';
						}else{
							$form.find('input[name=user_id]').focus();
							alert('Login Failure.');
						}
					},
					'json'
				)
			});
		});