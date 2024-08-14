<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Branch;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view("backend.dashboard.department.departmentTable", ['departments' => $departments]);
    }

    public function postIndex()
    {
        $departments = Department::all();
        return view("backend.dashboard.department.departmentTable", ['departments' => $departments]);
    }


    public function create()
    {
    $branches = Branch::all();
    $departments = Department::all(); // Fetch all departments
    return view("backend.dashboard.department.createDepartment", [
        'branches' => $branches,
        'departments' => $departments
    ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            "departmentName" => "required",
            "managerName" => "required",
            "email" => "required|email",
            "branch_id" => "required",
        ]);

        $department = new Department;
        $department->departmentName = $request->departmentName;
        $department->managerName = $request->managerName;
        $department->email = $request->email;
        $department->branch_id = $request->branch_id;
        $department->save();

        return redirect()->route('departments.index')->with('success', "DEPARTMENT CREATED");
    }

    public function show(Department $department)
    {
        // Show specific department details if needed
    }

    public function edit(Department $department)
    {
        $branches = Branch::all();
        return view("backend.dashboard.department.editDepartment", [
            'department' => $department,
            'branches' => $branches
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            "departmentName" => "required",
            "managerName" => "required",
            "email" => "required|email",
            "branch_id" => "required",
        ]);

        $department->departmentName = $request->departmentName;
        $department->managerName = $request->managerName;
        $department->email = $request->email;
        $department->branch_id = $request->branch_id;
        $department->save();

        return redirect()->route('departments.index')->with('success', "DEPARTMENT UPDATED");
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return back()->with('success', "DEPARTMENT DELETED");
    }
}
