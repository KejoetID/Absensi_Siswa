<?php 

class Home extends BaseController
{
    public function index(){
        parent::view('home/index');
    }
}
