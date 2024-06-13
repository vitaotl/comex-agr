
<style>
/* Estilo para dispositivos móveis (até 767px de largura) */
@media only screen and (max-width: 767px) {
    .td-descrition {
        border: none;
        border-bottom: 1px solid var(--tmr-white);
        position: relative;
        padding-left: 0% !important;
        padding-top: 0px !important;
        display: block !important;
		white-space: normal;
       /* justify-content: flex-end; */
    }

    .offer-image {
			justify-content: flex-start !important;
			align-items: center !important;
			padding-left: 0 !important;
		}
}

 </style>
<?php 

 /**
 * 
 * Ofertas
 * **/


if ($offers) { ?>
		<div class="mt-0" id="ofertas">
			<table class="table table-mobile-responsive table-mobile-responsive table-mobile-sided">
				<thead>
					<tr>
						<th colspan="6">
							<h5 class="mb-0 text-left text-info"><small><b><?= translateText('Abaixo estão algumas Ofertas de', 'pt') ?> <?= $site->title ?>.</b><br>
									<?= translateText('Quer comprar ou vender', 'pt') ?> <b>
										<?= $site->title ?>
									</b>
									</b>? <?= translateText('Podemos publicar sua oferta.', 'pt') ?></small>
						</th>
					</tr>
					<tr>
						<th scope="col"></th>
						<th scope="col"><?= translateText('Tipo', 'pt') ?></th>
						<th scope="col"><?= translateText('Quantidade', 'pt') ?></th>
						<th scope="col"><?= translateText('Localidade', 'pt') ?></th>
						<th scope="col"></th>
						<th scope="col"><?= translateText('Data', 'pt') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($offers as $offer) : ?>
						<tr class="">
							<td scope="row" data-content="#"><span class="badge badge- <?= $offer->tipo_oferta[1]  ?>" style="background-color: #FF5722; border: 2px solid transparent; border-radius: 4px; color:#fff">
									<?= translateText($offer->tipo_oferta[0], 'pt')  ?>
								</span></td>
							<td data-content="<?= translateText('Tipo', 'pt') ?>"><strong>
									<?= $offer->tipo ?>
								</strong></td>
							<td data-content="<?= translateText('Quantidade', 'pt') ?>"><?= $offer->quantidade ?></td>
							<td data-content="<?= translateText('Localidade', 'pt') ?>"><?= $offer->cidade ?> /
								<?= $offer->estado ?></td>
						</tr>
						<tr class="p-1 m-2 ">
							<td colspan='2' style="vertical-align: middle; text-align: left;" class="bg-light offer-image">
								<?php
								$cont = '0';
								if ($offer->fotos) {
									foreach ($offer->fotos as $foto) {
										$cont = $cont +  '1';
										if ($cont <= '3') {
								?>
											<a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id  ?>">
												<img class="thumbnail-container thumbnail" style="<?php echo $cont == '1' ? 'height: 80px; width: 80px;' : 'height: 60px; width: 60px;' ?>" src="<?= $url . '/upload/fotos/' . $foto . '_thumb.png'  ?>" alt="Sua Imagem">
											</a>
								<?php
										}
									}
								}
								?>
								<?php
								if ($offer->videos) {
									foreach ($offer->videos as $video) {
										if ($cont <= '3') {
								?>
											<a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id  ?>"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLPN6XtCmUFg-DypEGjliuL-FgZG03Mbxc_Q&usqp=CAU" width="60px" height="auto" style="border: 2px solid transparent; border-radius: 4px !important;" loading="lazy"></a>
								<?php
										}
									}
								}
								?>
							</td>
							<td style="margin-top: 2;" class="p-2 align-middle">
								<a href="#" data-toggle="modal" data-target="#modal-offer-<?= $offer->id  ?>" class="btn btn-sm 4 btn-primary pr-4 pl-4" style="background-color: #FF5722; border: 2px solid transparent; border-radius: 4px;">
									<?= translateText('Detalhes da oferta', 'pt') ?>
								</a>
							</td>
							<td class="td-descrition" colspan='2'>
								<div class="row">
									<div class="col-lg-12">
									<p><small><?= nl2br($offer->obs) ?></small></p>
								</div>
							</div>
							</td>
							<td>
								<br><span><?= date('d/m/Y', strtotime($offer->created_at)) ?></span>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<hr>
		<h4> </h4>
		<?php foreach ($offers as $offer) : ?>
			<?php $id = rand(); ?>
			<?php include 'modal-oferta.php'; ?>
		<?php endforeach; ?>
	<?php } ?>

	