<?php
  
namespace App\Exports;
  
use App\Models\Address;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class AddressExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Address::all();
    //   return $addresses = DB::table('addresses')
    //    ->join('cities','addresses.city','cities.id')
    //    ->get();
    }

    public function headings(): array
    {
        return [
            'Sr.No.',
            'First Name',
            'Last Name',  
            'Prifile Pic',
            'Email',
            'Phone',  
            'Zip Code',
            'Street',
            'City',
            'Deleted_at',
            'created_at',
            'updated_at'
        ];
    }
}