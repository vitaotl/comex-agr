<?php include 'header.php';
include 'translater.php';

$url_ofertas = $url . '/api/get-offers?' . http_build_query(['site' => $site_name]);

$offers = json_decode(file_get_contents($url_ofertas));
?>
<style>
	.thumbnail-container {
		width: 60px;
		/* Largura desejada para o thumbnail */
		height: 60px;
		/* Altura desejada para o thumbnail */
		overflow: hidden;
		border: 2px solid transparent;
		border-radius: 4px;
	}

	.thumbnail {
		width: 100%;
		height: 100%;
		object-fit: cover;
		/* Esta propriedade faz o corte mantendo proporções */
	}

	:root {
		--tmr-bootstrap-border-color: #dee2e6;
		--tmr-white: #eee;
		--tmr-table-header: #54667a;
		--tmr-row-divider-color: #3490dc;
		--tmr-stripped-row-background-color: rgba(0, 0, 0, 0.05);
	}

  .orange {
    color: rgb(255, 87, 34);
  }

  .modal-content-custom {
    border-radius: 13px 30px 0 0;
  }

  .modal-header-custom {
    background: rgb(255, 87, 34);
    border-radius: 10px 25px 0 0;
    border-bottom: none;
  }

  .modal-title-custom {
    color: #FFFFFF;
    font-size: 1rem;
  }

	/*-- ==============================================================
 Screen smaller than 760px and iPads.
 ============================================================== */

	@media only screen and (max-width: 1200px),
	(min-device-width: 768px) and (max-device-width: 1024px) {

		[data-content]:before {
			content: attr(data-content);
		}

		/* Force table to not be like tables anymore */
		.table-mobile-responsive,
		.table-mobile-responsive thead,
		.table-mobile-responsive tbody,
		.table-mobile-responsive th,
		.table-mobile-responsive td,
		.table-mobile-responsive tr {
			display: block;
		}

		.table-mobile-responsive.text-center {
			text-align: left !important;
		}

		.table-mobile-responsive caption {
			width: max-content;
		}

		/* Hide table headers (but not display: none;, for accessibility) */
		.table-mobile-responsive thead tr {
			position: absolute;
			top: -9999px;
			left: -9999px;
		}

		.table-mobile-responsive> :not(:first-child) {
			border-top: none;
		}

		.table-mobile-responsive>:not(caption)>*>* {
			border-color: var(--tmr-bootstrap-border-color);
		}

		.table-mobile-responsive tr:not(.bg-light-blue) {
			border-bottom: 2px solid var(--tmr-row-divider-color);
		}

		/* Default layout */
		.table-mobile-responsive td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid var(--tmr-white);
			position: relative;
			padding-left: 50%;
			padding-top: 1.5rem !important;
		}

		.table-mobile-responsive td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
			font-weight: bold;
			color: var(--tmr-table-header);
		}

		/* Sided layout */
		.table-mobile-responsive.table-mobile-sided> :not(:first-child) {
			border-top: none;
		}

		.table-mobile-responsive.table-mobile-sided>:not(caption)>*>* {
			border-color: var(--bs-table-border-color);
		}

		.table-mobile-responsive.table-mobile-sided td {
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid var(--tmr-white);
			position: relative;
			padding-left: 50%;
			padding-top: 0px !important;
			display: flex;
			justify-content: flex-end;
		}

		.table-mobile-responsive.table-mobile-sided td:before {
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 0;
			left: 6px;
			width: 45%;
			padding-right: 10px;
			white-space: nowrap;
			font-weight: bold;
			color: var(--tmr-table-header);
		}

		/* Styleless */
		.table-mobile-responsive.table-mobile-styleless tr:not(.bg-light-blue) {
			border-bottom: none !important;
		}

		/* Stripped rows */
		.table-mobile-responsive.table-mobile-striped>tbody>tr:nth-of-type(odd)>* {
			background-color: var(--tmr-stripped-row-background-color) !important;
		}
	}
</style>
<script src="//code-sa1.jivosite.com/widget/58qBmSBq4c" async></script>

