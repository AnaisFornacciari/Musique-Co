<!-- Container -->
<div id="band" class="container text-center">
  <h3><?php echo  $nomDuMenu ?></h3>
  <div class="row">
  <?php foreach($LesContenus as $leContenu)
  {
    $contenu = $app['couteauSuisse']->truncate($leContenu['leContenu'], 400, '...', true); //tronque le contenu "news" si ce dernier dépasse les 400 caractères
    ?><div class="col-sm-4">
      <p class="text-center"><strong><?php echo  $leContenu['titre'] ?></strong></p><br>
      <div>
        <p><?php echo $contenu ?></p>
      </div><?php 
      if(strlen($leContenu['leContenu']) > 400) //si le contenu dépasse les 400 caractères : "Lire la suite..." + modal
      {
        ?> <div class="text-center"> <button class="btn" data-toggle="modal" data-target="#myModal-<?php echo $leContenu['id'] ?>">Lire la suite...</button> </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal-<?php echo $leContenu['id'] ?>" role="dialog"> <!-- modal avec le contenu entier de la "news" -->
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><?php echo  $nomDuMenu ?></h4>
              </div>
              <div class="modal-body">
                <center><h5><i> <?php echo $leContenu['titre'] ?> </i></h5></center>
                <p> <?php echo $leContenu['leContenu'] ?> </p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                  <span class="glyphicon glyphicon-remove"></span> Quitter
                </button>
                <p><?php echo $leContenu['dateAjout']; ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php
      }?>
    </div><?php
  }?>
  </div>
</div>