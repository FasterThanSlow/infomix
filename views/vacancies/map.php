<?php
    use yii\helpers\Html;
    //echo '<pre>'. print_r($vacancies,true).'</pre>'
?>
<div id="map" style="height: 700px;width: 100%;"></div>
<script>
    var map;
   
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 53.9020156, lng: 27.546901},
            zoom: 12
        });
        
        var locations  = [
            <?php foreach ($vacancies as $vacancy): ?>
                <?php
                    if(!empty($vacancy->addresses)){
                        $address = $vacancy->addresses[0];
                        if(!empty($address))
                            if(!empty($address->coordinates->latitude) && !empty($address->coordinates->latitude))
                                echo '{lat:'.$address->coordinates->latitude.', lng: '.$address->coordinates->longitude.'},';
                    }
                ?>
            <?php endforeach;?>
        ];
        
        var urls  = [
            <?php foreach ($vacancies as $vacancy): ?>
                <?php
                    if(!empty($vacancy->addresses)){
                       echo '"http://localhost/infomix/vacancies/view?id='.$vacancy->id.'&expiriencies_id='.$vacancy->expiriencies_id.'&education_id='.$vacancy->education_id.'&organizations_id='.$vacancy->organizations_id.'&statuses_id='.$vacancy->statuses_id.'&members_id='.$vacancy->members_id.'",';
                    }
                ?>
            <?php endforeach;?>
        ];
        
        var markers = locations.map(function(location, i) {
          marker = new google.maps.Marker({
            position: location,
            url: urls[i]
          });
          google.maps.event.addListener(marker, 'click', function() {
            window.location.href = this.url;
          });
          return marker;
        });
        
       
        
        
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    }
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBICl-lNoVjJdUDHZZpE0KgKXhH1ix52vw&callback=initMap" async defer></script>
