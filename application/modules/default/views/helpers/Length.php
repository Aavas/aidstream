<?php

class Zend_View_Helper_Length extends Zend_View_Helper_Abstract
{

    function length()
    {
        return $this;

    }
    
    public function adjustSingleTitleLength($text)
    {

        if (strlen($text) > 76)
        {
            return substr($text , 0 , 76) . '...';
        } else
        {
            return $text;
        }

    }
    
    public function adjustDoubleTitleLength($text)
    {

        if (strlen($text) > 30)
        {
            return substr($text , 0 , 30) . '...';
        } else
        {
            return $text;
        }

    }
    public function adjustTripleTitleLength($text)
    {

        if (strlen($text) > 20)
        {
            return substr($text , 0 , 20) . '...';
        } else
        {
            return $text;
        }

    }

    public function adjustSingleLength($text)
    {

        if (strlen($text) > 40)
        {
            return substr($text , 0 , 40) . '...';
        } else
        {
            return $text;
        }

    }

    public function adjustDoubleLength($text)
    {
        if (strlen($text) > 15)
        {
            return substr($text , 0 , 15) . '...';
        } else
        {
            return $text;
        }

    }

    public function adjustTripleLength($text)
    {
        if (strlen($text) > 10)
        {
            return substr($text , 0 , 10) . '...';
        } else
        {
            return $text;
        }

    }

}
