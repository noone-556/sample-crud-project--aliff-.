<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    //to retrieve all information of the register employee 
    public function dashboard() 
    {
        $list_employees = Employee::all();
        
        //pass list_employees to dashboard.blade.php so it can be extracted
        return view('dashboard')->with(compact('list_employees'));
    }

    //return modal view for daftar employee
    public function daftarRed() 
    {
        return view('crud_sample.daftarUsers');
    }

    //function to save rekod pekerja to mysql
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
        
        // if (TETAP) end date can be null, else (KONTRAK) then end date will be required
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

    //to retrieve maklumat and display at Lihat Maklumat Modal based on id
    public function getMaklumat(Request $request)
    {
        $id = $request['id'];

        $list_data = Employee::where('id', $id)->get();
        
        return $list_data;
    }

    //semak email so one email can be use for one user only
    public function semakEmail(Request $request){

        $email = $request['EMAIL'];
        $empID = $request['EMPID'];

        // Check if email exists BUT ignore current user
        $emailUser = Employee::where('email', $email)
                            ->where('empID', '!=', $empID)
                            ->count();

        return $emailUser;
    }

    //semak employee id so one id can be use for one user only
    public function semakIDPekerja(Request $request){

        $empID = $request['EMPID'];

        // Check if email exists BUT ignore current user
        $idUser = Employee::where('empID', $empID)->count();

        return $idUser;
    }

    //kemaskini maklumat based on what value change 
    public function updateMaklumat(Request $request){
        $input = $request->all();

        $eidEMP = $input['eidEMP'];
        $email = $input['eEmail'];
        $eType = $input['eType'];
        $eStart = $input['eStart'];
        $eEnd = $input['eEnd'] ?? NULL;
        $eStatus = $input['eStatus']; 

        //prepare data that will be updated
        $updateData = [
            'email' => $email,
            'contract_type' => $eType,
            'start_date' => $eStart,
            'end_date' => ($eType == "KONTRAK") ? $eEnd : NULL,
            'status' => $eStatus, // Add this line
            'updated_at' => NOW(),
        ];

        // updates the selected field based on unique employee id
        Employee::where('empID', $eidEMP)->update($updateData);

        return response()->json(['success' => 'Data Submitted Successfully']);
    }

    //delete maklumat based on id
    public function padamMaklumat($id){

        $employee = Employee::find($id);

        if(!$employee){
            return response()->json(['message' => 'Rekod tidak dijumpai'], 404);
        }

        $employee->delete();

        return response()->json(['message' => 'Rekod berjaya dipadam']);

    }
}
