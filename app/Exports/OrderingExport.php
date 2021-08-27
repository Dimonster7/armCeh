<?php

namespace App\Exports;

//use App\Models\ordering;
use Maatwebsite\Excel\Excel;
//use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrderingExport implements FromCollection,ShouldAutoSize
{
    use Exportable;

    private $ordernumber;

    public function __construct($ordernumber)
   {
       $this->ordernumber = $ordernumber;
   }

   public function collection()
    {
        return $this->ordernumber;
    }

    /**
     * @return array
     */


    // public function query()
    // {
    //
    //     return ordering::query()->whereOrder_number('order_number', $this->order_number);
    // }
}
