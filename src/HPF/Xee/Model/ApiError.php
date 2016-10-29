<?php
/**
 * Created by PhpStorm.
 * User: benjamin
 * Date: 29/10/2016
 * Time: 01:00
 */

namespace HPF\Xee\Model;


class ApiError
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $tip;

    public function __construct($type, $message, $tip)
    {
        $this->type = $type;
        $this->message = $message;
        $this->tip = $tip;
    }

    public function __toString()
    {
        return "TYPE: ". $this->type. ". MESSAGE: ".$this->message.". TIP: ".$this->tip.".";
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getTip()
    {
        return $this->tip;
    }
    


}