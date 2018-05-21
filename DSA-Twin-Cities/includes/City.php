<?php

/**
 * User: Jacob
 * github.com/coobie
 */
class City
{
    private $name;
    private $lat;
    private $lng;
    private $country;
    private $country_code;
    private $woeid;
    private $main_image;
    private $image_alt;
    private $desc;
    private $area;
    private $population;
    private $currency;
    private $pop_density;
    private $website;
    private $wiki_link;
    private $google_maps_link;
    private $places_of_interest = array();
    private $weather;

    /**
     * @return mixed
     */
    public function getWeather()
    {
        return $this->weather;
    }

    /**
     * @param mixed $weather
     */
    public function setWeather($weather)
    {
        $this->weather = $weather;
    }

    /**
     * City constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param mixed $country_code
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
    }

    /**
     * @return array
     */
    public function getPlacesOfInterest()
    {
        return $this->places_of_interest;
    }

    /**
     * @param array $places_of_interest
     */
    public function setPlacesOfInterest($places_of_interest)
    {
        $this->places_of_interest = $places_of_interest;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getWoeid()
    {
        return $this->woeid;
    }

    /**
     * @param mixed $woeid
     */
    public function setWoeid($woeid)
    {
        $this->woeid = $woeid;
    }

    /**
     * @return mixed
     */
    public function getMainImage()
    {
        return $this->main_image;
    }

    /**
     * @param mixed $main_image
     */
    public function setMainImage($main_image)
    {
        $this->main_image = $main_image;
    }

    /**
     * @return mixed
     */
    public function getImageAlt()
    {
        return $this->image_alt;
    }

    /**
     * @param mixed $image_alt
     */
    public function setImageAlt($image_alt)
    {
        $this->image_alt = $image_alt;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getPopDensity()
    {
        return $this->pop_density;
    }

    /**
     * @param mixed $pop_density
     */
    public function setPopDensity($pop_density)
    {
        $this->pop_density = $pop_density;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getWikiLink()
    {
        return $this->wiki_link;
    }

    /**
     * @param mixed $wiki_link
     */
    public function setWikiLink($wiki_link)
    {
        $this->wiki_link = $wiki_link;
    }

    /**
     * @return mixed
     */
    public function getGoogleMapsLink()
    {
        return $this->google_maps_link;
    }

    /**
     * @param mixed $google_maps_link
     */
    public function setGoogleMapsLink($google_maps_link)
    {
        $this->google_maps_link = $google_maps_link;
    }




}