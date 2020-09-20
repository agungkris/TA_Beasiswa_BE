<?php

namespace Modules\Graduation\Http\Controllers;

//use Illuminate\Contracts\Support\Renderable;

// use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Graduation\Entities\GraduationLulusanProdi;

class GraduationLulusanProdiController extends Controller
{
    private $lulusanProdiModel;
    public function __construct()
    {
        $this->lulusanProdiModel = new GraduationLulusanProdi();
    }


    public function index()
    {
        $getAllLulusanProdi = $this->lulusanProdiModel->with('prodi','tahun')->get()->map(function($value){
            return [
                'id' => $value->id,
                'nim' => $value->nim,
                'nama_lengkap' => $value->nama_lengkap,            
                'prodi_id' => $value->prodi_id,
                'prodi' => $value->prodi,
                'thesis' => $value->thesis,
                // 'ipk' => $value->ipk,
                // 'jsdp' => $value->jsdp,
                'email' => $value->email,
                'keterangan' => $value->keterangan,
                'tahun_id' => $value->tahun_id,
                'tahun' => $value->tahun,
                'image' => asset('upload/'.$value->image)

            ];
        }); // select * from LulusanProdi;
        return response()->json($getAllLulusanProdi);
    }

    public function store(Request $request)
    {

        $payloadData = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,            
            'prodi_id' => $request->prodi_id,
            // 'tempat_lahir' => $request->tempat_lahir,
            // 'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->toDateString(),
            // 'alamat' => $request->alamat,
            'thesis' => $request->thesis,
            // 'ipk' => $request->ipk,
            // 'jsdp' => $request->jsdp,
            'email' => $request->email,
            'keterangan' => $request->keterangan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
           
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $createNewLulusanProdi = $this->lulusanProdiModel->create($payloadData);
        return response()->json($createNewLulusanProdi);
    }

    public function show($id)
    {
        $findLulusanProdi = $this->lulusanProdiModel->with('prodi','tahun')->find($id);
        $findLulusanProdi->image = asset('upload/'.$findLulusanProdi->image);
        return response()->json($findLulusanProdi);
    }

    public function update($id, Request $request)
    {
        $findLulusanProdi = $this->lulusanProdiModel->find($id);
        $payloadData = [
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,            
            'prodi_id' => $request->prodi_id,
            'thesis' => $request->thesis,
            // 'ipk' => $request->ipk,
            // 'jsdp' => $request->jsdp,
            'email' => $request->email,
            'keterangan' => $request->keterangan,
            'image' => $request->image,
            'tahun_id' => $request->tahun_id,
        ];
        if ($request->file('image')) {
            if ($findLulusanProdi && Storage::exists($findLulusanProdi->image)) {
                Storage::delete($findLulusanProdi->image);
            }
            $uploadForm = $request->file('image')->store('document');
            $payloadData['image'] = $uploadForm;
        }
        $findLulusanProdi->update($payloadData);
        return response()->json($findLulusanProdi);
    }

    public function destroy($id)
    {
        $findLulusanProdi = $this->lulusanProdiModel->find($id);
        $findLulusanProdi->delete();
        return response()->json($findLulusanProdi);
    }
}
