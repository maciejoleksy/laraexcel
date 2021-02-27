<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BookExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Book;

class BooksController extends Controller
{
    public function export() 
    {
        // $show = Book::all('Name', 'price');
        // dd($show);
        return Excel::download(new BookExport, 'books.xlsx');
    }
}
