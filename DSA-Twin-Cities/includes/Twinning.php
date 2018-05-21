<?php

/**
 * User: Jacob
 * github.com/coobie
 */
class Twinning
{
    private $desc;
    private $poi_join = array();
    private $banner;

    /**
     * Twinning constructor.
     * @param $desc
     * @param $poi_join
     */
    public function __construct()
    {
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
    public function getPoiJoin()
    {
        return $this->poi_join;
    }

    /**
     * @param mixed $poi_join
     */
    public function setPoiJoin($poi_join)
    {
        $this->poi_join = $poi_join;
    }

    /**
     * @param $poi_join
     */
    public function addPoiJoin($poi_join)
    {
        array_push($this->poi_join,$poi_join);
    }

    /**
     * @return mixed
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param mixed $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;
    }


}