<?php

namespace App\Imports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\Importable;

class InvoiceImport implements ToModel, SkipsOnError
{
    use Importable, SkipsErrors;

    private $fileNumber;

    private $jobId;

    private $number;

    private $brutto;

    public function __construct(int $fileNumber, $jobId, $number, $brutto)
    {
        $this->fileNumber   = $fileNumber;
        $this->jobId  = $jobId;
        $this->number = $number;
        $this->brutto = $brutto;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
           'number'     => $row[$this->number],
           'brutto'     => $row[$this->brutto],
           'file'       => $this->fileNumber,
           'job'        => $this->jobId,
        ]);
    }
}
