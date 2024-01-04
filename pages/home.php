<?php 
    $parametros = \Views\mainView::$par;
?>
<section class="lista-imoveis">
<div class="container">
    <h2 class="title-busca">Listando <b><?php echo count($parametros['imoveis']); ?> imóveis</b></h2>
    <?php 
        foreach ($parametros['imoveis'] as $key => $value){
        $imagem = \MySql::conectar()->prepare("SELECT imagem FROM `tb_admin.imagens_imoveis` WHERE imovel_id = $value[id]");
        $imagem->execute();
        $imagem = $imagem->fetch()['imagem'];
    ?>
    <div class="row-imoveis">
        <div class="r1">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $imagem; ?>" alt="">
        </div>
        <div class="r2">
            <p><i class="fa fa-info"></i> Nome do Imóvel: <?php echo $value['nome']; ?></p>
            <p><i class="fa fa-info"></i> Área: <?php echo $value['area']; ?>m²</p>
            <p><i class="fa fa-info"></i> Preço: R$<?php echo \Painel::convertMoney($value['preco']); ?></p>
        </div>
    </div><!--row-imoveis-->
    <?php } ?>
</div><!--container-->
</section>