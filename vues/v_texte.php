<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3><?php echo  $nomDuMenu ?></h3>
  <br>
  <?php foreach($LesContenus as $leContenu)
  {
    if($leContenu['idMenu'] == 1 and $leContenu['id'] < 4) //ne pas afficher le contenu du carousel
    {
      continue;
    }
    else
    {
      if($app['couteauSuisse']->estConnecte())
      {
        ?> <div class="pull-right">
          <a href="modifierContenu/<?php echo $leContenu['id'] ?>" title="Modifier"><span class="glyphicon glyphicon-pencil"></span></a>
        </div>
        <?php
      }
      if(isset($leContenu['titre']))
      {
        ?> <br><p><em><?php echo $leContenu['titre'] ?></em></p><br> <?php 
      }
      if(isset($leContenu['leContenu']))
      {
        ?><p><?php echo $leContenu['leContenu'] ?></p><br> <?php 
      }
    }
  }?>
</div>