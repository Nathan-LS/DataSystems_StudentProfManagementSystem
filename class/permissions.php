<?php
require_once("response.php");

class permissions
{
    private $level_;
    private $resp;
    public function __construct(int $level){
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