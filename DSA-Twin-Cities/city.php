<?php
/**
 * User: Jacob
 * github.com/coobie
 */

require_once __DIR__ . '/includes/config.php';

//Check city is provided in the URL and that it is one of the ones we are using
if (isset($_GET[$get_city]))
{
    $twin = $_GET[$get_city];

    if ($twin == $city1->getName())
    { //City is city 1
        $city = $city1;

    }
    elseif ($twin == $city2->getName())
    { // City is city 2
        $city = $city2;
    }
    else
    { //City is not correct
        header("Location: $base_url/404/");
        die();
    }
    $title = $city->getName();
    $currentPage = $city->getName();
}
else
{
    header("Location: $base_url/404/");
    die();
}

require_once $base_path . '/templates/head.php';
require_once $base_path . '/templates/header.php';
require_once $base_path . '/templates/top_nav_bar.php';
require_once $base_path . '/templates/page_content.php';

//Info about the city:
?>

<h1 class="page_title"><?php echo $city->getName(); ?></h1>
<h3 class="page_title"><a href="http://www.google.com/search?q=<?php echo str_replace(" ","+",$city->getCountry());?>" target="_blank"><?php echo $city->getCountry(); ?></a></h3>

<script src="<?php echo($base_url.'scripts/weather.js') ?>"></script>
<script> makeGetRequest(<?php echo("'".$base_url."',"."'".$city->getName()."','".$city->getCountryCode()."')");?>;</script>

<div class="row">
    <div class="column left">
        <img class="city_image" src="<?php echo($city->getMainImage());?>" alt="<?php echo($city->getImageAlt());?>">
        <p><?php echo $city->getImageAlt(); ?></p>
    </div>
    <div class="column right">
        <div class="desc_city">
            <h2>Description</h2>
            <p><?php echo $city->getDesc(); ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="column left">
        <a href="https://www.google.com/maps/dir//<?php echo($city->getLat().','.$city->getLng());?>" target="_blank">
            <img id="city_static_map" src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo($city->getLat().','.$city->getLng()); ?>&zoom=13&maptype=hybrid&format=png&size=640x640&key=<?php echo($google_map_key);?>" alt="Static map of <?php echo($city->getName());?>"></a>
        <p>Picture map of <?php echo $city->getName(); ?></p>
    </div>
    <div class="column right">
        <h2><span class="glyphicon glyphicon-cloud"></span> Weather</h2>
        <div id="city_weather"></div>
        <a href="javascript:makeGetRequest(<?php echo("'".$base_url."',"."'".$city->getName()."','".$city->getCountryCode()."')");?>" >Reload Weather</a>
        <div class="stats_city">
                <?php
                echo ('<h2><span class="glyphicon glyphicon-stats"></span> Stats about '.$city->getName().'</h2>');
                echo ("<p>Population: ".number_format($city->getPopulation())."<br>");
                echo ("Area: ".number_format($city->getArea())."km<sup>2</sup><br>");
                echo ("Population Density: ".number_format($city->getPopDensity())."/km<sup>2</sup><br>");
                echo ("Currency: ".$city->getCurrency()."<br>");
                ?>
            </p>
        </div>
        <div class="more_info_city">
            <?php
                echo('<h3>More information about '.$city->getName().':</h3>');
                echo ('<a href="'.$city->getWebsite().'" target="_blank"><span class="glyphicon glyphicon-globe"></span> '.$city->getName().' website</a><br>');
                echo ('<a href="'.$city->getWikiLink().'" target="_blank"><span class="glyphicon glyphicon-link"></span> '.$city->getName().' Wikipedia</a><br>');
                echo ('<a href="'.$city->getGoogleMapsLink().'" target="_blank"><span class="glyphicon glyphicon-map-marker"></span> '.$city->getName().' Google Maps</a><br>');
            ?>
        </div>
    </div>
</div>
<h3>Places of interest in and around <?php echo $city->getName(); ?></h3>
<div id="city_interactive_map"></div>
<script>
    //Used google maps documentation for this
    var lat = <?php echo $city->getLat(); ?>;
    var lng = <?php echo $city->getLng(); ?>;
    var position = {lat: lat, lng: lng};

    function initCityMap() {

        var temp_styles = [
            {
                "featureType": "poi",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            }
        ];

        var city_map_interactive = new google.maps.Map(document.getElementById('city_interactive_map'), {
            zoom: 13,
            styles: temp_styles,
            center: position
        });

        function addPOIMarker(lat,lng,name,icon, sdesc, link) {
            var temp_poi_position = {lat: lat, lng: lng};
            // Add the marker at the clicked location, and add the next-available label
            // from the array of alphabetical characters.

            var temp_marker = new google.maps.Marker({
                position: temp_poi_position,
                title: name,
                icon: icon,
                map: city_map_interactive
            });

            var temp_marker_infowindow = new google.maps.InfoWindow({
                content: sdesc + link
            });

            temp_marker.addListener('click', function() {
                temp_marker_infowindow.open(city_map_interactive, temp_marker);
            });
            temp_marker.addListener('mouseout', function() {
                window.setTimeout(function(){
                    temp_marker_infowindow.close();
                },5500);
            });
        }

        <?php //Add places of interest to the map
        foreach ($city->getPlacesOfInterest() as $temp)
        {
            $temp_desc = "<strong>".$temp->getName().", ".$city->getName().", ".$city->getCountryCode()."</strong><br>".$temp->getSdesc();
            $temp_link = "<br><a href='".$base_url."place_of_interest".$url_ending."?".$get_city."=".$city->getName()."&".$get_place."=".str_replace(" ","+",$temp->getName())."'>More Details about ".$temp->getName()."</a>";
            echo('addPOIMarker('.$temp->getLat().','.$temp->getLng().',"'.$temp->getName().'","'.$temp->getMapIcon().'","'.$temp_desc.'","'."$temp_link".'");');
        }
        ?>

    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_map_key ?>&callback=initCityMap">
</script>
    <p>Maps Icons Collection <a href="https://mapicons.mapsmarker.com">https://mapicons.mapsmarker.com</a></p>
<div class="places_of_interest">
    <br><h4>Places of interest listed</h4>
    <ul>
        <?php //List all of the places of interest
        foreach ($city->getPlacesOfInterest() as $place)
        {
            echo('<li><a href="'.$base_url."place_of_interest".$url_ending."?".$get_city."=".$city->getName()."&".$get_place."=".str_replace(" ","+",$place->getName()).'">'.$place->getName().' ['.$place->getCategory().']'.'</a></li>');
        }
        ?>
    </ul>
</div>


<?php require_once $base_path . '/templates/footer.php'; ?>