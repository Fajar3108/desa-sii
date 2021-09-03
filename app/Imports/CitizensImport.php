<?php

namespace App\Imports;

use App\Models\{Citizen, Family};
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CitizensImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Citizen([
            'name' => $row['nama'],
            'no_hp' => $row['no_hp'],
            'nik' => $row['nik'],
            'family_id' => Family::firstOrCreate([
                'number' => $row['no_kk'],
            ]),
            'birthday' => $row['tanggal_lahir'],
            'gender' => $row['jenis_kelamin'],
            'address' => $row['alamat'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'status' => $row['status_ekonomi'],
        ]);
    }
}
