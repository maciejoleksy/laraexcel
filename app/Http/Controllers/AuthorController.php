<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\AuthorImport;

class AuthorController extends Controller
{
    public function import(Request $request) {
        Excel::import(new AuthorImport, $request->file);
    }
}
