<?php
/**
 * User: Jacob
 * github.com/coobie
 */

//include_once "config.php";

$cities = array();
try
{

    $conn = new PDO("mysql:host=$server_name;dbname=$database",$db_username, $db_pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //About the twinning (twinning table)
    $stmt_twinning = $conn->prepare("SELECT * FROM twinning INNER JOIN images ON twinning.image_id = images.image_id");
    $stmt_twinning->execute();

    $twinning = new Twinning();
    foreach ($stmt_twinning->fetchAll() as $t)
    { //Should only be one
        $twinning->setDesc($t['desc']);
        $twinning->setBanner($t['image_link']);
    }


    //Cities (city table)
    $stmt_city = $conn->prepare("SELECT * FROM city INNER JOIN images ON city.image_id = images.image_id");
    $stmt_city->execute();

    foreach ($stmt_city->fetchAll() as $item_city)
    {
        $temp_city = new City($item_city['name']);
        $temp_city->setLat($item_city['lat']);
        $temp_city->setLng($item_city['long']);
        $temp_city->setCountry($item_city['country']);
        $temp_city->setCountryCode($item_city['country_code']);
        $temp_city->setWoeid($item_city['woeid']);
        $temp_city->setWebsite($item_city['website']);
        $temp_city->setWikiLink($item_city['wiki']);
        $temp_city->setMainImage($item_city['image_link']);
        $temp_city->setImageAlt($item_city['image_alt_text']);
        $temp_city->setDesc($item_city['desc']);
        $temp_city->setArea($item_city['area']);
        $temp_city->setPopulation($item_city['pop']);
        $temp_city->setCurrency($item_city['currency']);
        $temp_city->setPopDensity($item_city['pop_density']);
        $temp_city->setGoogleMapsLink($item_city['google_maps']);

        $stmt_poi = $conn->prepare("SELECT * FROM places_of_interest INNER JOIN images ON places_of_interest.image_id = images.image_id WHERE city_id = '".$temp_city->getWoeid()."'");
        $stmt_poi->execute();

        $temp_poi_array = array();
        foreach ($stmt_poi->fetchAll() as $item_poi)
        {
            $temp_poi = new Place_of_Interest($item_poi['name'],$item_poi['category'],$item_poi['lat'],$item_poi['long']);
            $temp_poi->setAddress($item_poi['address']);
            $temp_poi->setCapacity($item_poi['capacity']);
            $temp_poi->setWebsite($item_poi['website']);
            $temp_poi->setWikiLink($item_poi['wiki']);
            $temp_poi->setDesc($item_poi['desc']);
            $temp_poi->setSdesc($item_poi['sdesc']);
            $temp_poi->setImage($item_poi['image_link']);
            $temp_poi->setImageAlt($item_poi['image_alt_text']);
            $temp_poi->setMapIcon($base_url.$image_url.'map_icons/'.$item_poi['map_icon']);
            if ($item_poi['map_icon'] == null)
            {
                $temp_poi->setMapIcon($base_url.$image_url.'map_icons/'.'sight.png');
            }

            if ($item_poi['twinning_link'] != null)
            {
                $twinning->addPoiJoin($temp_poi);
            }

            array_push($temp_poi_array,$temp_poi);
        }

        $temp_city->setPlacesOfInterest($temp_poi_array);

        array_push($cities,$temp_city);
    }
    $conn = null;
}
catch (PDOException $e)
{
    echo "Connnecton failed: " . $e->getMessage();
    die();
}
?>
