
  <!-- Division pour le pied de page -->

  <div class="bg-1">
    <div class="container">
      <p class="text-center"><span class="glyphicon glyphicon-map-marker"></span>10 avenue Dumont Aulnay-Sous-Bois, France<br>
                            En transport : RER B arrêt Aulnay-Sous-Bois<br>
                            En voiture : sortie Aulnay centre (Autoroute A3/A1)<br>
                            Renseignements complémentaires : André <span class="glyphicon glyphicon-phone"></span> 06-71-78-29-30<br> 
      </p>
    </div>
  </div>

  <div id="googleMap"></div>

  <!-- Add Google Maps -->
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script>
    var myCenter = new google.maps.LatLng(48.856614, 2.352222);

    function initialize() {
    var mapProp = {
    center:myCenter,
    zoom:12,
    scrollwheel:false,
    draggable:false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var marker = new google.maps.Marker({
    position:myCenter,
    });

    marker.setMap(map);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>

  <!-- Footer -->
  <footer class="text-center">
    <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="Retour en haut">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </a><br><br>
    <p>© 2011 - Musique And Co - Tous droits réservés</p> 
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