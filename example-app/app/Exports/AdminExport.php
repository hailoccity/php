<?php


namespace App\Exports;


use App\Models\Admin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Admin::select("id", "username","phone")->get();
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.
        return  ["ID", "UserName", "Phone"];
    }
}
