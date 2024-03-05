<?php

class Image
{
    public $width;
    public $height;
    public $src;
    public function __toString()
    {
        if ($this->width > 0) {
            $this->width = "width='{$this->width}'";
        }

        if ($this->height > 0) {
            $this->height = "height='{$this->height}'";
        }

        if (!empty($this->src)) {
            $fullPath = PATH . '/public/assets/' . $this->src;
            return "<img src='$fullPath' {$this->width} {$this->height} />";
        }
    }
}