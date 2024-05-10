<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventoryProject;


class InventoryProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $inventoryProjects = InventoryProject::orderBy('id', 'desc')->paginate(10);
        $sanction_authorities = Member::where('status', 1)->get();
        return view('inventory.inventory-projects.list', compact('inventoryProjects','sanction_authorities',''));
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $inventoryProjects = InventoryProject::where(function($queryBuilder) use ($query) {
                $queryBuilder->where('id', 'like', '%' . $query . '%')
                    ->orWhere('project_name', 'like', '%' . $query . '%')
                    ->orWhere('status', '=', $query == 'Active' ? 1 : ($query == 'Inactive' ? 0 : null));
            })
            ->orderBy($sort_by, $sort_type)
            ->paginate(10);

            return response()->json(['data' => view('inventory.inventory-projects.table', compact('inventoryProjects'))->render()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|unique:inventory_projects,project_name',
            'status' => 'required',
        ]);

        $inventory_project = new InventoryProject();
        $inventory_project->project_name = $request->project_name;
        $inventory_project->status = $request->status;
        $inventory_project->save();

        session()->flash('message', 'Inventory Project added successfully');
        return response()->json(['success' => 'Inventory Project added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventory_project = InventoryProject::find($id);
        $edit = true;
        return response()->json(['view' => view('inventory.inventory-projects.form', compact('edit','inventory_project'))->render()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate
        $request->validate([
            'project_name' => 'required|unique:inventory_projects,project_name,'.$id,
            'status' => 'required',
        ]);

        $inventory_project = InventoryProject::find($id);
        $inventory_project->project_name = $request->project_name;
        $inventory_project->status = $request->status;
        $inventory_project->update();

        session()->flash('message', 'Inventory Project updated successfully');
        return response()->json(['success' => 'Inventory Project updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Request $request)
    {
        $inventory_project_delete = InventoryProject::find($request->id);
        $inventory_project_delete->delete();

        return redirect()->back()->with('message', 'Inventory Project deleted successfully');
    }
}
