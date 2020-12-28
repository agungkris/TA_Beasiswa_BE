<?php

namespace Modules\Scholarship\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Auth\Entities\User;
use Modules\Scholarship\Entities\ScholarshipSubmissions;
use Modules\Scholarship\Transformers\ScholarshipSubmissionResource;
use Modules\Scholarship\Entities\ScholarshipPeriod;
use Modules\Scholarship\Entities\ScholarshipPaperJury;

class ScholarshipSubmissionsController extends Controller
{
    private $scholarshipSubmissionsModel, $periodModel, $paperjuryModel, $userModel;
    public function __construct()
    {
        $this->scholarshipSubmissionsModel = new ScholarshipSubmissions();
        $this->periodModel = new ScholarshipPeriod();
        $this->paperjuryModel = new ScholarshipPaperJury();
        $this->userModel = new User();
    }

    public function index(Request $request)
    {
        $getAllSubmissions = $this->scholarshipSubmissionsModel->with('period', 'student.profile.prodi', 'student.profile.generation'); // select * from Submissionss;
        // select * from student_groups inner join period on periode.id = student_groups.period_id;

        $periodId = $request->period_id ?? null;
        // if ($request->filled('period_id')) {
        $getAllSubmissions = $getAllSubmissions->where('period_id', $periodId);
        // }

        if ($request->filled('next_stage')) {
            $getAllSubmissions = $getAllSubmissions->where('next_stage', $request->next_stage);
        }
        if ($request->filled('final_stage')) {
            $getAllSubmissions = $getAllSubmissions->where('final_stage', $request->final_stage);
        }
        if ($request->filled('jury_id')) {
            // $getPaperJury = $this->userModel->find($request->jury_id)->paper_jury->map(function ($value) {
            //     return $value->id;
            // });
            $getPaperJury = $this->userModel->find($request->jury_id)->paper_jury->map(function ($value) {
                return $value->id;
            });
            // $getSubmissions = $this->paperjuryModel->get()->map(function ($value) {
            //     return $value->submissions_id;
            // });
            // dd($getPaperJury);
            $getAllSubmissions = $getAllSubmissions->whereIn('id', $getPaperJury);
            
        }
        if($request->filled('submission_member')){
            
            
            $getSubmissions = $this->paperjuryModel->get()->map(function ($value) {
                return $value->submissions_id;
            });
            // dd($getPaperJury);
            $getAllSubmissions = $getAllSubmissions->whereNotIn('id', $getSubmissions);
        }
        // if ($request->filled('student_id')) {
        //     $getAllSubmissions = $getAllSubmissions->where('student_id', $request->student_id);
        // }

        $getAllSubmissions = $getAllSubmissions->get();

        // select * from student_groups inner join period on periode.id = student_groups.period_id;
        return ScholarshipSubmissionResource::collection($getAllSubmissions);
    }

    public function store(Request $request)
    {
        $payloadData = [
            'student_id' => auth()->id(),
            'period_id' => $request->period_id,

        ];

        $getPeriod = $this->periodModel->where('id', $request->period_id)->first();
        //dd($getPeriod);
        if (Carbon::now()->lessThan($getPeriod->start_date) || Carbon::now()->greaterThanOrEqualTo($getPeriod->due_date_file)) {
            return response()->json(['message' => 'expired'], 500);
        }
        // dd(Carbon::now());
        //dd(Carbon::now()->lessThan($getPeriod->start_date));
        //dd(Carbon::now()->greaterThanOrEqualTo($getPeriod->due_date_file));

        if ($request->file('submit_form')) {
            // if (Storage::exists($findSubmissions->submit_form)) {
            //     Storage::delete($findSubmissions->submit_form);
            // }
            $uploadForm = $request->file('submit_form')->storeAs('document', $request->file('submit_form')->getClientOriginalName());
            $payloadData['submit_form'] = $uploadForm;
        }


        if ($request->file('brs')) {
            // if (Storage::exists($findSubmissions->brs)) {
            //     Storage::delete($findSubmissions->brs);
            // }
            $uploadForm = $request->file('brs')->storeAs('document', $request->file('brs')->getClientOriginalName());
            $payloadData['brs'] = $uploadForm;
        }
        if ($request->file('raport')) {
            // if (Storage::exists($findSubmissions->raport)) {
            //     Storage::delete($findSubmissions->raport);
            // }
            $uploadForm = $request->file('raport')->storeAs('document', $request->file('raport')->getClientOriginalName());
            $payloadData['raport'] = $uploadForm;
        }
        if ($request->file('cv')) {
            // if (Storage::exists($findSubmissions->cv)) {
            //     Storage::delete($findSubmissions->cv);
            // }
            $uploadForm = $request->file('cv')->storeAs('document', $request->file('cv')->getClientOriginalName());
            $payloadData['cv'] = $uploadForm;
        }
        if ($request->file('papers')) {
            // if (Storage::exists($findSubmissions->papers)) {
            //     Storage::delete($findSubmissions->papers);
            // }
            $uploadForm = $request->file('papers')->storeAs('document', $request->file('papers')->getClientOriginalName());
            $payloadData['papers'] = $uploadForm;
        }
        if ($request->file('other_requirements')) {
            // if (Storage::exists($findSubmissions->other_requirements)) {
            //     Storage::delete($findSubmissions->other_requirements);
            // }
            $uploadForm = $request->file('other_requirements')->storeAs('document', $request->file('other_requirements')->getClientOriginalName());
            $payloadData['other_requirements'] = $uploadForm;
        }
        $createNewScholarshipSubmissions = $this->scholarshipSubmissionsModel->updateOrCreate([
            'student_id' => auth()->id(),
            'period_id' => $request->period_id,
            'presentation' => $request->presentation,
        ], $payloadData);
        return response()->json($createNewScholarshipSubmissions);
    }

