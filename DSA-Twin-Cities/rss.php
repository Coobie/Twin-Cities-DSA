<?php
/**
 * User: Jacob
 * github.com/coobie
 */
require_once __DIR__ . "/includes/config.php";

//Set content type so browsers display XML as a tree
header('Content-Type: application/xml');

$output = '<?xml version="1.0" encoding="UTF-8"?>';
$output .= '<rss version="2.0">';
$output .= '<channel>';
$output .= '<language>en-gb</language>';
$output .= '<lastBuildDate>'.gmdate(DATE_RFC822).' </lastBuildDate>';
$output .= '<title>The twining of '.$city1->getName().' and '.$city2->getName().'</title>';
$output .= '<link>'.$base_url.'</link>';
//remove HTML from descriptions of pois
$output .= '<description>'.str_replace("<br>"," ",explode("<a",$twinning->getDesc())[0]).'</description>';

//Loop places of interest to display them as items
foreach ($cities as $c)
{
    foreach ($c->getPlacesOfInterest() as $poi)
    {
        $output .= '<item>';
        $output .= '<title>'.$poi->getName().'</title>';
        $output .= '<category>Point of Interest in '.$c->getName().'</category>';
        $output .= '<link>'.$base_url.'place_of_interest'.$url_ending.'?'.$get_city.'='.$c->getName().'&amp;'.$get_place.'='.str_replace(" ","+",$poi->getName()).'</link>';
        $output .= '<description>'.$poi->getSdesc().'</description>';
        $output.= '</item>';
    }
}

$output .= '</channel>';
$output .= '</rss>';

echo($output);
?>
