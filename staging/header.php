<?php 

ini_set('display_errors', 0 );
error_reporting(0);

function redirectHttps()
{
	$needRedirect = empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off";
	if (!preg_match("#^www.#", $_SERVER["HTTP_HOST"])) {
		$needRedirect = true;
		$_SERVER["HTTP_HOST"] = "www." . $_SERVER["HTTP_HOST"];
	}
	if($needRedirect) {
	    $location = 'https://'.$_SERVER['HTTP_HOST'];
	    header('Location: ' . $location);
	    exit;
	}
}

//Produção
$site_name = str_replace(['www.staging.', '.agr.br'], '', $_SERVER['SERVER_NAME']);
$url_base = 'https://'.$_SERVER['SERVER_NAME'];
redirectHttps();
var_dump($_SERVER['SERVER_NAME']); die();
//$site_name = 'abacate';
//$url_base = 'http://localhost/agro';

if($site_name == 'xn--maa-3la')
{
	$site_name = 'maça';
}

if($site_name == 'xn--peas-1oa')
{
	$site_name = 'peças';
}

if($site_name == 'xn--cachaa-0ua')
{
	$site_name = 'cachaça';
}

$url = 'https://www.agro.agr.br';

$url_api = $url.'/api/site/'.str_replace('ç', 'c', $site_name) . "?" . http_build_query([ "ip" => $_SERVER["REMOTE_ADDR"], "ua" => $_SERVER['HTTP_USER_AGENT'] ]);


$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_URL, $url_api);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl); 
// echo $url_api;
// print_r($response);
$site = json_decode($response, true);
curl_close($curl);
$barra = $_SERVER[REQUEST_URI];
if(!$site)
{
	die('Site não encontrado!');
}

$site = (object)$site;

if($barra == "/especificacoes.php")
{ 
	$tituloCustom="Especificações de ". $site->title; 
} else{
	$tituloCustom=$site->title;
}

