<?php

class Http
{
    protected string $routePath = '';
    protected string $method = '';

    public function __construct(string $routePath = '', string $method = '')
    {
        $this->routePath = $routePath;
        $this->method = $method;
    }
}