<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function __construct()
    {

    }//end of constructor

    public function index(Request $request)
    {
        if (auth()->user()->hasRole('super_admin')) {

            $books = Book::paginate(5);

        } else {

            $books = auth()->user()->books()->paginate(5);

        }//end of else

        return view('dashboard.books.index', compact('books'));

    }//end of index

    public function create()
    {
        return view('dashboard.books.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'folder_name' => 'required',
            'number_of_pages' => 'required',
        ]);
        
        Book::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.books.index');

    }//end of store

    public function edit(Book $book)
    {
        return view('dashboard.books.edit', compact('book'));

    }//end of edit

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'folder_name' => 'required',
            'number_of_pages' => 'required',
        ]);
        
        $book->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.books.index');

    }//end of update

    public function destroy(Book $book)
    {
        $book->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.books.index');

    }//end of destroy

}//end of controller
