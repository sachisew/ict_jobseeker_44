<?php
class Test extends Controller
{
    function __construct()
    {
      parent:: __construct();

    }

    function index()
    {
        #$this->model->printSomething();
        #echo "Hello from the Test controller - Index Method";

        //pass view name
        $this->view ->render('Test'); 
        
    }
}