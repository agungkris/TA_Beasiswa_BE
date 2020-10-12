<?php

namespace Modules\Scholarship\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Scholarship\Entities\ScholarshipTutorial;

class ScholarshipTutorialController extends Controller
{
    private $tutorialModel;
    public function __construct()
    {
        $this->tutorialModel = new ScholarshipTutorial();
    }


    public function index()
    {
        $getAllTutorial = $this->tutorialModel->first();
        $data = [
            'id' => $getAllTutorial->id,
            'laporan_beasiswa' => asset('upload/' . $getAllTutorial->laporan_beasiswa),
            'akun_mahasiswa' => asset('upload/' . $getAllTutorial->akun_mahasiswa),
            'akun_juri' => asset('upload/' . $getAllTutorial->akun_juri),
            'grup_fgd' => asset('upload/' . $getAllTutorial->grup_fgd),
            'pemberitahuan_admin' => asset('upload/' . $getAllTutorial->pemberitahuan_admin),
            'periode' => asset('upload/' . $getAllTutorial->periode),
            'seleksi_beasiswa' => asset('upload/' . $getAllTutorial->seleksi_beasiswa),
            'ketentuan_beasiswa_admin' => asset('upload/' . $getAllTutorial->ketentuan_beasiswa_admin),
            'juri_fgd' => asset('upload/' . $getAllTutorial->juri_fgd),
            'juri_karya_tulis' => asset('upload/' . $getAllTutorial->juri_karya_tulis),
            'pemberitahuan_mahasiswa' => asset('upload/' . $getAllTutorial->pemberitahuan_mahasiswa),
            'ketentuan_beasiswa_mahasiswa' => asset('upload/' . $getAllTutorial->ketentuan_beasiswa_mahasiswa),
            'pengumpulan_dokumen_mahasiswa' => asset('upload/' . $getAllTutorial->pengumpulan_dokumen_mahasiswa)
        ];
        return $data;

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'id' => 1
        ];
        $findScholarShip = $this->tutorialModel->first();
        if ($request->file('laporan_beasiswa')) {
            if ($findScholarShip && Storage::exists($findScholarShip->laporan_beasiswa)) {
                Storage::delete($findScholarShip->laporan_beasiswa);
            }
            $uploadForm = $request->file('laporan_beasiswa')->storeAs('document', $request->file('laporan_beasiswa')->getClientOriginalName());
            $payloadData['laporan_beasiswa'] = $uploadForm;
        }

        if ($request->file('akun_mahasiswa')) {
            if ($findScholarShip && Storage::exists($findScholarShip->akun_mahasiswa)) {
                Storage::delete($findScholarShip->akun_mahasiswa);
            }
            $uploadTerm = $request->file('akun_mahasiswa')->storeAs('document', $request->file('akun_mahasiswa')->getClientOriginalName());
            $payloadData['akun_mahasiswa'] = $uploadTerm;
        }

        if ($request->file('akun_juri')) {
            if ($findScholarShip && Storage::exists($findScholarShip->akun_juri)) {
                Storage::delete($findScholarShip->akun_juri);
            }
            $uploadTerm = $request->file('akun_juri')->storeAs('document', $request->file('akun_juri')->getClientOriginalName());
            $payloadData['akun_juri'] = $uploadTerm;
        }

        if ($request->file('grup_fgd')) {
            if ($findScholarShip && Storage::exists($findScholarShip->grup_fgd)) {
                Storage::delete($findScholarShip->grup_fgd);
            }
            $uploadTerm = $request->file('grup_fgd')->storeAs('document', $request->file('grup_fgd')->getClientOriginalName());
            $payloadData['grup_fgd'] = $uploadTerm;
        }

        if ($request->file('pemberitahuan_admin')) {
            if ($findScholarShip && Storage::exists($findScholarShip->pemberitahuan_admin)) {
                Storage::delete($findScholarShip->pemberitahuan_admin);
            }
            $uploadTerm = $request->file('pemberitahuan_admin')->storeAs('document', $request->file('pemberitahuan_admin')->getClientOriginalName());
            $payloadData['pemberitahuan_admin'] = $uploadTerm;
        }

        if ($request->file('periode')) {
            if ($findScholarShip && Storage::exists($findScholarShip->periode)) {
                Storage::delete($findScholarShip->periode);
            }
            $uploadTerm = $request->file('periode')->storeAs('document', $request->file('periode')->getClientOriginalName());
            $payloadData['periode'] = $uploadTerm;
        }

        if ($request->file('seleksi_beasiswa')) {
            if ($findScholarShip && Storage::exists($findScholarShip->seleksi_beasiswa)) {
                Storage::delete($findScholarShip->seleksi_beasiswa);
            }
            $uploadTerm = $request->file('seleksi_beasiswa')->storeAs('document', $request->file('seleksi_beasiswa')->getClientOriginalName());
            $payloadData['seleksi_beasiswa'] = $uploadTerm;
        }

        if ($request->file('ketentuan_beasiswa_admin')) {
            if ($findScholarShip && Storage::exists($findScholarShip->ketentuan_beasiswa_admin)) {
                Storage::delete($findScholarShip->ketentuan_beasiswa_admin);
            }
            $uploadTerm = $request->file('ketentuan_beasiswa_admin')->storeAs('document', $request->file('ketentuan_beasiswa_admin')->getClientOriginalName());
            $payloadData['ketentuan_beasiswa_admin'] = $uploadTerm;
        }

