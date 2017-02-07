<?php if($menu['id'] = 1)
{
  ?> <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php $n = sizeof($LesImages);
      for ($i=0; $i < $n; $i++)
      {
        $leContenu = $LesContenus[$i];
        $image = $LesImages[$i];
        if($i == 0)
        {
          $class = "item active";
        }
        else
        {
          $class = "item";
        }
        ?> <div class="<?php echo $class ?>">
            <img src="<?php echo $image['lImage'] ?>" alt="Musique&Co">
            <div class="carousel-caption">
              <h3><?php echo  $leContenu['titre'] ?></h3>
              <p><?php echo  $leContenu['leContenu'] ?></p>
            </div> 
          </div> <?php
      }?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Précédent</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Suivant</span>
    </a>
  </div> <?php
}
else
{
  foreach($LesImages as $image)
  {
    ?><div class="bandeau-inner">
		    <img src="<?php echo $image['lImage'] ?>" alt="Musique&Co">
	    </div><?php
  }
}?>