<?php

class Link
{
    public $href;
    public $target;
    public $cssClass;
    public $text;

    public function __toString()
    {
        if (!empty($this->target)) {
            $this->target = "target='{$this->target}'";
        }

        if (!empty($this->cssClass)) {
            $this->cssClass = "class='{$this->cssClass}'";
        }

        if (!empty($this->href)) {
            $fullPath = PATH . '/' . $this->href;
            return "<a href='{$fullPath}' {$this->target}>{$this->text}</a>";
        }
    }
}