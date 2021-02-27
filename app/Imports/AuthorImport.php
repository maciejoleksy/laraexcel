<?php

namespace App\Imports;

use App\Models\Author;
use Maatwebsite\Excel\Concerns\ToModel;

class AuthorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Author([
            'name' => $row[0],
            'bio' => $row[1], 
            'born_date' => $row[2],
            'dead_date' => $row[3],
            'nobel' => $row[4],
        ]);
    }
}
