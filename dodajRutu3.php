<?php
  include("conn.php");
  
  if(isset($_POST["dodajMjesto"]))
  {
    $idVozaca       = $_SESSION["id"];
    $polaziste      = $_GET["polaziste"];
    $drzava         = $_GET["drzava"];
    $datumPolaska   = $_GET["datumPolaska"];
    $vrijemePolaska = $_GET["vrijemePolaska"];
    $nacinPlacanja  = $_GET["placanje"];
    $odrediste      = $_POST["odrediste"];

    $sql = "INSERT INTO rute (idVozaca, polaziste, odrediste, datum, vrijeme, drzava, nacinPlacanja) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $spremna2 = $conn->prepare($sql);
    $spremna2->bind_param('issssss', $idVozaca, $polaziste, $odrediste, $datumPolaska, $vrijemePolaska, $drzava, $nacinPlacanja);
    $spremna2->execute();
    $spremna2->close();

    header("location:pocetna.php");
  }
  
  include("header.php");
?>

    <div id="pozicija">
      <form method="post">
        <br>
        <input id="pac-input" name="odrediste" class="controls" type="text" placeholder="Odredište">
        <br><br>
        <input type="submit" id="dugme" name="dodajMjesto" value="Dodaj odredište">
      </form>
    </div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initAutocomplete() {
        /*var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });*/

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }
          
          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjLcd_ChTBifIsHeGhroL1nf8kP58vroM&libraries=places&callback=initAutocomplete"
         async defer></script>
  </body>
</html>