        if ($request->file('juri_fgd')) {
            if ($findScholarShip && Storage::exists($findScholarShip->juri_fgd)) {
                Storage::delete($findScholarShip->juri_fgd);
            }
            $uploadTerm = $request->file('juri_fgd')->storeAs('document', $request->file('juri_fgd')->getClientOriginalName());
            $payloadData['juri_fgd'] = $uploadTerm;
        }

        if ($request->file('juri_karya_tulis')) {
            if ($findScholarShip && Storage::exists($findScholarShip->juri_karya_tulis)) {
                Storage::delete($findScholarShip->juri_karya_tulis);
            }
            $uploadTerm = $request->file('juri_karya_tulis')->storeAs('document', $request->file('juri_karya_tulis')->getClientOriginalName());
            $payloadData['juri_karya_tulis'] = $uploadTerm;
        }

        if ($request->file('pemberitahuan_mahasiswa')) {
            if ($findScholarShip && Storage::exists($findScholarShip->pemberitahuan_mahasiswa)) {
                Storage::delete($findScholarShip->pemberitahuan_mahasiswa);
            }
            $uploadTerm = $request->file('pemberitahuan_mahasiswa')->storeAs('document', $request->file('pemberitahuan_mahasiswa')->getClientOriginalName());
            $payloadData['pemberitahuan_mahasiswa'] = $uploadTerm;
        }

        if ($request->file('ketentuan_beasiswa_mahasiswa')) {
            if ($findScholarShip && Storage::exists($findScholarShip->ketentuan_beasiswa_mahasiswa)) {
                Storage::delete($findScholarShip->ketentuan_beasiswa_mahasiswa);
            }
            $uploadTerm = $request->file('ketentuan_beasiswa_mahasiswa')->storeAs('document', $request->file('ketentuan_beasiswa_mahasiswa')-> getClientOriginalName());
            $payloadData['ketentuan_beasiswa_mahasiswa'] = $uploadTerm;
        }

        if ($request->file('pengumpulan_dokumen_mahasiswa')) {
            if ($findScholarShip && Storage::exists($findScholarShip->pengumpulan_dokumen_mahasiswa)) {
                Storage::delete($findScholarShip->pengumpulan_dokumen_mahasiswa);
            }
            $uploadTerm = $request->file('pengumpulan_dokumen_mahasiswa')->storeAs('document', $request->file('pengumpulan_dokumen_mahasiswa')->getClientOriginalName());
            $payloadData['pengumpulan_dokumen_mahasiswa'] = $uploadTerm;
        }

        $createNewTutorial = $this->tutorialModel->updateOrCreate([
            'id' => 1,
        ], $payloadData);
        return response()->json($createNewTutorial);
    }

    public function show($id)
    {
        $findScholarshipTutorial = $this->tutorialModel->first();
        $data = [
            'id' => $findScholarshipTutorial->id,
            'laporan_beasiswa' => asset('upload/' . $findScholarshipTutorial->laporan_beasiswa),
            'akun_mahasiswa' => asset('upload/' . $findScholarshipTutorial->akun_mahasiswa),
            'akun_juri' => asset('upload/' . $findScholarshipTutorial->akun_juri),
            'grup_fgd' => asset('upload/' . $findScholarshipTutorial->grup_fgd),
            'pemberitahuan_admin' => asset('upload/' . $findScholarshipTutorial->pemberitahuan_admin),
            'periode' => asset('upload/' . $findScholarshipTutorial->periode),
            'seleksi_beasiswa' => asset('upload/' . $findScholarshipTutorial->seleksi_beasiswa),
            'ketentuan_beasiswa_admin' => asset('upload/' . $findScholarshipTutorial->ketentuan_beasiswa_admin),
            'juri_fgd' => asset('upload/' . $findScholarshipTutorial->juri_fgd),
            'juri_karya_tulis' => asset('upload/' . $findScholarshipTutorial->juri_karya_tulis),
            'pemberitahuan_mahasiswa' => asset('upload/' . $findScholarshipTutorial->pemberitahuan_mahasiswa),
            'ketentuan_beasiswa_mahasiswa' => asset('upload/' . $findScholarshipTutorial->ketentuan_beasiswa_mahasiswa),
            'pengumpulan_dokumen_mahasiswa' => asset('upload/' . $findScholarshipTutorial->pengumpulan_dokumen_mahasiswa)
        ];
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $findScholarshipTutorial = $this->tutorialModel->find($id);
        $findScholarshipTutorial->update([
            'laporan_beasiswa' => $request->laporan_beasiswa,
            'akun_mahasiswa' => $request->akun_mahasiswa,
            'akun_juri' => $request->akun_juri,
            'grup_fgd' => $request->grup_fgd,
            'pemberitahuan_admin' => $request->pemberitahuan_admin,
            'periode' => $request->periode,
            'seleksi_beasiswa' => $request->seleksi_beasiswa,
            'ketentuan_beasiswa_admin' => $request->ketentuan_beasiswa_admin,
            'juri_fgd' => $request->juri_fgd,
            'juri_karya_tulis' => $request->juri_karya_tulis,
            'pemberitahuan_mahasiswa' => $request->pemberitahuan_mahasiswa,
            'ketentuan_beasiswa_mahasiswa' => $request->ketentuan_beasiswa_mahasiswa,
            'pengumpulan_dokumen_mahasiswa' => $request->pengumpulan_dokumen_mahasiswa
        ]);
        return response()->json($findScholarshipTutorial);
    }

    public function destroy($id)
    {
        $findScholarshipTutorial = $this->tutorialModel->find($id);
        $findScholarshipTutorial->delete();
        return response()->json($findScholarshipTutorial);
    }
}