<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Author;

class AuthorExport implements FromCollection
{

    protected $author_id;

    function __construct($author_id) {
            $this->id = $author_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Author::where('id', $this->id)->get();
    }
}
