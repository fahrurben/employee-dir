<?php
/**
 * Created by PhpStorm.
 * User: fahrur
 * Date: 02/07/20
 * Time: 5:09
 */

namespace App\Http\Controllers;


use App\Models\Department;
use App\Http\Resources\Department as DepartmentResource;
use App\Http\Resources\DepartmentCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all()->sortBy('name');
        return new DepartmentCollection($departments);
    }

    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $rules = [
            'name' => 'required|unique:department,name',
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \Exception($validator->messages());
        }

        $department = new Department();
        $department->fill($data);
        $department->save();

        try {
            return new DepartmentResource($department);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function update(Request $request, int $id)
    {
        $data = json_decode($request->getContent(), true);

        $rules = [
            'name' => 'required|unique:department,name,'.$id,
        ];
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new \Exception($validator->messages());
        }

        $department = Department::find($id);

        if (!isset($department)) {
            throw new \Exception('Entity not found');
        }

        $department->fill($data);
        $department->save();

        try {
            return new DepartmentResource($department);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function delete(Request $request, int $id)
    {
        $department = Department::find($id);

        if (!isset($department)) {
            throw new \Exception('Entity not found');
        }

        try {
            $department->delete();
            return response()->json(['message' => 'Data had been deleted'], 200);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}