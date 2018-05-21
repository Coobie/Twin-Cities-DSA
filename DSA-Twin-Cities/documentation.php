<?php
/**
 * User: Jacob
 * All of the documentation for the assignment
 * github.com/coobie
 */

$title = 'Documentation';
$currentPage = 'doc';
require_once __DIR__ . '/includes/config.php';
require_once $base_path . '/templates/head.php';
require_once $base_path . '/templates/header.php';
require_once $base_path . '/templates/top_nav_bar.php';
require $base_path . '/templates/page_content.php'; ?>


<h1 class="page_title">Documentation</h1>
<div>
    <h2>Content</h2>
    <ul>
        <li><a href="#intro">Introduction</a></li>
        <li><a href="#conceptual_er">Conceptual ER model</a></li>
        <li><a href="#logical_er">Logical ER model</a></li>
        <li><a href="#site_map">Site Map</a></li>
        <li><a href="#file_layout">File Layout</a></li>
        <li><a href="#design">Design Choices</a> - IMPORTANT</li>
        <li><a href="#concept">Site explained</a></li>
        <li><a href="#object_explained">Objects explained</a></li>
        <li><a href="#weather_explained">Weather Explained</a></li>
        <li><a href="#validation">Validation of HTML and RSS</a></li>
    </ul>
