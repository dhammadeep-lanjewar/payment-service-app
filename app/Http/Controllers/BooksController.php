<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BooksController extends Controller
{
    public function store(Request $request,Book $book) {
        try {
            // $request =collect([
            //     'title' => 'Some Book Title 123',
            //     'content' => 'Some Book Content 123',
            //     'price' => '1212',
            //     'year_published' => '2023'
            // ]);
            $validator = Validator::make($request->all(),[
                'title' => 'required|unique:books|max:255',
                // 'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'content' => 'required|max:1000',
                'price' => 'required',
                'year_published' => 'required'
            ]);
            if($validator->fails()){
                dd($validator);
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // $coverName = '';
            // if ($request->file('cover')) {
            //     $image = $request->file('cover');
            //     $coverName = time().'.'.$image->getClientOriginalExtension()
            // }

            $book->title = $request->get('title');
            // $book->cover = $coverName;
            $book->content = $request->get('content');
            $book->price = $request->get('price');
            $book->year_published = $request->get('year_published');
            $book->author_id = rand(1,10);
            if($book->save()){
                return back()->with('success','Booked Added Successfully');
            }
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
        }

    }
}