    public function show($id)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->with('period', 'student.profile.prodi', 'student.profile.generation')->find($id);
        $findSubmissions->submit_form = asset('upload/' . $findSubmissions->submit_form);
        $findSubmissions->brs = asset('upload/' . $findSubmissions->brs);
        $findSubmissions->raport = asset('upload/' . $findSubmissions->raport);
        $findSubmissions->cv = asset('upload/' . $findSubmissions->cv);
        $findSubmissions->papers = asset('upload/' . $findSubmissions->papers);
        $findSubmissions->other_requirement = asset('upload/' . $findSubmissions->other_requirement);

        return response()->json($findSubmissions);
    }

    public function next_Stage($id, Request $request)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->find($id)->update([
            'next_stage' => $request->next_stage,
        ]);
        if ($findSubmissions) {
            return response()->json(['message' => 'berhasil']);
        }
        return response()->json(['message' => 'gagal'], 500);

        // $findSubmissions->final_stage = 1;
        // $findSubmissions->save();
    }

    public function final_Stage($id, Request $request)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->find($id)->update([
            'final_stage' => $request->final_stage
        ]);
        if ($findSubmissions) {
            return response()->json(['message' => 'berhasil']);
        }
        return response()->json(['message' => 'gagal'], 500);

        // $findSubmissions->final_stage = 1;
        // $findSubmissions->save();
    }

    public function update($id, Request $request)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->find($id);
        $findSubmissions->update([
            // 'student_id' => $request->student_id,
            // 'period_id' => $request->period_id,
            // 'submit_form' => $request->submit_form,
            // 'brs' => $request->brs,
            // 'raport' => $request->raport,
            // 'cv' => $request->cv,
            // 'papers' => $request->papers,
            // 'other_requirements' => $request->other_requirements,
            // 'presentation' => $request->presentation,
            // 'papar_score' => $request->papar_score,
        ]);
        return response()->json($findSubmissions);
    }

    public function destroy($id)
    {
        $findSubmissions = $this->scholarshipSubmissionsModel->find($id);
        $findSubmissions->delete();
        return response()->json($findSubmissions);
    }

    public function report(Request $request)
    {

        $periodId = $request->period_id;

        $prodiAkun = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '1')->where('final_stage', 1)->count();
        
        $prodiMene = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '2')->where('final_stage', 1)->count();

        $prodiIlkom = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '3')->where('final_stage', 1)->count();

        $prodiPsi = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '4')->where('final_stage', 1)->count();
        
        $prodiDkv = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '5')->where('final_stage', 1)->count();

        $prodiDp = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '6')->where('final_stage', 1)->count();

        $prodiInformatika = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '7')->where('final_stage', 1)->count();

        $prodiSif = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '8')->where('final_stage', 1)->count();

        $prodiTeksip = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '9')->where('final_stage', 1)->count();

        $prodiArsi = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('prodi_id', '10')->where('final_stage', 1)->count();

        $angkatan17 = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('generation_id', '1')->where('final_stage', 1)->count();
        $angkatan18 = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('generation_id', '2')->where('final_stage', 1)->count();
        $angkatan19 = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('generation_id', '3')->where('final_stage', 1)->count();

        $total = DB::table('scholarship_submissions')
            ->join('users', 'users.id', '=', 'scholarship_submissions.student_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->where('period_id', $periodId)->where('final_stage', 1)->count();

        $totalfhb = $prodiPsi + $prodiIlkom + $prodiMene + $prodiAkun;
        $totalftd = $prodiArsi + $prodiDkv + $prodiDp + $prodiTeksip + $prodiSif + $prodiInformatika;
        $hasil = $total * 3500000;

        $data = [
            'prodiInformatika' => $prodiInformatika,
            'prodiDkv' => $prodiDkv,
            'prodiDp' => $prodiDp,
            'prodiArsi' => $prodiArsi,
            'prodiTeksip' => $prodiTeksip,
            'prodiIlkom' => $prodiIlkom,
            'prodiAkun' => $prodiAkun,
            'prodiMene' => $prodiMene,
            'prodiPsi' => $prodiPsi,
            'prodiSif' => $prodiSif,

            'angkatan17' => $angkatan17,
            'angkatan18' => $angkatan18,
            'angkatan19' => $angkatan19,

            'total' => $total,
            'totalfhb' => $totalfhb,
            'totalftd' => $totalftd,
            'hasil' => $hasil
        ];
        return response()->json($data);
    }
}
