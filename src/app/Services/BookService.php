<?php
namespace App\Services;

use App\Repositories\Interfaces\BookRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;


class BookService
{
    protected BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

}
