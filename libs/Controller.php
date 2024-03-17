<?php

abstract class Controller
{
    /** @var array */
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

    public function doGet()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            throw new \Exception('http method not found');
        }
    }

    public function doPost()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            throw new \Exception('http method not found');
        }
    }

    public function doPut()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
            throw new \Exception('http method not found');
        }
    }

    public function doDelete()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'DELETE') {
            throw new \Exception('http method not found');
        }
    }

    public function body()
    {
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);

        if (!empty($data)) {
            return $data;
        }
    }

    public function params(string $name)
    {
        return $_GET[$name];
    }
}