<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3><?php echo  $nomMenu ?></h3>
  <br><br>
  <?php foreach($contenu as $leContenu)
  {
    ?> <p><em><?php echo  $leContenu['titre'] ?></em></p><br>
    <p><?php echo  $leContenu['leContenu'] ?></p>
    <br> <?php
  }?>
</div>