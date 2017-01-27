<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h3><?php echo  $nomMenu ?></h3>
  <br>
  <?php foreach($contenu as $leContenu)
  {
    if(isset($leContenu['titre']))
    {
      ?> <br><p><em><?php echo  $leContenu['titre'] ?></em></p><br> <?php 
    }
    if(isset($leContenu['leContenu']))
    {
      ?><p><?php echo  $leContenu['leContenu'] ?></p><br> <?php 
    }
  }?>
</div>