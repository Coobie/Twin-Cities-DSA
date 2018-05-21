<?php

/**
 * User: Jacob
 * github.com/coobie
 */
class Place_of_Interest
{
    private $name;
    private $address;
    private $category;
    private $capacity;
    private $lat;
    private $lng;
    private $website;
    private $wiki_link;
    private $desc;
    private $sdesc;
    private $image;
    private $image_alt;
    private $map_icon;

    /**
     * Place_of_Interest constructor.
     * @param $name
     * @param $category
     * @param $lat
     * @param $lng
     */
    public function __construct($name, $category, $lat, $lng)
    {
        $this->name = $name;
        $this->category = $category;
        $this->lat = $lat;
        $this->lng = $lng;
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
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
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
    public function getSdesc()
    {
        return $this->sdesc;
    }

    /**
     * @param mixed $sdesc
     */
    public function setSdesc($sdesc)
    {
        $this->sdesc = $sdesc;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        $ret = $this->image;
        if ($ret == null) $ret = "https://openclipart.org/download/194077/Placeholder.svg";
        return $ret;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * @param mixed $map_icon
     */
    public function setMapIcon($map_icon)
    {
        $this->map_icon = $map_icon;
    }

    /**
     * @return mixed
     */
    public function getMapIcon()
    {
        return $this->map_icon;
    }



}