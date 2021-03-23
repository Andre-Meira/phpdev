<?php
namespace src\traits;

trait traitUrlParser
{ 
    #divide a url em uma array
    public function parseUrl()
    {
        return explode("/",rtrim($_GET['url']),FILTER_SANITIZE_URL);
    }
}