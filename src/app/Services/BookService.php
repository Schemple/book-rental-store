<?php
namespace App\Services;

use App\Exceptions\BookNotFoundException;
use App\Helper\ImageHelper;
use App\Repositories\Interfaces\BookRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;


class BookService
{
    protected BookRepository $bookRepository;
    protected ImageHelper $imageHelper;

    public function __construct(BookRepository $bookRepository,ImageHelper $imageHelper)
    {
        $this->bookRepository = $bookRepository;
        $this->imageHelper = $imageHelper;
    }
    public function getBooks($limitPerPage){
        $BookListResponse=$this->bookRepository->paginate($limitPerPage);
        return $BookListResponse;
    }
    public function getBookById($id){
        try {
            $BookResponse=$this->bookRepository->find($id);

            return $BookResponse;
        }catch (\Exception $e){
           throw new BookNotFoundException();
        }
    }
    public function createBook($BookRequest,$file){
        $fileName=ImageHelper::UploadImage($file);
        $BookRequest['image']=ImageHelper::GetImageUrl($fileName);
        $this->bookRepository->create($BookRequest);
    }
    public function updateBook($BookRequest,$BookId){
        $Book=$this->bookRepository->find($BookId);
        if(!$Book){
            throw new BookNotFoundException();
        }
//        $Book->title=$BookRequest['title'];
//        $Book->author=$BookRequest['author'];
//
//        $Book->category_id=$BookRequest['category_id'];
//        $Book->quantity=$BookRequest['quantity'];
//
//        $Book->price=$BookRequest['price'];
//        $Book->description=$BookRequest['description'];

        $this->bookRepository->update($BookRequest,$BookId);
        return [
            'message'=>'success',
            'data'=>$Book
        ];
    }

}
