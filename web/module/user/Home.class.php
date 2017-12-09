<?php

/**
 * Home页
 */

namespace module\user;
session_start();

class Home extends \core\Controller
{
    function index()
    {
        $data = array();
        $this-> fw("/user/login",$data);
    }
}