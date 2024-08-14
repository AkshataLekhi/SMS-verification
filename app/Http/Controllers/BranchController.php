<?php
// This is branch controller
namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::all();
        return view("backend.dashboard.branch.branchTable", ['branches' => $branches]);
    }


    public function postIndex()
    {
        $branches = Branch::all();
        return view("backend.dashboard.branch.branchTable", ['branches' => $branches]);
    }

    public function create()
    {
        return view("backend.dashboard.branch.createBranch");
    }


    public function store(Request $request)
    {

        $request->validate([
            "branchName"=>"required",
            "location"=>"required",
            "number"=>"required",
            "email"=>"required",
        ]);

        $branch = new Branch;
        $branch->name = $request->branchName;
        $branch->location = $request->location;
        $branch->number = $request->number;
        $branch->email = $request->email;
        $branch->save();

        return redirect()->route('branches.index')->withSuccess("BRANCH CREATED");
    }

    public function show(Branch $branch)
    {
        //
    }


    public function edit(string $id)
    {
        $branch = Branch::find($id);
        return view("backend.dashboard.branch.editBranch", ["branches"=>$branch]);
    }



    public function update(Request $request, string $id)
    {
        $branches= Branch::find($request->branch_id);
        $branches->name=$request->branchName;
        $branches->location=$request->location;
        $branches->number=$request->number;
        $branches->email=$request->email;

        $branches->save();
        return redirect()->route ('branches.index')->withSuccess("BRANCH UPDATED");
    }


    public function destroy(string $id)
    {
        $branches = Branch::find($id);
        $branches->delete();
        return back()->withSuccess("BRANCH DELETED");
    }
}
