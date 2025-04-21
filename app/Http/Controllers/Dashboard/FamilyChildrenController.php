<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Controller;
use App\Models\FamilyChildren;
use App\Models\FamilyParent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FamilyChildrenController extends Controller
{
    // Fungsi untuk menghapus cache yang berkaitan dengan family_parent
    protected function clearFamilyChildrenCache()
    {
        $keys = [
            'children_with_parent',
        ];

        foreach ($keys as $key) {
            Cache::forget($key);
        }
    }

    public function index()
    {
        $cacheKey = 'children_with_parent';

        if (Auth::user() && Auth::user()->role === 'family_parent') {
            $parent = FamilyParent::find(Auth::user()->parent_id);

            $children = FamilyChildren::with(['familyParents']) // Eager loading 'familyParents'
                ->where('parent_id', $parent->id)
                ->orderBy('fullname', 'asc')
                ->get();
        } else {
            $children = Cache::remember($cacheKey, 300, function () {
                return FamilyChildren::with(['familyParents']) // Eager loading 'familyParents'
                    ->orderBy('fullname', 'asc')
                    ->get();
            });
        }

        return view('dashboard.master-data.children.index', compact('children'));
    }

    public function show($id)
    {
        $children = FamilyChildren::findOrFail($id);
        $parent = $children->familyParents()->first();

        $province = $city = $subdistrict = $village = 'N/A';

        if ($parent->province) {
            $provinces = LocationController::getProvincesStatic();
            $province = collect($provinces)->firstWhere('id', $parent->province)['name'] ?? 'N/A';
        }

        if ($parent->city) {
            $cities = LocationController::getCitiesStatic($parent->province);
            $city = collect($cities)->firstWhere('id', $parent->city)['name'] ?? 'N/A';
        }

        if ($parent->subdistrict) {
            $districts = LocationController::getDistrictsStatic($parent->city);
            $subdistrict = collect($districts)->firstWhere('id', $parent->subdistrict)['name'] ?? 'N/A';
        }

        if ($parent->village) {
            $villages = LocationController::getVillagesStatic($parent->subdistrict);
            $village = collect($villages)->firstWhere('id', $parent->village)['name'] ?? 'N/A';
        }

        return view('dashboard.master-data.children.show', compact('children', 'parent', 'province', 'city', 'subdistrict', 'village'));
    }

    public function create()
    {
        $parents = FamilyParent::select('id', 'nik', 'mother_fullname')
            ->orderBy('mother_fullname', 'asc')
            ->get();

        return view('dashboard.master-data.children.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nik' => 'required|numeric|unique:family_children,nik',
            'fullname' => 'required',
            'birth_place' => 'required',
            'date_of_birth' => 'required|date',
            'blood_type' => 'required',
            'gender' => 'required',
            'parent_id' => 'required',
        ];

        $messages = [
            'nik.required' => 'NIK wajib diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'fullname.required' => 'Nama lengkap wajib diisi.',
            'birth_place.required' => 'Tempat lahir wajib diisi.',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
            'date_of_birth.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'blood_type.required' => 'Golongan darah wajib dipilih.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'parent_id.required' => 'Nama ibu wajib dipilih.',
        ];

        $data = $request->validate($rules, $messages);

        $data['date_of_birth'] = Carbon::parse($data['date_of_birth'])->format('Y-m-d');

        try {
            FamilyChildren::create([
                'nik' => $data['nik'],
                'fullname' => $data['fullname'],
                'birth_place' => $data['birth_place'],
                'date_of_birth' => $data['date_of_birth'],
                'blood_type' => $data['blood_type'],
                'gender' => $data['gender'],
                'parent_id' => $data['parent_id'],
            ]);

            // Hapus chace
            $this->clearFamilyChildrenCache();

            return redirect(url('/children-data'))->with('success', "Data berhasil ditambahkan.");
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage()); // Check 'storage/logs/laravel.log'

            return back()->with('error', 'Data gagal ditambahkan. Silakan coba kembali.');
        }
    }

    public function edit($id)
    {
        $children = FamilyChildren::findOrFail($id);

        $parents = FamilyParent::select('id', 'nik', 'mother_fullname')
            ->orderBy('mother_fullname', 'asc')
            ->get();

        return view('dashboard.master-data.children.edit', compact('children', 'parents'));
    }


    public function update(Request $request, $id)
    {
        $children = FamilyChildren::findOrFail($id);

        $rules = [
            'nik' => $children->nik === $request->input('nik') ? 'required|numeric' : 'required|numeric|unique:family_children,nik,' . $children->id,
            'fullname' => 'required',
            'birth_place' => 'required',
            'date_of_birth' => 'required|date',
            'blood_type' => 'required',
            'gender' => 'required',
            'parent_id' => 'required',
        ];

        $messages = [
            'nik.required' => 'NIK wajib diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.unique' => 'NIK sudah terdaftar.',
            'fullname.required' => 'Nama lengkap wajib diisi.',
            'birth_place.required' => 'Tempat lahir wajib diisi.',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi.',
            'date_of_birth.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'blood_type.required' => 'Golongan darah wajib dipilih.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'parent_id.required' => 'Nama ibu wajib dipilih.',
        ];

        $data = $request->validate($rules, $messages);

        $data['date_of_birth'] = Carbon::parse($data['date_of_birth'])->format('Y-m-d');

        try {
            $children->update([
                'nik' => $data['nik'],
                'fullname' => $data['fullname'],
                'birth_place' => $data['birth_place'],
                'date_of_birth' => $data['date_of_birth'],
                'blood_type' => $data['blood_type'],
                'gender' => $data['gender'],
                'parent_id' => $data['parent_id'],
            ]);

            // Hapus chace
            $this->clearFamilyChildrenCache();

            return redirect(url('/children-data'))->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage()); // Check 'storage/logs/laravel.log'

            return back()->with('error', 'Data gagal diperbarui. Silakan coba kembali.');
        }
    }

    public function destroy($id)
    {
        $children = FamilyChildren::findOrFail($id);

        $children->delete();

        // Hapus chace
        $this->clearFamilyChildrenCache();

        return redirect(url('/children-data'))->with('success', 'Data berhasil dihapus.');
    }
}
