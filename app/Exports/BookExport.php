<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Book::all('id', 'Name', 'price');
    // }

    // public function headings(): array
    // {
    //     return [
    //         '#',
    //         'Name',
    //         'price',
    //     ];
    // }

    public function collection()
    {
        // return Book::all();

        $invoices = Book::all();

        $collection = $invoices->where('file', 2)->map(function($invoice) {
            $invoices = Book::all();
            $collect = $invoices->where('file', 1)->where('number', $invoice->number)->first();
            return $collect;
        });

        return $collection;
    }
}
