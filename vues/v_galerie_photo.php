<script type="text/javascript"> 
  jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        $('#carousel-text').html($('#slide-content-0').html());
 
        //Handles the carousel thumbnails
       $('[id^=carousel-selector-]').click( function(){
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });
 
 
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
    });
</script>
<br><br>
<div data-spy="scroll" data-target="#myScrollspy" data-offset="20">

    <nav class="navbar-fixed-top col-sm-1" id="myScrollspy">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#photos">Photos</a></li>
        <li><a href="#videos">Vidéos</a></li>
        <li><a href="#audios">Audios</a></li>
      </ul>
    </nav>

    <div id="band" class="container text-center">
        <h3><b><?php echo  $nomDuMenu ?></b></h3>
    </div>

    <div id="photos" class="container text-center" style="width:100%;">
        <?php 
        if($app['couteauSuisse']->estConnecte())
        {
            ?>
            <div class="pull-right">
            <a href="ajouterPhoto" title="Ajouter une ou des photos"><span class="glyphicon glyphicon-plus"></span></a>
            </div>
            <?php
        }
        ?>
        <h3> PHOTOS </h3>
        <br>
        <div id="main_area">
            <!-- Slider -->
            <div class="row">
                <div class="col-xs-12" id="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" id="carousel-bounding-box">
                            <div class="carousel slide" id="myCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <?php
                                    $numberSlide = 0;
                                    foreach($LesImages as $image)
                                    {
                                        if($numberSlide == 0) //permet de définir la première image du carousel en "item active" et le reste en simple "item"
                                        {
                                        $class = "active item";
                                        }
                                        else
                                        {
                                        $class = "item";
                                        }
                                        ?> <div class="<?php echo $class ?>" data-slide-number="<?php echo $numberSlide ?>">
                                        <img src="<?php echo $image['lImage'] ?>"></div><?php
                                        $numberSlide++;
                                    }?>

                                </div><!-- Carousel nav -->
                                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>                                       
                                </a>
                                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>                                       
                                </a>                                
                                </div>
                        </div>

                        
                    </div>
                </div>
            </div><!--/Slider-->

            <div class="row hidden-xs" id="slider-thumbs">
                    <!-- Bottom switcher of slider -->
                    <ul class="hide-bullets">
                    <?php $numberSlide = 0;
                    foreach($LesImages as $image)
                    {
                        ?><li class="col-sm-2">
                            <a class="thumbnail" id="carousel-selector-<?php echo $numberSlide ?>"><img src="<?php echo $image['lImage'] ?>"></a>
                        </li><?php
                        $numberSlide++;
                    }?>
                    </ul>                 
            </div>
        </div>
    </div>

</div>