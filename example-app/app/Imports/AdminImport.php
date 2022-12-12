<?php


namespace App\Imports;


use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdminImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        // TODO: Implement model() method.
        return new Admin([
           "username" => $row["username"],
           "password" => Hash::make($row["password"]),
           "phone" => $row["phone"],
        ]);
    }
}
