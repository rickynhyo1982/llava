<!DOCTYPE html>
<html lang="<?php echo $this->lang->lang(); ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Sala Charivari</title>
        <?php load_view('/includes/head') ?>
        <meta name="description" content="<?php echo strip_tags($la_sala_text); ?>">
        <!-- FancyBox -->
        <link rel="stylesheet" href="/resources/style/js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <!-- Flexslider -->
        <link rel="stylesheet" href="/resources/style/css/flexslider.css?v=2.1.5" type="text/css" media="screen" />
        <!-- jQuery -->
        <script src="/resources/style/js/jquery.min.js"></script>
    </head>
    <body>
        <div>
            <header>
                <div class="grid-container">
                    <div id="main-header" class="grid-100 grid-parent box" style="background-image: url(/resources/uploads/carrusel/<?php $img_rand=$carrusel_data[0]; echo $img_rand['car_imagen']; ?>);">
                        <?php load_view('/includes/languaje_selector') ?>
                        <div class="grid-100 grid-parent">
                            <div id="main-title" class="grid-40">
                                <h1><?php echo anchor('/', '<img src="/resources/style/img/logo.png" />', array('id'=>'logo'))?></h1>
                            </div>
                        </div>
                        <div class="separator-60"></div>
                        <div class="clear"></div>
                    </div>
                    <div class="grid-100">
                            <div id="search-box">
                                <?php echo form_open('buscar', array('method'=>'get')); ?>
                                    <fieldset>
                                        <ul>
                                            <li><input type="text" id="search-input" name="q" value="" class="width-150"><input type="submit" value="Buscar" class="button-link float-right"></li>
                                            <hr>
                                        </ul>
                                    </fieldset>
                                <?php echo form_close();?>
                            </div>
                            <nav id="main-nav">
                                <ul>
                                    <li class="man-nav-option"><?php echo anchor('inicio', 'Inicio')?></li>
                                    <li class="man-nav-option"><?php echo anchor('inicio#programacion', 'Programación') ?></li>
                                    <li class="man-nav-option"><?php echo anchor('sala', 'La sala') ?></li>
                                    <li class="man-nav-option"><?php echo anchor(current_url().'#contact-form', 'Contacto') ?></li>
                                </ul>
                            </nav>
                            <div class="clear"></div>
                        </div>
                </div>    
            </header>
            <div id="main-content" class="wrapper odd">
                <div class="grid-container">
                    <div class="grid-100">
                        <div class="grid-100 grid-parent">
                            <div class="separator-40"></div>
                            <?php if(!empty($programacion)) { ?>
                            <div class="grid-100 grid-parent white-veil">
                                <div class="separator-20"></div>
                                <?php 
                                $i = 0;
                                foreach ($programacion as $row) {	
                                    if($i==0) {
                                ?>
                                <div class="grid-100 grid-parent">
                                <?php
                                    } 
                                ?>
                                    <div class="grid-10">
                                        <div class="grid-100 grid-parent show">
                                            <?php echo anchor('espectaculos/'.$row['cid_uri_segment'], '<img src="/resources/uploads/contenido/'.$row['cnt_imagen_principal'].'"/>', array('display'=>'block'));?>
                                        </div>
                                    </div>
                                <?php
                                    if($i==9) {
                                ?>
                                </div>
                                <div class="separator-20"></div>
                                <?php
                                    }
                                    if($i==9) {
                                        $i=0;
                                    } else {
                                        $i++;
                                    }
                                }
                                if((count($programacion)%10)!=0) {
                                ?>
                                </div>
                                <?php
                                }
                                ?>
                            <div class="separator-20"></div>
                            </div>
                            <?php } ?>
                            <div class="separator-40"></div>
                            <h2><?php echo $espectaculo_data['cid_titulo']; ?></h2>
                            <div class="grid-50">
                                <?php if(!empty($espectaculo_imagenes_data)) { ?>
                                <div class="flexslider">
                                    <ul class="slides">
                                      <?php foreach ($espectaculo_imagenes_data as $row) { 					
                                    if($i==0) {
                                ?>
                                <div class="grid-100 grid-parent">
                                <?php
                                    } 
                                ?>
                                    <div class="grid-25 thumnail-container">
                                        <a class="fancybox" rel="gallery1" href="/resources/uploads/contenido/<?php echo $row['cim_imagen']; ?>">
                                            <img class="lupa" src="/resources/style/img/lupa.png">
                                            <img src="/resources/uploads/contenido/<?php echo $row['cim_thumnail']; ?>" class="thumbnail" />
                                        </a>
                                    </div>
                                <?php
                                    if($i==3) {
                                ?>
                                </div>
                                <div class="separator-20"></div>
                                <?php
                                    }
                                    if($i==3) {
                                        $i=0;
                                    } else {
                                        $i++;
                                    }
                                }
                                if((count($espectaculo_imagenes_data)%4)!=0) {
                                    ?>
                                    </div>
                                    <?php
                                    }
                                ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                            <h2>saldran las fotos?</h2>
                            
                            <li data-thumb="/resources/uploads/contenido/<?php echo $row['cim_thumnail']; ?>">
                            <img src="/resources/uploads/contenido/<?php echo $row['cim_imagen']; ?>" />
                            <h2>han salido las fotos</h2>
                            <div class="grid-50">
                                <div class="grid-100">
                                    <?php echo empty($espectaculo_data['cid_descripcion'])?$espectaculo_data['cid_descripcion_corta']:$espectaculo_data['cid_descripcion']; ?>
                                </div>
                                <?php if(!empty($espectaculo_videos_data)) { ?>
                                <div class="grid-100 grid-parent">
                                    <h3><?php echo lang('videos'); ?></h3>
                                    <?php 
                                    $i = 0;
                                    foreach ($espectaculo_videos_data as $row) { 					
                                        if($i==0) {
                                    ?>
                                    <div class="grid-100 grid-parent">
                                    <?php
                                        } 
                                    ?>
                                        <div class="grid-25">
                                            <a class="various fancybox.iframe" href="<?php echo parse_video($row['cvi_video']); ?>">
                                                <img src="/resources/uploads/contenido/<?php echo $row['cvi_thumnail']; ?>" class="thumbnail" />
                                            </a>
                                        </div>
                                    <?php
                                        if($i==2) {
                                    ?>
                                    </div>
                                    <div class="separator-20"></div>
                                    <?php
                                        }
                                        if($i==2) {
                                            $i=0;
                                        } else {
                                            $i++;
                                        }
                                    }
                                    if((count($espectaculo_videos_data)%3)!=0) {
                                        ?>
                                        </div>
                                        <?php
                                        }
                                    ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div id="ventaentradas" class="grid-100 grid-parent">
                        <div class="separator-40"></div>
                        <h2>Venta de entradas</h2>
                        <div class="grid-100 grid-parent">
                            <?php echo $venta_entradas_text; ?>
                            <div class="separator-20"></div>
                            <table>
                                <thead>
                                    <tr><th class="text-align-left" colspan="5">Comprar entradas online</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach($fechas_eventos_data as $row) { ?>
                                    <tr>
                                        <td><?php echo fotmat_fecha($row['evf_fecha_hora']); ?></td>
                                        <td class="text-align-right"><?php echo fotmat_hora($row['evf_fecha_hora']); ?></td>
                                        <td><?php echo $row['cid_titulo']; ?></td>
                                        <?php 
                                            $precio_evento =  $row['eve_precio_area1'];
                                            if($row['eve_precio_area2'] > 0 && $row['eve_precio_area2'] < $precio_evento) {
                                                $precio_evento = $row['eve_precio_area2'];
                                            }
                                            if($row['eve_precio_area3'] > 0 && $row['eve_precio_area3'] < $precio_evento) {
                                                $precio_evento = $row['eve_precio_area3'];
                                            }
                                            if($row['eve_precio_area4'] > 0 && $row['eve_precio_area4'] < $precio_evento) {
                                                $precio_evento = $row['eve_precio_area4'];
                                            }
                                        ?>
                                        <td>Desde <?php echo $precio_evento ?> &euro;</td>
                                        <td class="text-align-right last-child"><?php echo anchor(site_url('compra/'.$row['evf_id_fecha_evento']), 'Comprar entradas', array('class'=>'button-link'));?></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if(empty($fechas_eventos_data)) { ?>
                                    <tr>
                                        <td colspan="5">No hay pases para este espectáculo</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="separator-40"></div>
                        </div>
                    </div>
                </div>
                <div class="wrapper white-veil">
                    <div class="separator-20"></div>
                    <div class="grid-container">
                        <div class="grid-100 grid-parent">
                            <div class="grid-50">
                                <h3><?php echo lang('en_las_redes_sociales'); ?></h3>
                            <div class="float-left social-go">
                                <?php 
                                $i = 1;
                                foreach ($enlaces_sociales_link as $row) {	
                                ?>
                                <a href="<?php echo $row['enl_destino']; ?>" target="social<?php echo $i ?>" title="<?php echo $row['enl_texto']; ?>"><img src="/resources/uploads/enlaces/<?php echo $row['enl_icono']; ?>" alt="<?php echo $row['enl_texto']; ?>"></a>
                                <?php 
                                $i++;
                                } ?>
                            </div>
                            <div class="clear"></div>
                            </div>
                            <div class="grid-50">
                                <h3><?php echo lang('compartir'); ?></h3>
                                <div class="float-left social-share">
                                    <a href="http://www.facebook.com/share.php?u=<?php echo current_url(); ?>" target="facebook" title="Compartir en Facebook"><img src="/resources/style/img/facebook_icon.png" alt="Icono de Facebook"></a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo current_url(); ?>" target="twitter" title="Compartir en Twitter"><img src="/resources/style/img/tweeter_icon.png" alt="Icono de Twitter"></a>
                                </div>
                            </div>
                        </div>
                        <div class="separator-20"></div>
                    </div>
                </div>
        </div>
        <?php load_view('/includes/footer') ?>
        
        <?php load_view('/includes/cookies') ?>
        
        <!-- FlexSlider -->
        <script defer src="/resources/style/js/jquery.flexslider-min.js"></script>
        
        <!-- Fancybox -->
        <script type="text/javascript" src="/resources/style/js/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="/resources/style/js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails",
                    slideshow: true,
                    directionNav: false
                  });
                
                $(".fancybox").fancybox({
                        openEffect	: 'none',
                        closeEffect	: 'none'
                });

                $(".various").fancybox({
                        fitToView	: false,
                        width		: '70%',
                        height		: '70%',
                        autoSize	: true,
                        closeClick	: false,
                        openEffect	: 'none',
                        closeEffect	: 'none'
                });
            });
            
            $(".thumnail-container").hover(function () {
                $(this).find(".lupa").show("fast");}, function() {
                $(this).find(".lupa").hide("fast");
            });
        </script>
        <?php load_view('/includes/scripts') ?>
    </body>
</html>