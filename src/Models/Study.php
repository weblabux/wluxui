<?php

/**
 * A test "Study" class to use when rendering all studies
 */
class Study
{
    private $name;

    public function __construct($name = null, $url = null)
    {
        $this->setName($name);
        $this->setUrl($url);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
}