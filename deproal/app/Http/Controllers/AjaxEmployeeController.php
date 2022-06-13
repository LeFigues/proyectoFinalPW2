<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;
use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\DB as FacadesDB;

class AjaxEmployeeController extends Controller
{
    public function showEmployeeList() {
        return view('angularemployeelist');
    }

    public function showNewEmployee() {
        return view('angularnewemployee');
    }

    public function getEmployeeById($id) {
        return Employee::find($id);
    }

    public function getEmployees(Request $req) {
        $criteria = [];

        if ($req->firstName) {
            array_push($criteria, ['firstName', $req->firstName]);
        }

        return Employee::where($criteria)->get();
    }

    public function postEmployee(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();
            $user = User::create([
                'name' => $requestData['name'],
                'email' => $requestData['email'],
                'password' => Hash::make($requestData['password'])
            ]);

            Employee::create([
                'firstName' => $requestData['firstName'],
                'lastName' => $requestData['lastName'],
                'birthDate' => $requestData['birthDate'],
                'cellphone' => $requestData['cellphone'],
                'ci' => $requestData['ci'],
                'salary' => $requestData['salary'],
                'charge' => $requestData['charge'],
                'address' => $requestData['address'],
                'photo' => $requestData['photo'],
                'userId' => $user->id
            ]);

            DB::commit();
            return ['result' => 1];
        } catch(Exception $ex) {
            DB::rollback();
            
        return ['result' => 0];
        }

    }

    public function putEmployee(Request $request) {
        try {
            DB::beginTransaction();

            $requestData = $request->all();

            $employee = Employee::find($requestData['id']);
            $employee->firstName = $requestData['firstName'];
            $employee->lastName = $requestData['lastName'];
            $employee->birthDate = $requestData['birthDate'];
            $employee->cellphone = $requestData['cellphone'];
            $employee->ci = $requestData['ci'];
            $employee->salary = $requestData['salary'];
            $employee->charge = $requestData['charge'];
            $employee->address = $requestData['address'];
            $employee->photo = $requestData['photo'];
            
            $user = User::find($employee->userId);
            $user->password = Hash::make($requestData['password']);

            $employee->save();
            $user->save();

            DB::commit();
            return ['result' => 1];
        } catch (Exception $e) {
            DB::rollback();
            return ['result' => $e];
        }

        
    }
    public function deleteEmployee($id){
        try{
            DB::beginTransaction();
            $employee = Employee::find($id);
            $user = User::find($employee->userId);

            $employee->delete();
            $user->delete();
            DB::commit();
            return ['result' => 1];   

        } catch(Exception $e){
            DB::rollback();
            return ['result' => 0];   
        }
     

    }
    public function editEmployee($id){
        return view('angulareditemployee');
    }
}
