<?php 
    $parametros = \Views\mainView::$par;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/font-awesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Portal Imobiliário</title>
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>">
<header>
    <div class="container">
    <div class="logo"><a style="color:inherit;" href="<?php echo INCLUDE_PATH; ?>">Portal Imobiliário</a></div>
    <nav class="desktop">
        <ul>
        <?php
			$selectEmpreend = \MySql::conectar()->prepare("SELECT * FROM `tb_admin.empreendimentos` ORDER BY order_id ASC");
			$selectEmpreend->execute();
			$empreendimentos = $selectEmpreend->fetchAll();
			foreach ($empreendimentos as $key => $value) {
		?>
			<li><a href="<?php echo INCLUDE_PATH.$value['slug']; ?>"><?php echo $value['nome']; ?></a></li>
		<?php } ?>
        </ul>
    </nav>
    <div class="clear"></div>
    </div>
</header>

<section class="search1">
    <div class="container">
        <h2>O que você procura?</h2>
        <input type="text" name="texto-busca">
    </div>
</section>

<section class="search2">
    <div class="container">
        <form method="post" action="<?php echo INCLUDE_PATH ?>ajax/formularios.php">
            <div class="form-group">
                <label>Área Minima:</label>
                <input name="area_minima" type="number" min="0" max="100000" step="100"> 
            </div><!--form-group-->
            <div class="form-group">
                <label>Área Máxima:</label>
                <input name="area_maxima" type="number" min="0" max="100000" step="100"> 
            </div><!--form-group-->
            <div class="form-group">
                <label>Preço Minimo:</label>
                <input name="preco_min" type="text"> 
            </div><!--form-group-->
            <div class="form-group">
                <label>Preço Maximo:</label>
                <input name="preco_max" type="text"> 
            </div><!--form-group-->
            <?php 
                if(isset($parametros['slug_empreendimento'])){
                    echo '<input type = "hidden" name="slug_empreendimento" value="'.$parametros['slug_empreendimento'].'">';
                }
            ?>
            <div class="clear"></div>
        </form>
    </div>
</section>