<?php

class Controller
{
    protected $data;
    public function view($view)
    {
        $data = $this->data;

        include 'app/views/' . $view . '.php';
    }
    public function json($data)
    {
        header('content-type: text/json');
        echo json_encode($data);
    }
}
