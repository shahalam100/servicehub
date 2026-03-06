<?php

namespace App\Http\Controllers;

use App\Models\SubService;
use App\Models\Category;
use Illuminate\Http\Request;

class SubServiceController extends Controller
{
    public function index()
    {
        $subServices = SubService::with('category')->get();
        return view('admin.sub_services.index', compact('subServices'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.sub_services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        SubService::create($request->all());

        return redirect()->route('admin.sub-services.index')->with('success', 'Sub-service created successfully.');
    }

    public function edit(SubService $subService)
    {
        $categories = Category::all();
        return view('admin.sub_services.edit', compact('subService', 'categories'));
    }

    public function update(Request $request, SubService $subService)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        $subService->update($request->all());

        return redirect()->route('admin.sub-services.index')->with('success', 'Sub-service updated successfully.');
    }

    public function destroy(SubService $subService)
    {
        $subService->delete();

        return redirect()->route('admin.sub-services.index')->with('success', 'Sub-service deleted successfully.');
    }
}
