<?php
/**
 * Created by PhpStorm.
 * User: fahrur
 * Date: 04/07/20
 * Time: 4:41
 */

namespace App\Http\Controllers;


use App\Http\Resources\EmployeeCollection;
use App\Models\Employee;
use App\Http\Resources\Employee as EmployeeResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('fullname')->with('department')->paginate();
        return new EmployeeCollection($employees);
    }

    public function get(int $id)
    {
        $employee = Employee::find($id);
        return response()->json(['data' => $employee], 200);
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $rules = [
            'employee_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'fullname' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'position' => 'required',
            'department_id' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \Exception($validator->messages());
        }

        try {
            $employee = new Employee();
            $employee->fill($data);
            $employee->status = 1;

            if ($request->hasFile('photo')) {
                $imgUrl = $request->file('photo');
                $fileOriginalName = $imgUrl->getClientOriginalName();
                $employee->photo = $fileOriginalName;
                $image = file_get_contents($imgUrl);

                $destinationPath = base_path() . '/public/uploads/images/' . $fileOriginalName;
                file_put_contents($destinationPath, $image);
            }

            $employee->save();

            return new EmployeeResource($employee);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();

        $rules = [
            'employee_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'fullname' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'position' => 'required',
            'department_id' => 'required',
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \Exception($validator->messages());
        }

        try {
            $employee = Employee::find($id);

            if (!isset($employee)) {
                throw new \Exception('Entity not found');
            }

            $employee->fill($data);

            if ($request->hasFile('photo')) {
                $imgUrl = $request->file('photo');
                $fileOriginalName = $imgUrl->getClientOriginalName();
                $employee->photo = $fileOriginalName;
                $image = file_get_contents($imgUrl);

                $destinationPath = base_path() . '/public/uploads/images/' . $fileOriginalName;
                file_put_contents($destinationPath, $image);
            }

            $employee->save();

            return new EmployeeResource($employee);
        } catch (\Exception $e) {
            throw $e;
        }
    }


    public function delete(Request $request, int $id)
    {
        $employee = Employee::find($id);

        if (!isset($employee)) {
            throw new \Exception('Entity not found');
        }

        try {
            $employee->delete();
            return response()->json(['message' => 'Data had been deleted'], 200);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}