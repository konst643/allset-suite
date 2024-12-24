<?php
    namespace Project\Controllers;
    use \Core\Controller;

    class TestController extends Controller
    {
        public function index()
        {
            $this->title = 'test title';
            
            return 'hi there';
        }   
    }
