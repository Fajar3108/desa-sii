<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitizenRequest;
use App\Models\{Citizen, Family};
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CitizenController extends Controller
{
    public function index()
    {
        if (isset(request()->keyword) && isset(request()->search_by)) {
            $citizens = Citizen::where(request()->search_by, 'LIKE', '%' . request()->keyword . '%')->latest()->paginate(10);
        } else {
            $citizens = Citizen::latest()->paginate(10);
        }

        return view('citizen.index', compact('citizens'));
    }

    public function show(Citizen $citizen)
    {
        $citizens = Citizen::where('family_id', $citizen->family_id)->orderBy('birthday', 'ASC')->get();

        return view('citizen.show', compact('citizen', 'citizens'));
    }

    public function create()
    {
        $citizen = new Citizen;
        $citizen["family"] = new Family;

        return view('citizen.create', compact('citizen'));
    }

    public function store(CitizenRequest $request)
    {
        $family = Family::firstOrCreate([
            'number' => $request->kk
        ]);

        $family->citizens()->create([
            'name' => $request->name,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'status' => $request->status,
        ]);

        ALert::success('Success', 'Citizen created successfuly');

        return redirect('/citizen');
    }

    public function edit(Citizen $citizen)
    {
        return view('citizen.edit', compact('citizen'));
    }

    public function update(CitizenRequest $request, Citizen $citizen)
    {
        $family = Family::firstOrCreate([
            'number' => $request->kk
        ]);

        $citizen->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'status' => $request->status,
            'family_id' => $family->id,
        ]);

        ALert::success('Success', 'Citizen updated successfuly');

        return redirect('/citizen');
    }

    public function destroy(Citizen $citizen)
    {
        $citizen->delete();

        ALert::success('Success', 'Citizen deleted successfuly');

        return redirect('/citizen');
    }
}