</div>
<div>
    <h2>Group documentation</h2>
    <p>This excludes any of the individual tasks.</p>
    <div id="intro">
        <h3>Introduction</h3>
        <p>For this assignment, we were tasked with building a data driven web application that uses external
            API’s and local data storage to encourage interest in twining. As we know, twinning is a form of legal
            or social agreement between towns, cities and regions in geographically distinct areas to
            promote cultural and commercial ties.
        </p>
        <p>
            The group tasks that had to be completed included designing and constructing conceptual and logical
            ER models which highlight the various entities and attributes of the project and the relationships
            between them. Database implementation was also required which entails implementing and populating
            the database on the UWE/CEMS MySQL server. Mapping and weather APIs were developed to show maps and
            current/forecast weather for our chosen cities – Portsmouth and Sydney. Finally, an XML file holding
            application-wide data was constructed, along with an RSS feed which shows all data regarding the twin
            cities and places of interest currently held in the database.
        </p>
    </div>
    <div id="conceptual_er">
        <h3>Conceptual ER model</h3>
        <a href="<?php echo $base_url.'Planning/conceptual_model.png'; ?>"><img src="<?php echo $base_url.'Planning/conceptual_model.png'; ?>" alt="Conceptual ER model" width="100%"></a>
        <p>
            The conceptual ER model. Note data types are not shown and
            relationships are not fully broken down. Primary key is <strong style="color:#C92D39">bold_red</strong> and foreign key is <i style="color:#77C2E7">italic_blue</i>.
        </p>
        <p>
            Basic relationship is shown with city having many places of interest.
        </p>
        <p>
            Although technically a city can have more than one twinning for the purposes of our system only one 'twinning' is shown.
        </p>
        <p>
            Images are just in the relevant tables in this model and have not been extracted to another table.<br>
            City has both a city_id and woeid.<br>
            Each city has weather and a forecast of the weather.

        </p>
    </div>
    <div id="logical_er">
        <h3>Logical ER model</h3>
        <a href="<?php echo $base_url.'Planning/logical_model.png'; ?>"><img src="<?php echo $base_url.'Planning/logical_model.png'; ?>" alt="Logical ER model" width="100%"></a>
        <p>
            The logical ER model. This includes more details about keys and data types.
        </p>
        <p>
            Changes since conceptual model:
            <ul>
                <li>city_id and woeid have been merged so the city_id is the woeid.</li>
                <li>images have been moved to separate table which contains alt text and the location of the image (image_link).</li>
                <li>Places of interest can be a link between the cities (noted by the foreign key twinning_id in places_of_interest). This is optional.</li>
                <li>weather and forecast have been merged into one table, so weather can have weather (forecast_id) note
                    that forecast_id is not compulsory as forecast does not have a forecast.  </li>
            </ul>
        </p>
    </div>
    <div id="site_map">
        <h3>Site Map</h3>
        <a href="<?php echo $base_url.'Planning/site_map.png'; ?>"><img src="<?php echo $base_url . 'Planning/site_map.png'; ?>" alt="Site map" width="100%"></a>
    </div>
    <div id="file_layout">
        <h3>File Layout</h3>
        <a href="<?php echo $base_url.'Planning/file_layout.png'; ?>"><img src="<?php echo $base_url . 'Planning/file_layout.png'; ?>" alt="file layout" width="100%"></a>
    </div>
    <div id="design">
        <h3>Design Choices</h3>
        <p>We chose to only have one image per city and for each place of interest. It would have been easy to
            introduce more but we decided that it was not needed. Also, having more
            images is achieved by the Flickr individual task.
        </p>
        <p>
            At the moment only two cities are supported. It would be possible to introduce more
            but a couple of parts would need to be changed such as the navigation bar.
        </p>
        <p>
            Each city page is got to by HTML GET passing in the name of the city (/city/?city=Portsmouth).
            We acknowledge that this would not necessarily be unique for example if instead of Portsmouth and Sydney
            we had done Portsmouth [UK] and Portsmouth [VA, US]. However, the city name is far more human compliant
            than the woeid for the city (what we would replace it with). If necessary, this could be changed.<br>
            This is similar for the place of interest (/place_of_interest/?city=Portsmouth&interest=HMS+Warrior)
            although this is more likely to be unique unless there is two places with the same name and the same interest
            name or two interests with the exact same name in the same city. Going back to the previous example,
            if there is a cathedral in both Portsmouth cities both called 'Portsmouth cathedral'.

        </p>
    </div>
    <div id="concept">
        <h3>Explained (concept)</h3>
        <p>
            Each page runs the config file which reads from the config XML file to retrieve information like the API
            keys and database connection information. After this the config file runs another file database_connection
            which reads all of the information from the database and populates the objects with the data from
            the database.
        </p>
        <p>
            After this the page calls the template files (mostly just HTML and CSS). Then the content of
            the page and finally the footer (another template).
        </p>
    </div>
    <div id="object_explained">
        <h3>Objects Explained</h3>
        <p>
            Our system has been designed so that none of the data/information has been hard-coded. The way that it is
            done means that if we were to swap the data in the database with another two cities the site would work.
        </p>
        <p>
            The system uses objects to hold all the information once it has been pulled from the database.
            These objects are City, Place_of_interest, Twinning and Weather. All of these classes have getters
            and setters. These classes are held in ‘includes’ folder.
        </p>
        <p>
            This means that the information on the pages are populated by the objects and not straight from the
            database. This means that the database is only accessed once per page.
        </p>
        <p>
            It also means that if the database (type of database) was changed (including Jacob refactoring
            the data to XML) only the weather_connection.php and database_connection.php require any modification.
        </p>
    </div>
    <div id="weather_explained">
        <h3>Weather Explained</h3>
        <a href="<?php echo $base_url.'Planning/weather_explained.png'; ?>"><img src="<?php echo $base_url . 'Planning/weather_explained.png'; ?>" alt="Flowchart of the weather system" width="100%"></a>
        <p>
            The weather is displayed on each of the city pages.<br>
            The weather we have is current weather and the next forecast.<br>
            The weather data is provided by open weather. The free api is limited to 60 calls per minute (which we are far beneath).
        </p>
        <p>
            The weather system on our site makes use of ajax. The page makes a get request and calls another PHP file
            in includes called weather_connection.php (This is done when the page is first loaded or when the user
            of the site clicks ‘reload weather’). Three things are provided to the method (the base URL, the city
            name and the country). The city name and country code are attached using HTML GET.
        </p>
        <p>
            In weather_connection.php the city is checked to see whether it is one of ours (in db checked against objects).
        </p>
        <p>
            If it is one of ours then the data will be loaded from the database (weather table) where the city_woeid
            is equal to our city’s woeid. Firstly, we pull the ‘current weather’ which has a forecast
            so the forecast_id is not null. We read this data from the database into our weather object. A similar
            statement is used for the forecast but instead the forecast_id is null. These weather objects are then
            set for city.
        </p>
        <p>
            Then the current time is checked against the saved time we fetch the weather every hour unless the current
            time is greater than the forecast time. For example, if the weather was last cached at 11:02 then the
            next time it would be updated would be an hour later (on the same day). However, if when we cached the
            weather at this time the next forecast was for 12:00 then at 12:00 the weather would be pulled and cached
            again (two minutes before if it was only being done every hour). Note that the user would have to refresh
            the page or press reload the weather for this to happen.
        </p>
        <p>
            If the weather is recent then the weather is displayed. Otherwise, the api is called and the data is decoded
            from JSON and put into the weather objects. If the JSON file is missing the data, then defaults are set,
            and a message will be displayed to the user (this does not happen too often it is mainly the wind direction
            that is missing). The time that the weather was pulled is stored to the objects then the database is
            updated using update statements (so replaces existing data).
        </p>
        <p>
            <strong>Note the times are displayed in GMT not local time.</strong>
        </p>
    </div>
    <div id="validation">
        <h3>Validation of RSS and HTML</h3>
        <p>We have validated the site using the following:</p>
        <ul>
            <li><a href="https://validator.w3.org/">HTML Validator</a></li>
            <li><a href="https://validator.w3.org/feed/">RSS Validator</a></li>
        </ul>
        <p>Outcome - our site is valid HTML and our RSS feed is also valid.</p>
    </div>
</div>







<?php require_once $base_path . '/templates/footer.php'; ?>