<?php

class PageController extends Controller
{

    public function index()
    {
        $this->view('pages/index');
    }

    public function about()
    {
        $this->view('pages/about');
    }

    public function document()
    {
        $this->view('pages/document');
    }

    public function changeLog()
    {
        $this->view('pages/changeLog');
    }

}