<?php

namespace App\Exports;

use App\Models\Citizen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CitizensExport implements FromView
{
    public function view(): View
    {
        return view('citizen.export', [
            'citizens' => Citizen::all()
        ]);
    }
}
