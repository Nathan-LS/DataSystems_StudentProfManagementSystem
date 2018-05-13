<?php
require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/response.php");

class permissions
{
    private $level_;
    private $resp;

    public function __construct($level)
    {
        $this->level_ = $level;
        $this->resp = new response();
        session_start();
    }
    public function can_access()
    {
        if ($this->level_ == 0) { //anyone can access
            return;
        } elseif ($this->level_ == 1) { //must be student
            $this->check_student();
        } elseif ($this->level_ == 2) { //must be professor
            $this->check_professor();
        } else {
            return;
        }
    }

    public function permission_level()
    {
        if (isset($_SESSION['access_level'])) {
            return $_SESSION['access_level'];
        } else {
            return null;
        }
    }

    public function isStudent()
    {
        if (isset($_SESSION['access_level'])) {
            if ($_SESSION['access_level'] == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return null;
        }
    }

    public function isProfessor()
    {
        if (isset($_SESSION['access_level'])) {
            if ($_SESSION['access_level'] == 2) {
                return true;
            } else {
                return false;
            }
        } else {
            return null;
        }
    }

    public function getID()
    {
        if (isset($_SESSION['id'])) {
            return $_SESSION['id'];
        } else {
            return null;
        }
    }

    private function logged_in(){
        if (!isset($_SESSION['access_level'])){
            $this->resp->setError(true);
            $this->resp->setMessage("You must be logged in to access this function.");
            $this->resp->setLink("login.php");
            echo $this->resp;
            $_SESSION['error_message'] = $this->resp->getMessage();
            header("Location:error.php");
            die();
        }
    }

    private function check_student(){
        $this->logged_in(); //required to be logged in for this function
        if ($_SESSION['access_level'] != $this->level_){ //currently logged in user does not match set required level
            $this->resp->setError(true);
            $this->resp->setMessage("You must be logged into a student account to access this page.");
            echo $this->resp;
            $_SESSION['error_message'] = $this->resp->getMessage();
            header("Location:error.php");
            die();
        }

    }
    private function check_professor(){
        $this->logged_in(); //required to be logged in for this function
        if ($_SESSION['access_level'] != $this->level_){ //currently logged in user does not match set required level
            $this->resp->setError(true);
            $this->resp->setMessage("You must be logged into a professor account to access this page.");
            echo $this->resp;
            $_SESSION['error_message'] = $this->resp->getMessage();
            header("Location:error.php");
            die();
        }
    }
}
?>