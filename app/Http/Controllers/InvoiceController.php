<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Imports\InvoiceImport;
use App\Exports\InvoiceExport;
use App\Http\Requests\Invoice\StoreRequest;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('import.index');
    }

    public function store(StoreRequest $request)
    {
        $jobId    = Str::uuid();
        $alphabet = range('A', 'Z');

        $data = $request->only('first_number', 'first_brutto', 'second_number', 'second_brutto');

        $data = collect($data)->map(function ($name) use ($alphabet) {
            return array_search(strtoupper($name), $alphabet);
        });

        (new InvoiceImport(
                1,
                $jobId,
                $data->get('first_number'),
                $data->get('first_brutto')
            )
        )->import($request->file('first_file'));

        (new InvoiceImport(
                2,
                $jobId,
                $data->get('second_number'),
                $data->get('second_brutto')
            )
        )->import($request->file('second_file'));

        return (new InvoiceExport($jobId))->download('invoices.xlsx');
    }
}
