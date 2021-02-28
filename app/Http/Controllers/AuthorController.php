<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\AuthorImport;
use App\Exports\AuthorExport;

class AuthorController extends Controller
{
    public function importView() {
        return view('import');
    }

    public function importFile(Request $request) {
        Excel::import(new AuthorImport, $request->file);
    }

    public function exportAuthor(Request $request) {
        return Excel::download(new AuthorExport($request->author_id), 'author.xlsx');
    }
}
