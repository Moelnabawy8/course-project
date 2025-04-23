<?php
interface shape
{
    function area();
}
class rectangle implements shape
{
    private $height;
    private $width;

    public function getHeight()
    {
        return $this->height;
    }


    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }


    public function getWidth()
    {
        return $this->width;
    }


    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }
    public function area()
    {
        return $this->height * $this->width;
    }
}
class square implements shape
{
    private $r;

    public function getR()
    {
        return $this->r;
    }
    public function setR($r)
    {
        $this->r = $r;

        return $this;
    }
    public function area()
    {
        return $this->r * $this->r;
    }
}
class circle implements shape
{
    private $radius;
    public function getRadius()
    {
        return $this->radius;
    }

    public function setRadius($radius)
    {
        $this->radius = $radius;

        return $this;
    }
    public function area()
    {
        pi() * $this->radius ** 2;
    }
}
