<?php

abstract class Controller
{
    protected $data;

    /**
     * @param string $view
     * @return void
     */
    public function view(string $view)
    {
        $data = $this->data;
        include 'app/views/' . $view . '.php';
    }

    /**
     * @param array $data
     * @return void
     */
    public function json(array $data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
