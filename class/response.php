<?php
require_once(dirname(__FILE__)."/../config.php");
class response
{
    private $error_;
    private $message_;
    private $link_;
    public function __construct()
    {
        $this->error_ = 1;
        $this->message_ = "Something went wrong";
        $this->link_= "#";
    }

    public function setError($error)
    {
        if (!$error){
            $this->error_ = 0;
        }
        else{
            $this->error_ = 1;
        }
    }

    public function setMessage($message)
    {
        $this->message_ = $message;
    }

    public function setLink($link)
    {
        $this->link_ = $link;
    }

    public function getMessage()
    {
        return $this->message_;
    }
    public function __toString()
    {
        $resp =array(
            'error' => $this->error_,
            'message' => $this->message_,
            'link' => $this->link_
        );
        return json_encode($resp);
    }
}
?>