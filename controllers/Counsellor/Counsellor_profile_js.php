<?php
class Counsellor_profile_js extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Counsellor_profile_js()
    {

        //pass view name
        $this->view->renderCounsellor('Counsellor_profile_js');
    }
}
