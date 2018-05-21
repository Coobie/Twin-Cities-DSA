<?php
/**
 * User: Jacob
 * Date: 07/02/2018
 * github.com/coobie
 */ ?>

<div class="outer-bar">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="glyphicon glyphicon-menu-hamburger white"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li <?php if ($currentPage == 'index') {echo 'class="active"';} ?>><a href="<?php echo("$base_url"); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li <?php if ($currentPage == $city1->getName()) {echo 'class="active"';} ?>><a href="<?php echo("$base_url"."city".$url_ending."?" . $get_city . "=" . $city1->getName()); ?>"><?php echo($city1->getName());?></a></li>
                    <li <?php if ($currentPage == $city2->getName()) {echo 'class="active"';} ?>><a href="<?php echo("$base_url"."city".$url_ending."?" . $get_city . "=" . $city2->getName()); ?>"><?php echo($city2->getName());?></a></li>
                    <li <?php if ($currentPage == 'twinning') {echo 'class="active"';} ?>><a href="<?php echo($base_url.'twinning'.$url_ending);?>"><span class="glyphicon glyphicon-info-sign"></span> Twinning</a></li>
                    <!--<li><a href="#twitter"><span class="glyphicon glyphicon-comment"></span> Twitter</a></li>
                    <li><a href="#flicker"><span class="glyphicon glyphicon-picture"></span> Flicker</a></li> -->
                    <li <?php if ($currentPage == 'aboutus') {echo 'class="active"';} ?>><a href="<?php $about= $base_url . "aboutus".$url_ending; echo("$about") ; ?>"><span class="fa fa-group"></span> About us</a></li>
                    <li <?php if ($currentPage == 'doc') {echo 'class="active"';} ?>><a href="<?php $about= $base_url . "documentation".$url_ending; echo("$about") ; ?>"><span class="glyphicon glyphicon-file"></span> Documentation</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </nav>
</div>