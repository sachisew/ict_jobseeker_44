<?php
class Resume_form_skill extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Resume_form_skill()
    {

        //pass view name
        $this->view->renderResume('Resume_form_skill');
    }
}