<div class="container pt-1 pb-1">
	<div class="row align-items-center mb-3">
		<div class="col-sm-5 order-2 order-sm-1 pt-3">
			<h1 class="text-primary font-bold"><?= $site->title ?></h1>
			<p class="text-primary" style="font-size: 14px;">Voc&ecirc; vai encontrar fornecedores de <B>
					<?= $site->prefixo_action ?> <?= $site->title ?>
				</B> no Brasil e China. Compradores de <B>
					<?= $site->prefixo_action ?> <?= $site->title ?>
				</B> podem fazer as cota&ccedil;&otilde;es em nossa cadeia de suprimentos.<br>
				As cota&ccedil;&otilde;es de <B>
					<?= $site->prefixo_action ?> <?= $site->title ?>
				</B> s&atilde;o respondidas por fornecedores Brasileiros e Chineses.</p>

			<a href="<?= $url_base ?>/especificacoes.php" class="btn btn-primary btn-sm pr-5 pl-5">Especifica&ccedil;&otilde;es</a>
		</div>
		<div class="col-4 col-md-3 text-center order-1 order-sm-2 align-content-center p-1">
			<img class="img-fluid  " src="<?= $url ?>/assets/img/agro-logo-lg.jpg" alt="Agro Agr" style="min-height: 100px; max-height: 180px;">
		</div>
		<div class="col-8 col-md-4 text-center order-1 order-sm-2 p-1">
			<?php
			if ($site->banners) {
			?>
				<img class="img-fluid " src="<?= $url ?>/upload/banners/<?= $site->banners; ?>_thumb.png" alt="Apoio" style="min-height: 100px">
			<?php
			} ?>
		</div>
	</div>


	<?php
	if ($site->link_whatsapp) {
	?>
		<div class="row m-0 p-0">
			<div class="col-sm-3 order-2 order-sm-1">
				<div class="row no-gutters">
					<div class="col-6 p-1">
						<img class="img-fluid w-100 p-3" src="https://quickchart.io/qr?text=<?= $site->link_whatsapp ?>&ecLevel=L&margin=1&size=500" alt="Agro Agr">
						<span class="col-4 col-md-3 text-center order-1 order-sm-2">
							<img class="img-fluid w-100 p-2" src="<?= $url ?>/assets/img/qr-code-wechat.jpg" alt="Agro Agr">
						</span>
					</div>
					<div class="col-6 p-2">
						<img src="<?= $url ?>/assets/img/logo-whatsapp.jpg" alt="Agro Agr" class="img-fluid w-100 p-3">
						<span class="col-4 col-md-3 text-center order-1 order-sm-2">
							<img class="img-fluid w-100 p-3" src="<?= $url ?>/assets/img/logo-wechat.jpg" alt="Agro Agr">
						</span>
					</div>
				</div>
			</div>
			<div class="col-sm-5  order-1 order-sm-2">
				<h2 class="text-primary font-bold" style="font-size: 1.5rem;">Grupos de<br>
					WhatsApp e Wechat<br>
					de
					<?= $site->prefixo_action ?> <?= $site->title ?></h2>
				<p class="text-primary"><small>Entre no grupo de Whatsapp ou Wechat para agilizar o atendimento.<br>
					</small></p>

				<p class="mb-0"><a href="<?= $site->link_whatsapp ?>" target="_blank" style="background-color: #FF5722" class="btn btn-lg btn-warning text-white pr-4 pl-4"><i class=" fab fa-whatsapp"></i> Entre no grupo de
						<?= $site->prefixo_action ?> <?= $site->title ?> <i class="fa fa-arrow-right"></i>
					</a><br>
					<br>
					<small>S&atilde;o produtores, fornecedores e compradores de
						<?= $site->prefixo_action ?> <?= $site->title ?> buscando informa&ccedil;&otilde;es sobre o mercado.<br>
						Entre no grupo e receba atendimento de triagem do<br>
						administrador do Chat de
						<?= $site->prefixo_action ?>
						<?= $site->title ?>.<br>
						<br>
						Estamos cadastrando safras e fornecedores de
						<?= $site->prefixo_action ?>
						<?= $site->title ?> no Brasil e China.<br>
						<br>
					</small>
				</p>
			</div>
			<div class="col-sm-4  order-2 order-sm-3 m-0 p-0" style="font-size: 13px;">
				<p class="text-center"> Meu nome é <B>Lincoln Camargo - 林肯</B><br> Trabalho com desenvolvimento de produtos há <br> mais de 25 anos.<br></p>
				<p class="text-center">
					<B>Minhas especialidades são:</B><br>
					<br>
					<b>Estratégia de captação de negócios.</b><br>
					&quot;Por este motivo você está aqui.&quot;<br>
					<br>
					<b>Estratégia de melhoria de compras.</b><br>
					&quot;Quem compra melhor vende melhor.&quot;<br>
					<br>
					<b>Estratégia de melhoria logística.</b><br>
					&quot;Quem coloca mais carga em um container<br>
					economiza dinheiro e adota sustentabilidade.<br>
					<br>
					<b>Eu posso trabalhar para melhorar seu</b><br>
					negócio com <?= $site->title ?> no Brasil e na China.<br>
					<br>
					<span style="color: rgb(255, 87, 34);">Para conhecer minha carreira visite meu Linkedin em:<br></span>
					<a href="http://www.linkedin.com/in/lincolncamargo" target="_blank" rel="noopener" style="color:#FF5722">http://www.linkedin.com/in/lincolncamargo</a>
					<br>
					<br>

		  </div>
		</div>
	<?php
	} ?>
	<?php /**
	 * 
	 * Ofertas
	 * **/
	include 'offers.php';
	?>

	<div class="row mt-5">

		<div class="col-sm-6">
			<h2 class="text-center font-bold">Cota&ccedil;&atilde;o de <?= $site->prefixo_action ?> <?= $site->title ?></h2>
			<p class="text-center"> O sistema entrega a solicitação para (3) produtores e<br>
				fornecedores de
				<?= $site->prefixo_action ?>
				<?= $site->title ?> do Brasil e China.</p>
			<form action="<?= $url ?>/api/send/<?= $site->url ?>" class="form-horizontal mr-auto ml-auto" id="form-solicitation">
				<div class="divider bg-info"></div>
				<p class="text-center mb-2 text-primary"><i class="fa fa-caret-down fa-3x mt-n3"></i></p>

				<div class="form-group">
					<select name="tipo_de_negocio" class="form-control">
						<option value="">Tipo de negócio</option>
						<?php
						foreach ($site->actions as $action) {
							$action = ucfirst(trim($action));

						?>
							<option value="<?= $action ?> <?= $site->prefixo_action ?> <?= $site->title ?>"><?= $action ?> <?= $site->prefixo_action ?> <?= $site->title ?></option>
						<?php

						} ?>
					</select>
				</div>

				<p class="text-center">Especificações do Produto</p>

				<?php
				foreach ($site->especificacoes as $especificacao) {
				?>
					<div class="form-group">
						<input type="hidden" name="titulo_especificacao[]" value="<?= $especificacao['title'] ?>">
						<select name="especificacao[]" class="form-control">
							<option value=""><?= $especificacao['title'] ?></option>
							<?php
							foreach ($especificacao['options'] as $option) {
							?>
								<option value="<?= $option ?>"><?= $option ?></option>
							<?php
							} ?>
						</select>
					</div>
				<?php
				} ?>


				<div class="form-group">
					<input type="text" class="form-control" placeholder="Quantidade" name="quantity">
				</div>
				<div class="form-group mb-1">
					<textarea name="message" rows="3" class="form-control" placeholder="Mensagem"></textarea>
				</div><br>

        <div class="d-flex align-items-center">
          <p class="text-center orange flex-grow-1">O formulário agiliza o trabalho de <br>
					compradores de suprimentos &quot;supply chain&quot;<br>
					nas tarefas de compras de
					<?= $site->prefixo_action ?>
					<?= $site->title ?>.</p>
          
          <div class="form-group text-right">
            <a href="#" data-toggle="modal" data-target="#modal-dados-pessoais" class="btn btn-primary" style="background-color: #32CD32; border: 2px solid transparent; border-radius: 4px;">Continuar</a>
          </div>
        </div>
				<div class="divider bg-info"></div>

				<div class="row mt-5">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-6">
								<h5 class="mb-0 text-primary text-center"><strong>Seja Fornecedor.</strong></h5>
								<a href="https://www.<?= $site->settings['buscamos_fornecedores_url'] . $foundPattern ?>" class="btn btn-primary btn-sm btn-block mt-2 mb-2"><?= $site->settings['buscamos_fornecedores_title'] ?></a>
								<a href="https://www.fornecedores.agr.br"><img src="<?= $url ?>/assets/img/Fornecedor-Agro.jpg" alt="Agro Agr" class="img-fluid mb-3"></a>

								<p class="text-primary"><small>Fa&ccedil;a o cadastro e disponibilize<br>
										sua safra ou seus produtos de
										<?= $site->prefixo_action ?>
										<?= $site->title ?>.</small></p>
								<p class="text-primary"><small>S&atilde;o centenas de produtores de
										<?= $site->prefixo_action ?>
										<?= $site->title ?>.
										<br>
										do Brasil e do Mundo, Agilize sua venda de
										<?= $site->prefixo_action ?>
										<?= $site->title ?>.</small></p>
								<p class="text-primary"><small>S&atilde;o clientes do mundo todo em busca de produtores
										Brasileiros e Chineses.</small><br>
								</p>
							</div>
							<div class="col-6">
								<h5 class="mb-0 text-center text-info"><strong>Produtos da Safra.</strong></h5>
								<a href="http://<?= $site->settings['safra_safrinha_url'] . $foundPattern ?>" class="btn btn-info btn-sm btn-block mt-2 mb-2"><?= $site->settings['safra_safrinha_title'] ?></a>
								<a href="http://agro.agr.br/safra"><img src="<?= $url ?>/assets/img/Comprador-Agro.jpg" alt="Agro Agr" class="img-fluid mb-3"></a>

								<p class="text-right text-primary"><small>Aproveite as ofertas de produtos<br>
										da safra do m&ecirc;s.</small></p>
								<p class="text-right text-primary"><small>Trabalhamos geralmente com<br>
										grandes quantidades para<br>
										Supermercadistas, Atacaditas e<br>
										Linhas de Produção.</small> </p>
								<p class="text-right text-primary"><small>Voc&ecirc; quer produto com<br>
										marca pr&oacute;pria?</small>
								<p class="text-right text-primary"><small>Fazemos produtos com sua marca própria.<br>
										OEM e Private Label são nossas especialidades.</small>
									<br>
									<br>
								</p>
							</div>
						</div>

						<p class="mt-0">Mercados Interligados por outros sites da Agro.</p>

						<div class="row">
							<?php
							foreach ($site->correlatos as $correlato) {
							?>
								<div class="col-6">
									<a href="<?= $correlato['url'] ?>" class="btn btn-secondary btn-block btn-sm mb-2"><?= $correlato['title'] ?></a>
								</div>
							<?php
							} ?>
						</div>
						<div class="divider bg-info"></div>
						<p class="text-center mb-2 text-primary"><i class="fa fa-caret-down fa-3x mt-n3"></i></p>
					</div>
					<div class="col-sm-6 pr-5 pl-5 text-primary">

					</div>
				</div>

				<div class="modal fade" id="modal-dados-pessoais">
				  <div class="modal-dialog" style="width: 338px;">
				    <div class="modal-content modal-content-custom">
				      <div class="modal-header modal-header-custom">
				        <h5 class="modal-title modal-title-custom">Passo 2: Informe seus dados</h5>
				        <button type="button" class="close mr-0" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			          </div>
				      <div class="modal-body">
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Nome" name="name">
			            </div>
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="E-mail" name="email">
			            </div>
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Celular +55 11 00000-0000" name="phone">
			            </div>
				        <div class="form-group">
				          <input type="text" class="form-control" placeholder="Destino (Entrega do Produto)" name="destiny">
			            </div>
				        <div class="form-group d-flex justify-content-center">
				          <div class="g-recaptcha" data-sitekey="<?= $site->recaptcha_key ?>"></div>
			            </div>
			          </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-light" data-dismiss="modal">Voltar</button>
				        <button data-loading-text="Aguarde..." type="submit" class="btn pr-5 pl-5 btn-primary" accesskey="" style="border: 2px solid transparent; border-radius: 4px;background-color: #32CD32">Solicitar</button>
			          </div>
			        </div>
			      </div>
				</div>



			</form>
		</div>
		<div class="col-sm-6">

			<?php
			if ($site->url_video) {
			?>
				<div class="divider bg-primary mb-1"></div>
				<iframe width="100%" height="250" src="https://www.youtube.com/embed/<?= $site->url_video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<div class="divider bg-info"></div>
				<p class="text-center mb-4 text-primary"><i class="fa fa-caret-down fa-3x mt-n3"></i></p>
			<?php
			} ?>

			<div class="divider bg-primary mb-1"></div>
			<iframe width="100%" height="250" src="https://www.youtube.com/embed/NzBZpXhl-PQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<div class="divider bg-info"></div>
			<p class="text-center mb-4 text-primary"><i class="fa fa-caret-down fa-3x mt-n3"></i></p>
			<p>Nosso atendimento trabalha 24 horas por dia.<br><br>

				Você pode escolher atendimento via Whatsapp para
				<?= $site->prefixo_action ?>
				<?= $site->title ?>.<br>
				Você pode escolher atendimento via WeChat para
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				.<br>
				Você pode selecionar atendimento via Chat de Atendimento Humano para
				<?= $site->prefixo_action ?> <?= $site->title ?>.<br>
				Você pode preferir atendimento via Chatbot para
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				.<br>
				<br>
				O que voc&ecirc; pode fazer na Agro?<br>
				<br>
				Cadeia de Suprimentos<br>
				<B>Desenvolvimento de Produtos:</B><br>
				Marca própria de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				<br>
				<br>
				<B>Melhoria de compras:<br></B>
				Melhoramos o valor das compras.<br>
				Melhoramos médias de 20% a 50% nos produtos.<br>
				Quem compra melhor, vende melhor.<br>
				<br>
				<B>Encontrar:<br>
				</B>
				Fornecedor de <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				Distribuidor de <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				Loja de <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				Marketplace de <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				V&aacute;rios tipos de <?= $site->prefixo_action ?> <?= $site->title ?>.<br>
				<br>

				<B>Neg&oacute;cios com a Agro:</B><br>
				Cotar <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				Comprar <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				Vender <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				Ofertas de <?= $site->prefixo_action ?> <?= $site->title ?>
				<br>
				<?= $site->title ?> para exporta&ccedil;&atilde;o<br><br>
				A Agro trabalha cotando produtos agr&iacute;colas!<br>
				Atendemos algumas das maiores<br>
				empresas do ramo alimentício do mundo.<br>
				<br>
				Trabalhamos como representante comercial de produtores de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>.<br>
				Disponibilize sua safra de
				<?= $site->prefixo_action ?>
				<?= $site->title ?> para a Agro.
				<br>
				Você quer participar de uma cooperativa de
				<?= $site->prefixo_action ?>
				<?= $site->title ?> ?
				<br>
				<br>
				Fazemos liga&ccedil;&atilde;o entre compradores e fornecedores.<br>
				Fornecedores de <?= $site->title ?> do Brasil e do mundo no mesmo lugar. <br>
				<br>
			</p>
			<p><strong>Trabalhamos para vender safra no Brasil todo.</strong></p>
			<p>Para trabalhar a venda com nossos compradores precisamos que você grave um vídeo apresentando sua plantação.</p>
			<p><strong>Instrução de gravação de vídeo do
					<?= $site->prefixo_action ?>
					<?= $site->title ?>
					.<br>
					<br>
				</strong> 1 - Grave o vídeo falando meu nome: Lincoln<br>
				2 - Quantidade que você tem disponível do
				<?= $site->prefixo_action ?>
				<?= $site->title ?>:<br>
				3 - Localidade:
				<br>
				4 - Data:<br>
				<br><strong>
					Exemplo da mensagem do vídeo:<br></strong>
				Olá Lincoln!<br>
				Tenho uma safra de 30 toneladas de
				<?= $site->prefixo_action ?>
				<?= $site->title ?> disponível para venda.<br>
				A roça está na cidade de Alfenas, Minas Gerais.<br>
				Colheita prevista para o mês de Setembro.
			</p>
			<p><strong>Captação de Dados – Comprador de
					<?= $site->prefixo_action ?>
					<?= $site->title ?>
					. </strong></p>
			<p>Se você for comprador de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				precisamos saber:<br>
				Qual tipo de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				você está procurando?<br>
				Qual quantidade de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				você precisa?<br>
				Qual local de destino do
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				?</p>
			<p><strong>Captação de Dados - Produtor de
					<?= $site->prefixo_action ?>
					<?= $site->title ?>
					. </strong></p>
			<p>Se você for Produtor precisamos saber:<br>
				Qual especificação de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				você produz?<br>
				Qual quantidade de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>
				você produz?<br>
				Qual local de sua roça ou comércio de
				<?= $site->prefixo_action ?>
				<?= $site->title ?>?</p>
			<p> <br>
			</p>


		</div>
		<div class="container">

		</div>
	</div>
</div>
<?php include 'footer.php'; ?>