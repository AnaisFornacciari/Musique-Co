<!-- Container -->
<div id="band" class="container text-center">
<?php
  if($app['couteauSuisse']->estConnecte())
  {
    ?>
    <div class="pull-right">
      <a href="ajouterContenu-<?php echo $idMenu ?>" title="Ajouter un contenu"><span class="glyphicon glyphicon-plus"></span></a>
    </div>
    <?php
  }
  ?>
  <h3><b><?php echo  $nomDuMenu ?></b></h3> 
  <?php 
  foreach($LesContenus as $leContenu)
  {
    if($leContenu['id'] < 4) //ne pas afficher le contenu du carousel
    {
      continue;
    }
    else
    {
      if($app['couteauSuisse']->estConnecte())
      {
        ?> 
        <div class="pull-right">
          <a href="supprimerContenu-<?php echo $leContenu['id'] ?>" title="Supprimer le contenu"><span class="glyphicon glyphicon-remove"></span></a>
        </div>
        <br>
        <div class="pull-right">
          <a href="modifierContenu-<?php echo $leContenu['id'] ?>" title="Modifier le contenu"><span class="glyphicon glyphicon-pencil"></span></a>
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