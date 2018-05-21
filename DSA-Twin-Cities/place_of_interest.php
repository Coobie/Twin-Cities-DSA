<?php
/**
 * User: Jacob
 * github.com/coobie
 */

require_once __DIR__ . '/includes/config.php';

//Check city and place of interest is provided in the URL and that they match our data
if (isset($_GET[$get_city]) && isset($_GET[$get_place]))
{
    $twin = $_GET[$get_city];
    $interest = $_GET[$get_place];

    if ($twin == $city1->getName())
    { //City is city 1
        $city = $city1;
        $place;
        foreach ($city->getPlacesOfInterest() as $temp)
        {
            if ($interest == $temp->getName())
            {
                $place = $temp;
                break;
            }
        }
    }
    elseif ($twin == $city2->getName())
    { // City is city 2
        $city = $city2;
        $place;
        foreach ($city->getPlacesOfInterest() as $temp)
        {
            if ($interest == $temp->getName())
            {
                $place = $temp;
                break;
            }
        }
    }
    else
    { //City is not correct
        header("Location: $base_url/404/");
        die();
    }

    if (! isset($place))
    {
        header("Location: $base_url/404/");
        die();
    }

    $title = $city->getName().'-'.$place->getName();
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

//Output information about the place of interest:
?>

    <h1 class="page_title"><?php echo($place->getName()); ?>, <a href="<?php echo($base_url . 'city'.$url_ending.'?'.$get_city.'='.$city->getName()); ?>"><?php echo $city->getName();?></a></h1>


    <!-- Info -->
    <?php
        //Image
        echo ('<img src="'.$place->getImage().'" alt="'.$place->getImageAlt().'" height="300">');

        echo('<h2>About '.$place->getName().'</h2>');
        echo('<p class="place_desc">'.$place->getDesc().'</p>');

        echo('<div class="place_details">');
        echo('<h3>Details about '.$place->getName().'</h3>');
        echo('Address: <a href="http://www.google.com/search?q='.str_replace(" ","+",$place->getAddress()).'" target="_blank">'.$place->getAddress().' <span class="glyphicon glyphicon-new-window"></span></a><br>');
        echo('Category: '.$place->getCategory().'<br>');
        if ($place->getCapacity() != null) echo('Capacity: '.number_format($place->getCapacity()));
        echo('</div>');

        echo ('<div class="place_links">');
        echo("<br><p>External Links:</p>");
        if ($place->getWebsite() != null) echo('<a href="'.$place->getWebsite().'" target="_blank"><span class="glyphicon glyphicon-globe"></span> '.$place->getName().' website</a><br>');
        echo('<a href="https://www.google.com/maps/dir//'.$place->getLat().','.$place->getLng().'" target="_blank"><span class="glyphicon glyphicon-map-marker"></span> Directions to '.$place->getName().'</a><br>');
        if ($place->getWikiLink() != null) echo('<a href="'.$place->getWikiLink().'" target="_blank"><span class="glyphicon glyphicon-link"></span> '.$place->getName().' Wikipedia</a><br>');
        echo('<a href="http://www.google.com/search?q='.str_replace(" ","+",$place->getName()).'" target="_blank"><span class="glyphicon glyphicon-search"></span> Search for more on '.$place->getName().'</a><br>');

        echo('</div>');
    ?>

    <!-- Others -->
    <div><br>
    <?php
        if (count($city->getPlacesOfInterest()) > 1)
        {
            // Look to see if there is any other of the same category in the city
            $temp_poi_category = array();

            foreach ($city->getPlacesOfInterest() as $temp)
            {
                if ($temp != $place && $temp->getCategory() == $place->getCategory())
                {
                    array_push($temp_poi_category, $temp);
                }
            }
            if (count($temp_poi_category) > 0)
            { // Displaying others if there are any
                echo('<strong>Other '.$place->getCategory().'s in '.$city->getName().'</strong><ul>');
                foreach ($temp_poi_category as $temp)
                {
                    echo('<li><a href="'.$base_url."place_of_interest".$url_ending."?".$get_city."=".$city->getName()."&".$get_place."=".str_replace(" ","+",$temp->getName()).'">'.$temp->getName().'</a></li>');
                }
                echo('</ul>');
            }

            //Showing all other places of interest in the city
            echo('<strong>All places of interest in '.$city->getName().'</strong>');
            echo('<ul>');
            foreach ($city->getPlacesOfInterest() as $temp)
            {
                if ($temp != $place)
                {
                    echo('<li><a href="'.$base_url."place_of_interest".$url_ending."?".$get_city."=".$city->getName()."&".$get_place."=".str_replace(" ","+",$temp->getName()).'">'.$temp->getName().' ['.$temp->getCategory().']'.'</a></li>');
                }
            }
            echo('</ul>');

        }
        else
        {
            echo('<p>More places of interest are coming soon.</p>');
        }
    ?>
    </div>


<?php require_once $base_path . '/templates/footer.php'; ?>