$recaptcha_key = '6LegvqYZAAAAAEMFxWBnJpWeNQlHI6OelJLw6QZ7';
// print_r($site); die();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php if($site->cod_google_analytics) {	?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $site->cod_google_analytics ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?= $site->cod_google_analytics ?>');
	</script>

	<?php } ?>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $tituloCustom ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	<link rel="stylesheet" href="<?= $url ?>/assets/css/lib/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $url ?>/assets/css/main.css">
	<link rel="shortcut icon" href="<?= $url?>/assets/img/ico.png" type="image/x-icon">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="canonical" href="https://www.<?= $site->url ?>.agr.br"/>	

	<meta property="og:locale" content="pt_BR"/>
	<meta property="og:locale:alternate" content="pt-br"/>
	<meta property="og:title" content="Fornecedor de <?= $site->prefixo_action ?> <?= $site->title ?>"/>
	<meta property="og:type" content="Website"/>
	<meta property="og:url" content="https://www.<?= $site->url ?>.agr.br"/>
	<meta property="og:site_name" content="<?= $site->prefixo_action ?> <?= $site->title ?> - Cotação de Produtos"/>
	<meta property="og:description" content="A <?= $site->url ?>.agr.br é um aplicativo de informações do setor de <?= $site->prefixo_action ?> <?= $site->title ?>."/>

  <meta property="og:image" content="https://www.agro.agr.br/assets/img/logo-agro.png" />
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="600">
	<meta property="og:image:height" content="315">

	<meta name="language" content="pt-br">
	<meta name="doc-class" content="Completed">
	<meta name="doc-rights" content="Public">
	<meta name="Googlebot" content="index,follow">
	<meta name="MSSmartTagsPreventParsing" content="true">
	<meta http-equiv="Content-Language" content="pt-br">
	<meta http-equiv="Content-Language" content="Português">

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="Expires" CONTENT="May 20, 2013, 17:17:17 PM">
	<META NAME="PUBDATE" content="May 20, 2013, 17:17:17 PM">
	<META NAME="Updated" CONTENT="daily">
	<META NAME="revisit=2 days">
	<META NAME="ROBOTS" CONTENT="follow,index">
	<META HTTP-EQUIV="Content-Language" CONTENT="pt-br">
	<META NAME="Description" CONTENT="Plataforma de compra e venda de <?= $site->prefixo_action ?> <?= $site->title ?>. Solicite sua cotação de <?= $site->prefixo_action ?> <?= $site->title ?>.">
	<META NAME="Keywords" CONTENT="<?= $site->prefixo_action ?> <?= $site->title ?>, APP de <?= $site->prefixo_action ?> <?= $site->title ?>, Aplicativo de <?= $site->prefixo_action ?> <?= $site->title ?>, comércio de <?= $site->prefixo_action ?> <?= $site->title ?>, Request <?= $site->prefixo_action ?> <?= $site->title ?> Quotation - RQF, comprar <?= $site->prefixo_action ?> <?= $site->title ?>, compras de <?= $site->prefixo_action ?> <?= $site->title ?>, fornecedor de <?= $site->prefixo_action ?> <?= $site->title ?>, fornecedores de <?= $site->prefixo_action ?> <?= $site->title ?>, produtor de <?= $site->prefixo_action ?> <?= $site->title ?>, produtores de <?= $site->prefixo_action ?> <?= $site->title ?>, vendedor de <?= $site->prefixo_action ?> <?= $site->title ?>, cotação de <?= $site->prefixo_action ?> <?= $site->title ?>, representante de <?= $site->prefixo_action ?> <?= $site->title ?>, representante de fazenda de <?= $site->prefixo_action ?> <?= $site->title ?>, oferta de <?= $site->prefixo_action ?> <?= $site->title ?>, ofertas de <?= $site->prefixo_action ?> <?= $site->title ?>, comparação de Preço de <?= $site->prefixo_action ?> <?= $site->title ?>, distribuidores de <?= $site->prefixo_action ?> <?= $site->title ?>, distribuidor de <?= $site->prefixo_action ?> <?= $site->title ?>, Whatsapp de <?= $site->prefixo_action ?> <?= $site->title ?>, Atendimento ao vivo de <?= $site->prefixo_action ?> <?= $site->title ?>, Chat de Atendimento <?= $site->prefixo_action ?> <?= $site->title ?>, chatbot de <?= $site->prefixo_action ?> <?= $site->title ?>, vendas de <?= $site->prefixo_action ?> <?= $site->title ?>, <?= $site->prefixo_action ?> <?= $site->title ?> na roça, encontrar  <?= $site->prefixo_action ?> <?= $site->title ?>, variedade de <?= $site->prefixo_action ?> <?= $site->title ?>, carga fechada de <?= $site->prefixo_action ?> <?= $site->title ?>, <?= $site->prefixo_action ?> <?= $site->title ?> no Brasil, <?= $site->prefixo_action ?> <?= $site->title ?> direto do produtor, revendedor de <?= $site->prefixo_action ?> <?= $site->title ?>, Cooperativa de <?= $site->prefixo_action ?> <?= $site->title ?>, comparativo de Preço de <?= $site->prefixo_action ?> <?= $site->title ?>, Tarefa de compra de <?= $site->prefixo_action ?> <?= $site->title ?>, <?= $site->prefixo_action ?> <?= $site->title ?> em São Paulo, <?= $site->prefixo_action ?> <?= $site->title ?> no Acre - AC, <?= $site->prefixo_action ?> <?= $site->title ?> em Alagoas - AL, <?= $site->prefixo_action ?> <?= $site->title ?> no Amapá- AP,<?= $site->prefixo_action ?> <?= $site->title ?> em Amazonas - AM, <?= $site->prefixo_action ?> <?= $site->title ?> na Bahia - BA, <?= $site->prefixo_action ?> <?= $site->title ?> no Ceará- CE, <?= $site->prefixo_action ?> <?= $site->title ?> no Distrito Federal - DF, <?= $site->prefixo_action ?> <?= $site->title ?> no Espírito Santo - ES, <?= $site->prefixo_action ?> <?= $site->title ?> em Goiás - GO, <?= $site->prefixo_action ?> <?= $site->title ?> no Maranhão - MA, <?= $site->prefixo_action ?> <?= $site->title ?> em Mato Grosso - MT, <?= $site->prefixo_action ?> <?= $site->title ?> em Mato Grosso do Sul - MS, <?= $site->prefixo_action ?> <?= $site->title ?> em Minas Gerais - MG, <?= $site->prefixo_action ?> <?= $site->title ?> no Par - PA, <?= $site->prefixo_action ?> <?= $site->title ?> na Paraíba - PB, <?= $site->prefixo_action ?> <?= $site->title ?> no Paran - PR, <?= $site->prefixo_action ?> <?= $site->title ?> em Pernambuco - PE, <?= $site->prefixo_action ?> <?= $site->title ?> no Piau - PI, <?= $site->prefixo_action ?> <?= $site->title ?> no Rio de Janeiro - RJ, <?= $site->prefixo_action ?> <?= $site->title ?> no Rio Grande do Norte - RN, <?= $site->prefixo_action ?> <?= $site->title ?> no Rio Grande do Sul - RS, <?= $site->prefixo_action ?> <?= $site->title ?> em Rondônia - RO, <?= $site->prefixo_action ?> <?= $site->title ?> em Roraima - RR, <?= $site->prefixo_action ?> <?= $site->title ?> em Santa Catarina - SC, <?= $site->prefixo_action ?> <?= $site->title ?> em São Paulo - SP, <?= $site->prefixo_action ?> <?= $site->title ?> em Sergipe - SE, <?= $site->prefixo_action ?> <?= $site->title ?> em Tocantins - TO, supply chain de <?= $site->prefixo_action ?> <?= $site->title ?>, suprimentos de <?= $site->prefixo_action ?> <?= $site->title ?>, empresas do agronegócio. ">
	<META NAME="Author" CONTENT="https://www.<?= $site->url ?>.agr.br/">
	<META HTTP-EQUIV="Reply-to" CONTENT="agro@agro.agr.br">
</head>
<body>
	<div class="main">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<div class="navbar-brand">
					<a href="https://www.agro.agr.br"><img src="<?= $url ?>/assets/img/logo-agro.png" alt="Agro Agr"></a>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-mobile" > 
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="<?= $url_base ?>"> Home</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.agro.agr.br/empresa"> Empresa</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.produtos.agr.br"> Produtos</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.fornecedores.agr.br"> Fornecedores</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.contratos.agr.br"> Contratos</a>
					</li>
					<li class="nav-item">
						<a style="padding:15px;" class="nav-link" href="https://www.agro.agr.br/admin"> Login</a>
					</li>
				</ul>
			
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.facebook.com/agroagrbr"><i class="fab fa-2x fa-facebook-square"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.twitter.com/AgroAgrbr"><i class="fab fa-2x fa-twitter-square"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.youtube.com/AgroAgrbr"><i class="fab fa-2x fa-youtube-square"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.linkedin.com/company/agroagrbr"><i class="fab fa-2x fa-linkedin"></i></a>
					</li>
				</ul>
			</div> 
			</div>
		</nav>