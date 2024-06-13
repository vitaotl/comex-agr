			<footer class="bg-primary pt-1 pb-1">
				<div class="container text-center text-white">
					<img class="mt-4" src="<?= $url ?>/assets/img/ico.png" alt="Agro">
					<p class="mt-2 mb-0"><B><?= $site->title ?></B> um site de suprimentos da Agro.agr.br</p>
					<p class="m-0">Conectando produtores e compradores desde 2000.</p>
					<p class="m-0 mb-3">&copy; 2000 - <?=date("Y")?> Copyright: Todos os direitos reservados.</p>
				</div>
			</footer>


			<script src="<?= $url ?>/assets/js/lib/jquery-3.2.1.min.js"></script>
			<script src="<?= $url ?>/assets/js/lib/bootstrap.bundle.min.js"></script>
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<script>
				$.fn.button = function(action)
				{
					if(action === 'loading' && this.data('loading-text'))
					{
						this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
					}
					else if(action === 'reset' && this.data('original-text'))
					{
						this.html(this.data('original-text')).prop('disabled', false);
					}
				};

				$('form#form-solicitation').submit(function()
				{
					let form = $(this);
					$('button[data-loading-text]').button('loading');
					$.post(form.attr('action'), form.serializeArray())
					.done(function(message)
					{
						if(message[0] == 'success')
						{
							alert(message[1])
						}
						else
						{
							alert('ATENÇÃO! '+message[1])
						}
					})

					.fail(function()
					{
						alert("Falha ao enviar a solicitação. Tente novamente mais tarde");
					})

					.always(function()
					{
						$('button[data-loading-text]').button('reset');
						grecaptcha.reset();
					})
					return false;
				});
			</script>
		</body>
		</html>