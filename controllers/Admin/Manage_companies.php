<?php
class Manage_companies extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Manage_companies()
    {

        //pass view name
        $this->view->renderAdmin('Manage_companies');
    }
}
