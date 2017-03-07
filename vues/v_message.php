<style>
    blockquote{
        border-left:none;
    }

    .quote-badge{
        background-color: rgba(0, 0, 0, 0.2);   
    }

    .quote-box{
        overflow: hidden;
        margin-top: -50px;
        padding-top: -100px;
        border-radius: 17px;
        background-color: #f4511e;
        margin-top: 25px;
        color:white;
        width: 300px;
        box-shadow: 2px 2px 2px 2px #E0E0E0;
    }

    .quotation-mark{
        margin-top: -20px;
        font-weight: bold;
        font-size:70px;
        color:white;
        font-family: "Times New Roman", Georgia, Serif;
    }

    .quote-text{
        font-size: 19px;
        margin-top: -65px;
    }
    .containerMessage {
        position: fixed;
		top: 30%;
		right: 0;
        z-index:4;
    }
</style>
<div class="containerMessage">
    <blockquote class="quote-box">
      <?php
      if($app['couteauSuisse']->estConnecte())
      {
        ?> <div class="pull-right">
          <a href="modifierMessage/<?php echo $leContenu['id'] ?>" title="ModifierMessage"><span class="glyphicon glyphicon-pencil"></span></a>
        </div>
        <?php
      }?>
      <p class="quotation-mark">
        “
      </p>
      <p class="quote-text">
        <?php echo $message['libelle']; ?>
      </p>
      <hr>
      <div class="blog-post-actions">
        <p class="blog-post-bottom pull-left">
          <?php echo $message['titre']; ?>
        </p>
        <p class="blog-post-bottom pull-right">
          <span class="glyphicon glyphicon-music"></span>
        </p>
      </div>
    </blockquote>
</div>