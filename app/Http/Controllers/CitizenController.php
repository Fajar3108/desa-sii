<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitizenRequest;
use App\Models\{Citizen, Family};
use App\Exports\CitizensExport;
use App\Imports\CitizensImport;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageHandler;

class CitizenController extends Controller
{
    public function index()
    {
        $order_by = request()->order_by == "name" || request()->order_by == "birthday" ? request()->order_by : "updated_at";
        $order_type = request()->order_type == "ASC" ? "ASC" : "DESC";

        $per_page = request()->per_page ?? 10;

        // Search
        if (isset(request()->keyword) && isset(request()->search_by)) {
            $keyword = request()->keyword;
            $search_by = request()->search_by;

            if ($search_by == 'rt' || $search_by == 'rw' || $search_by == 'gender' || $search_by == 'status') {
                $citizens = Citizen::where($search_by, $keyword)->orderBy($order_by, $order_type)->latest();
            } else {
                $citizens = Citizen::where($search_by, 'LIKE', '%' . $keyword . '%')->orderBy($order_by, $order_type)->latest();
            }
        } else {
            $citizens = Citizen::orderBy($order_by, $order_type);
        }

        // Filter
        if(isset(request()->gender) && request()->gender != "all") {
            $citizens->where('gender', request()->gender);
        }
        if(isset(request()->status) && request()->status != "all") {
            $citizens->where('status', request()->status);
        }
        if(isset(request()->rt) && request()->rt != "all") {
            $citizens->where('rt', request()->rt);
        }
        if(isset(request()->rw) && request()->rw != "all") {
            $citizens->where('rw', request()->rw);
        }

        // Paginate
        $citizens = $citizens->paginate($per_page);

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

    public function export()
    {
        return Excel::download(new CitizensExport, 'data-penduduk.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
			'file' => ['required', 'mimes:csv,xls,xlsx']
		]);

        $file = ImageHandler::store($request->file('file'), 'citizen_files');

        Excel::import(new CitizensImport, public_path('storage/' . $file));

        Alert::success('Success', 'Import citizens successfully');

        return back();
    }
}
