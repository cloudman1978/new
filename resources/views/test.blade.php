<!DOCTYPE html>
<html>
<head>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

  <title>test maps</title>
  <script type="text/javascript">
var geocoder;
var map;
// initialisation de la carte Google Map de départ
function initialiserCarte() {
  geocoder = new google.maps.Geocoder();
  // Ici j'ai mis la latitude et longitude du vieux Port de Marseille pour centrer la carte de départ
  var latlng = new google.maps.LatLng(36.800519, 10.179326);
  var mapOptions = {
    zoom      : 14,
    center    : latlng,
    mapTypeId : google.maps.MapTypeId.ROADMAP
  }
     var options = {

   types: ['(cities)'],

   componentRestrictions: {country: 'tn'}

};

var input = document.getElementById('adresse');

autocomplete = new google.maps.places.Autocomplete(input, options);
  // map-canvas est le conteneur HTML de la carte Google Map
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

function TrouverAdresse() {
  // Récupération de l'adresse tapée dans le formulaire
  var adresse = document.getElementById('adresse').value;
  geocoder.geocode( { 'address': adresse}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      // Récupération des coordonnées GPS du lieu tapé dans le formulaire
      var strposition = results[0].geometry.location+"";
      strposition=strposition.replace('(', '');
      strposition=strposition.replace(')', '');
      // Affichage des coordonnées dans le <span>
      document.getElementById('text_latlng').innerHTML='Coordonnées : '+strposition;
      // Création du marqueur du lieu (épingle)
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Adresse introuvable: ' + status);
    }
  });
}
// Lancement de la construction de la carte google map
google.maps.event.addDomListener(window, 'load', initialiserCarte);
</script>
</head>
<body>
<form>
  <input type="text" id="adresse"/>
  <input type="button"  value="Localiser sur Google Map" onclick="TrouverAdresse();"/>
</form>
<span id="text_latlng"></span>
<div id="map-canvas" style="float:right;height:220px;width:45%"></div>

</body>
</html>