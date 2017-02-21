<!-- Container (The Band Section) -->
<br><br>
<div id="band" class="container text-center">
  <h3><?php echo  $nomDuMenu ?></h3>
  <div class="row">
  <?php foreach($LesProfs as $leProf)
  {?>
    <div class="col-sm-4">
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
