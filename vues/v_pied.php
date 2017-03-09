
  <!-- Division pour le pied de page -->

  <div class="bg-1">
    <div class="container">
      <?php
      if($app['couteauSuisse']->estConnecte())
      {
        ?> <div class="pull-right">
          <a href="modifierPied" title="Modifier le pied de page"><span class="glyphicon glyphicon-pencil"></span></a>
        </div>
        <?php
      }?>
      <p class="text-center"><?php echo $pied['contenu']; ?> </p>
    </div>
  </div>

  <div id="googleMap"></div>

  <!-- Add Google Maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2yZoUALgcJnxzixepkboDyc0cSz6vqKE&callback=initMap" type="text/javascript" async defer></script>
  <script>
    function initMap() 
    {
        var latLng = new google.maps.LatLng(48.9306965, 2.4928865);
        var myOptions = 
        {
          zoom: 13,
          center: latLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('googleMap'), myOptions);
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });
      }
  </script>

  <!-- Footer -->
  <footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="Retour en haut">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>© 2017 - Musique And Co - Tous droits réservés</p> 
  </footer>

  <script>
    $(document).ready(function(){
      // Initialize Tooltip
      $('[data-toggle="tooltip"]').tooltip(); 
      
      // Add smooth scrolling to all links in navbar + footer link
      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function(){
      
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    })
  </script>

</body>
</html>