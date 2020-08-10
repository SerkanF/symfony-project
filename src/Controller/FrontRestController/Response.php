<?php 

namespace App\Controller\FrontRestController;

class Response implements \JsonSerializable{

    private $status;
    private $message;
    private $errorCode;

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of errorCode
     */ 
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Set the value of errorCode
     *
     * @return  self
     */ 
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'errorcode' => $this->errorCode,
        ];
    }
}


