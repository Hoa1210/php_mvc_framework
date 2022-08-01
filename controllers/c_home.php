<?php 
class c_home extends Controller{

    public function index(){
        $this->loadModel('home')->get();
        $this->loadView('home');
    }

}