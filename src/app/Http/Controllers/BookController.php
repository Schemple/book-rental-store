<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResuorce;
use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $BookService;
    public function __construct(BookService $BookService){
        $this->BookService = $BookService;
    }
    public function GetAllBooks(Request $request)
    {
        $limitPerPage=$request->query("limit");
        $BookList=$this->BookService->getBooks($limitPerPage);
        $BookListResponse=[];

        foreach($BookList as $Book){
            $BookListResponse[]=new BookResuorce($Book);
        }

        return response()->json($BookListResponse);
    }
    public function GetBookById($id)
    {
        try {
            $Book=$this->BookService->getBookById($id);

            return response()->json(new BookResuorce($Book));
        }catch (\Exception $exception) {
            return response()->json([
                'message'=>$exception->getMessage(),
                'code'=>404,
            ]);
        }
    }
    public function CreateBook(Request $request)
    {
        try {
            $FormRequest=$request->validate([
                'title'=>'required|string|max:255',
                'author'=>'required|string|max:255',
                'category_id'=>'required|integer|exists:categories,id',
                'description'=>'required|string|max:255',
                'price'=>'required|integer',
                'quantity'=>'required|integer|min:1',
                'image'=> 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $BookCreate=[
                'title'=>$FormRequest['title'],
                'author'=>$FormRequest['author'],
                'category_id'=>$FormRequest['category_id'],
                'quantity'=>(int) $FormRequest['quantity'],
                'price'=>$FormRequest['price'],
                'description'=>$FormRequest['description']
            ];
            $file=$request->file('image');
            $this->BookService->createBook($BookCreate,$file);
            return response()->json([
                "message"=>"Book Created Successfully",
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                "message"=>$exception->getMessage(),
                "code"=>$exception->getCode()
            ])->setStatusCode(500);
        }

    }
    public function UpdateBook(Request $request)
    {
        try{
            $FormRequest=$request->validate([
                'title'=>'required|string|max:255',
                'author'=>'required|string|max:255',
                'category_id'=>'required|integer|exists:categories,id',
                'description'=>'required|string|max:255',
                'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'quantity'=>'required|integer|min:1',
            ]);
            $BookId=$request->query("bookid");

            $BookUpdate=[
                'title'=>$FormRequest['title'],
                'author'=>$FormRequest['author'],
                'category_id'=>$FormRequest['category_id'],
                'quantity'=>$FormRequest['quantity'],
                'price'=>$FormRequest['price'],
                'description'=>$FormRequest['description']
            ];

            $Response=$this->BookService->updateBook($BookUpdate,$BookId);
            return response()->json($Response);
        }catch (\Exception $exception) {
            return response()->json([
                "message"=>$exception->getMessage(),
                "code"=>$exception->getCode()
            ])->setStatusCode(500);
        }
    }
}
