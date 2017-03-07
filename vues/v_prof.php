<!-- Container (The Band Section) -->
<br><br>
<div id="band" class="container text-center">
  <h3><b><?php echo  $nomDuMenu ?></b></h3>
  <br>
  <div class="row">
  <?php foreach($LesProfs as $leProf)
  {?>
    <div class="col-sm-4">
      <?php
      if($app['couteauSuisse']->estConnecte())
      {
        ?> <div class="pull-right">
          <a href="modifierProf/<?php echo $leProf['id'] ?>" title="ModifierProf"><span class="glyphicon glyphicon-pencil"></span></a>
        </div>
        <?php
      }?>
      <p class="text-center"><strong><?php echo $leProf['nom']." ".$leProf['prenom']?></strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="<?php echo $leProf['image'] ?>" class="img-circle person" alt="professeur" width="255" height="255">
      </a>
      <div>
        <p><b>Discipline :</b></p>
        <p><?php echo $leProf['discipline'] ?></p>
      </div>
    </div><?php
  }?>
  </div>
</div>
