<?php
/**
 * User: Jacob
 */

$dsa_config_xml = simplexml_load_file(__DIR__ . "/dsa_config.xml") or die ("Error");
require_once __DIR__ . "/City.php";
require_once __DIR__ . "/Place_of_Interest.php";
require_once __DIR__ . "/Weather.php";
require_once __DIR__ . "/Twinning.php";

// Gets
$get_city = (string) $dsa_config_xml->addressing->get_city;
$get_place = (string) $dsa_config_xml->addressing->get_place_of_interest;

// Difference between dev and live
$host_;

switch ($_SERVER["HTTP_HOST"])
{
    case "localhost":
        $host_= $dsa_config_xml->environment->dev;
        break;
    case "web":
        $host_=$dsa_config_xml->environment->live;
        break;
    default:
        die("ERROR - HTTP HOST IS NOT VALID");
}

$base_url = $host_->base_url;
$base_path = $host_->base_path;
$url_ending = $host_->url_end;
$server_name = $host_->my_sql->server;
$database = $host_->my_sql->db;
$db_username = $host_->my_sql->un;
$db_pass = $host_->my_sql->pw;

$image_url = $dsa_config_xml->addressing->images_address;

require __DIR__ . "/database_connection.php";

$google_map_key = $dsa_config_xml->map_api_key;
$open_weather_key = $dsa_config_xml->weather_api_key;

if (count($cities) != 2) die("No more than two (2) cities are supported currently");

$city1 = $cities[0];
$city2 = $cities[1];

//$city1 = new City((string) $dsa_config_xml->city[0]->attributes()->name);
//$city1->setLat($dsa_config_xml->city[0]->attributes()->latitude);
//$city1->setLng($dsa_config_xml->city[0]->attributes()->longitude);
//$city1->setCountryCode("GBR");
//$city1->setCountry("United Kingdom");
//$city1->setWoeid($dsa_config_xml->city[0]->attributes()->woeid);
//$city1->setMainImage("http://www.investinportsmouth.co.uk/Images/Video%20600x400%20for%20homepage_tcm66-376946.jpg");
//$city1->setPlacesOfInterest(array(new Place_of_Interest("Test","Church",1,1),new Place_of_Interest("Another","Church",1,1)));

//$city2 = new City((string) $dsa_config_xml->city[1]->attributes()->name);
//$city2->setLat($dsa_config_xml->city[1]->attributes()->latitude);
//$city2->setLng($dsa_config_xml->city[1]->attributes()->longitude);
//$city2->setCountryCode("AUS");
//$city2->setCountry("Australia");
//$city2->setWoeid($dsa_config_xml->city[1]->attributes()->woeid);
//$city2->setMainImage("https://cache-graphicslib.viator.com/graphicslib/thumbs674x446/2230/SITours/sydney-tour-with-optional-sydney-harbour-lunch-cruise-in-sydney-115286.jpg");
//$city2->setPlacesOfInterest(array(new Place_of_Interest("Opera House","Church",-33.856460,151.215285),new Place_of_Interest("Another","Church",-33.8694803,151.2070441)));
?>
