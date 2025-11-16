<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    public function dashboard() 
    {
        $list_employees = Employee::all();

        return view('dashboard')->with(compact('list_employees'));
    }

    public function daftarRed() 
    {
        return view('crud_sample.daftarUsers');
    }

    public function daftar_pekerja(Request $request) 
    {
        $input = $request->all();

        \Log::info('Form Data:', $input);

        $app = new Employee;

        $app->name = $input['nameEMP'];
        $app->empID = $input['empID'];
        $app->email = $input['empEmail'];
        $app->positions = $input['roleEMP'];
        $app->contract_type = $input['typeCon'];
        $app->phone = $input['empPhone'];
        $app->start_date = $input['startDate'];
        
        if ($input['typeCon'] == "TETAP") {
            $app->end_date = null;
        } else {
            $app->end_date = $input['endDate'];
        }

        $app->status = '1';

        $save = $app->save();

    return response()->json([
        'success' => $save,
        'message' => $save ? 'Data berjaya disimpan!' : 'Gagal menyimpan data!',
        'data' => $input
    ]);
    }

    public function getMaklumat(Request $request)
    {
        $id = $request['id'];

        $list_data = Employee::all();
        
        return  $list_data;
    }

    public function semakEmail(Request $request){

        $email = $request['EMAIL'];
        $empID = $request['EMPID'];

        // Check if email exists BUT ignore current user
        $emailUser = Employee::where('email', $email)
                            ->where('empID', '!=', $empID)
                            ->count();

        return $emailUser;
    }

    public function updateMaklumat(Request $request){
        $input = $request->all();

        $eidEMP = $input['eidEMP'];
        $email = $input['eEmail'];
        $eType = $input['eType'];
        $eStart = $input['eStart'];
        $eEnd = $input['eEnd'];
    
        $user = Employee::where('empID', $eidEMP)->update([
                'email' =>  $email,
                'contract_type' => $eType,
                'start_date' => $eStart,
                'end_date' => $eEnd,
                'updated_at' => NOW(),
            ]);

        return response()->json(['success' => 'Data Submitted Successfully']);
    }

    public function padamMaklumat($id){

        $employee = Employee::find($id);

        if(!$employee){
            return response()->json(['message' => 'Rekod tidak dijumpai'], 404);
        }

        $employee->delete();

        return response()->json(['message' => 'Rekod berjaya dipadam']);

    }
}
