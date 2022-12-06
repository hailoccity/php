<?php


namespace App\Imports;


use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class AdminImport implements ToModel
{

    public function model(array $row)
    {
        // TODO: Implement model() method.
        return new Admin([
           'username' => $row[0],
           'password' => Hash::make($row[1])
        ]);
    }
}
