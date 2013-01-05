
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
			.button();
			$('div#login input[type=submit]').click(function(event){
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
							$('<div></div>')
							.text(data.message)
							.dialog(
								{
									title:'Login Failure',
									modal:true,
									resizable:false,
									closeOnEscape:true,
									buttons: {
										"Ok":function(){
											$(this).dialog('destroy');
											$form.find('input[name=user_id]').focus();
										}
									}
								}
							)
							.css({'font-size':'75%'});
							$form.find('input[name=user_id]').focus();
						}
					},
					'json'
				)
			});
			$('textarea.tinymce')
			.parent('form')
			.find('input[type=submit]')
			.click(function(event){
				event.preventDefault();
				var $form = $(this).parents('form');
				// console.log($(this).parents('form'));
				$.post(
					$form.attr('action'),
					// 'events.save.php',
					$form.serialize(),
					function(data){
						if(data.status=='success')
						{
							window.location.href='events.php';
						}
						else
						{
							$('<div></div>')
							.text(data.message)
							.dialog(
								{
									title:'Login Failure',
									modal:true,
									resizable:false,
									closeOnEscape:true,
									buttons: {
										"Ok":function(){
											$(this).dialog('destroy');
										}
									}
								}
							)
							.css({'font-size':'75%'});
						}
						// console.log(data);
					},
					'json'
				);
			});
		});