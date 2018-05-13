<?php
require_once(dirname(__FILE__) . "/../config.php");
require_once(dirname(__FILE__) . "/../class/response.php");
require_once(dirname(__FILE__) . "/../class/permissions.php");

function parse_input($data, $required)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    if ($required && empty($data) && $data != "0") {
        global $response;
        $response->setError(true);
        $response->setMessage("You are missing input for a required field");
        echo $response;
        die();
    }
    return $data;
}

function parse_keys($data)
{ //returns an array of elements from a comma separated string of ids
    return explode(',', $data);
}

?>