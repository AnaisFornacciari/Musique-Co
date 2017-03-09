<script>
    $('button').click(function(){
    $('.quote-box').toggle();
    });
</script>

<div class="containerMessage">
    <button class="btn btn-primary">Bouton</button>
    <blockquote class="quote-box">
      <?php
      if($app['couteauSuisse']->estConnecte())
      {
        ?> <div class="pull-right">
          <a href="modifierMessage" title="Modifier le message"><span class="glyphicon glyphicon-pencil"></span></a>
        </div>
        <?php
      }?>
      <p class="quotation-mark">
        “
      </p>
      <p class="quote-text">
        <?php echo $message['contenu']; ?>
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