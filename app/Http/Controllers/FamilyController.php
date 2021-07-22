<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;
use App\Http\Requests\FamilyRequest;
use RealRashid\SweetAlert\Facades\Alert;

class FamilyController extends Controller
{
    public function index()
    {
        $families = Family::paginate(10);

        return view('family.index', compact('families'));
    }

    public function create()
    {
        return view('family.create', ['family' => new Family]);
    }

    public function store(FamilyRequest $request)
    {
        Family::create($request->all());

        ALert::success('Success', 'Family created successfuly');

        return redirect('/family');
    }

    public function edit(Family $family)
    {
        return view('family.edit', compact('family'));
    }

    public function update(Family $family, FamilyRequest $request)
    {
        $family->update($request->all());

        ALert::success('Success', 'Family updated successfuly');

        return redirect('/family');
    }

    public function destroy(Family $family)
    {
        $family->citizens()->delete();
        $family->delete();

        ALert::success('Success', 'Family deleted successfuly');

        return redirect('/family');
    }
}
