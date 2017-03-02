<!-- Container -->
<div id="band" class="container text-center">
    <h3><?php echo  $nomDuMenu ?></h3>
    <br>
    <form action="validerModif" method="post">
        <input type="hidden" name="idContenu" value="<?php echo $idContenu?>">
        <input type="hidden" name="idMenu" value="<?php echo $idMenu?>">
        <?php
        if(isset($leContenu['titre']))
        {
            ?> <br><p><em> <input type="text" value="<?php echo $leContenu['titre'] ?>" name="titre" <?php echo $leContenu['titre'] ?> maxlength="100"/> </em></p><br> <?php 
        }
        if(isset($leContenu['leContenu']))
        {
            ?><p><textarea value="<?php echo $leContenu['leContenu'] ?>" name="leContenu" rows="10" cols="100"> <?php echo $leContenu['leContenu'] ?> </textarea> </p><br> <?php 
        }?>
    </form>
</div>t