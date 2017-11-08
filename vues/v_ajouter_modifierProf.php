<!-- Container -->
<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-45});
      } else {
        $('#voiceBtn').hide();
      }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
    initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-47454140-4', 'github.io');
  ga('send', 'pageview');
</script>
<script>
  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
 </script>

<script>
  !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
<script>
  $(document).on('ready', function() {
    $("#image").fileinput({
        previewFileType: "image",
        browseClass: "btn btn-success",
        browseLabel: "Choisir une image",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        removeClass: "btn btn-danger",
        removeLabel: "Supprimer",
        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
        uploadClass: "btn btn-info",
        uploadLabel: "Charger",
        uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> "
    });
  });
</script>

<?php
if(isset($idProf))
{
  $action = "validerModifProf-".$idProf;
}
else
{
  $action = "validerAjoutProf";
}

?>

<div id="band" class="container text-center">
  <br>
    <h3>Professeur</h3>
    <br>

    <form action="<?php echo $action ?>" method="post">
    
    <div class="form-group col-sm-offset-4 col-sm-4">
      <label for="nom">Nom :</label>
      <input type="text" class="form-control" id="nom" name ="nom" placeholder="Nom" value="<?php if(isset($idProf)) { echo $leProf['nom']; } ?>" maxlength="40">
    </div>

    <div class="form-group col-sm-offset-4 col-sm-4">
      <label for="prenom">Prénom :</label>
      <input type="text" class="form-control" id="prenom" name ="prenom" placeholder="Prénom" value="<?php if(isset($idProf)) { echo $leProf['prenom']; } ?>" maxlength="40">
    </div>

    <div class="form-group col-sm-offset-4 col-sm-4">
      <label for="discipline">Discipline :</label>
      <textarea type="text" class="form-control" id="discipline" name ="discipline" placeholder="La(/les) discipline(s) du professeur" ><?php if(isset($idProf)) { echo $leProf['discipline']; } ?></textarea>
    </div>
    
    <div class="form-group col-sm-offset-4 col-sm-4">
      <label class="control-label" for="image">Image :</label>
      <input type="file" accept="image/*" class="file-loading" id="image" name ="image"> <br>

        <span class="glyphicon glyphicon-alert"></span> <br>
        <p> Veillez à répertorier l'image dans le dossier de destination suivante : "../public/images/profs/"</p>
      <?php
      if(isset($idProf)) 
      { 
        ?> <p> <i class="glyphicon glyphicon-alert"></i> Si aucun lien n'est choisis, la photo restera la même que la précédente </p> <?php
      }
      ?>
    </div>

    <button type="submit" class="btn btn-default">
        <i class="glyphicon glyphicon-ok"></i> Valider
    </button>

  </form>
</div>