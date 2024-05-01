<?php

class Template
{
    var $filename = '';
    var $content = '';

    function __construct($filename='') {
        $this->filename = $filename;
        if (file_exists($filename) && is_readable($filename)) {
            $this->content = implode('', file($filename));
        } else {
            $this->content = '';
        }
    }

    function clear()
    {
        $this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);
    }

    function write()
    {
        $this->clear();
        print $this->content;
    }

    function getContent()
    {
        $this->clear();
        return $this->content;
    }

    function replace($old = '', $new = '')
    {
        if (is_int($new)) {
            $value = sprintf("%d", $new);
        }
        elseif (is_float($new)) {
            $value = sprintf("%f", $new);
        }
        elseif (is_array($new)) {
            $value = '';

            foreach ($new as $item) {
                $value .= $item. ' ';
            }
        }
        else {
            $value = $new;
        }
        $this->content = preg_replace("/$old/", $value, $this->content);
    }
}


?>