<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class InvoiceExport implements FromCollection, WithHeadings, WithColumnWidths
{
    use Exportable;

    private $jobId;

    public function __construct($jobId)
    {
        $this->jobId = $jobId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $invoices = Invoice::query()
            ->where('file', 2)
            ->where('job', $this->jobId)
            ->whereIn('number', Invoice::where('file', 1)->pluck('number'))
            ->get();

        Invoice::where('job', $this->jobId)->delete();

        $invoices = $invoices->map(function($invoice){
            return [
                'number'     => $invoice->number,
                'brutto'     => $invoice->brutto,
                'created_at' => $invoice->created_at->format('Y-m-d H:i'),
            ];
        });

        return $invoices;
    }

    public function headings(): array
    {
        return [
            'Źródłowy',
            'Brutto',
            'Created_at',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 12,
            'B' => 15,
            'C' => 15,
        ];
    }
}
