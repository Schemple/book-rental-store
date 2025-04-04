<?php

namespace App\Exceptions;

use Exception;

class BookNotFoundException extends Exception
{
    public function __construct($message = "Book not found",$code = 404)
    {
        parent::__construct($message,$code);
    }
}
