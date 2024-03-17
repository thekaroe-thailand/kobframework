<?php

final class HomeController extends Controller
{
    public function index()
    {
        $this->data = ['message' => 'Hello Kob PHP Framework'];
        $this->view('home');
    }
    public function list()
    {
        $arr = [];

        for ($i = 0; $i < 10; $i++) {
            $arr[] = new UserModel("kob $i", "mymail@mail.com");
        }

        $this->data = ['users' => $arr];
        $this->view('list');
    }
    public function apiList()
    {
        $users = [
            new UserModel('tavon', 'kob@mail.com'),
            new UserModel('fai', 'fai@mail.com'),
            new UserModel('watson', 'watson@gmail.com')
        ];

        $this->json($users);
    }
    public function imageAndLink()
    {
        $img = new Image();
        $img->width = '200px';
        $img->height = '200px';
        $img->src = 'logo.png';

        $this->data['imgFromController'] = $img;

        $this->view('imageAndLink');
    }
    public function myGet()
    {
        $this->doGet();
        $this->json(['id' => $this->params('id')]);
    }
    public function myPost()
    {
        $this->doPost();
        $this->json($this->body());
    }
}