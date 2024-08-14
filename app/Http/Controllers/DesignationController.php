<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Depends;

class DesignationController extends Controller
{

    public function index()
    {
        $designations = Designation::all();
        return view("backend.dashboard.designation.designationTable", ['designations' => $designations]);
    }


    public function postIndex()
    {
        $designations = Designation::all();
        return view("backend.dashboard.designation.designationTable", ['designations' => $designations]);
    }

    public function create()
    {
        $branches = Branch::all();
        $department = Department::all();
        return view("backend.dashboard.designation.createDesignation",
        ['branches'=>$branches, 'departments'=> $department]);

    }


    public function store(Request $request)
    {

        $request->validate([
            "title"=>"required",
            "salary"=>"required",
            "branch_id"=>"required",
            "department_id"=>"required",
        ]);


        $designation=new Designation;
        $designation->title=$request->title;
        $designation->salary=$request->salary;
        $designation->branch_id=$request->branch_id;
        $designation->department_id=$request->department_id;
        // $branch->user_id=Auth::id();
        $designation->save();
        return redirect()->route('designations.index')->withSuccess("DESIGNATION CREATED");
    }

    public function show(Designation $designation)
    {
        //
    }


    public function edit($id)
    {
        $designation = Designation::find($id);
        $branches = Branch::all();
        $department = Department::all();

        return view("backend.dashboard.designation.editDesignation", [
            "designations"=>$designation,
            "branches"=>$branches,
            "departments"=>$department,
        ]);
    }



    public function update(Request $request, $id)
    {
        $designation= Designation::find($id);
        $designation->title=$request->title;
        $designation->salary=$request->salary;
        $designation->branch_id=$request->branch_id;
        $designation->department_id=$request->department_id;

        $designation->update();
        return redirect()->route ('designations.index')->withSuccess("DESIGNATION UPDATED");
    }


    public function destroy(Designation $designation)
    {
        $designation->delete();
        return back()->withSuccess("DESIGNATION DELETED");
    }
}
