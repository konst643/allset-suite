<?php
    namespace Project\Controllers;
    use \Core\Controller;

    class HelloController extends Controller
    {
        public function sayhi()
        {
            $this->title = 'hi title';
            
            return $this->render('hello/sayhi');
        }   
    }
