<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VodContent;
use Illuminate\Http\Request;

class VodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = VodContent::all();

        return response()->json([
            'message' => 'OK',
            'data' => $items,
        ], 200);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VodContent $vodContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VodContent $vodContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VodContent $vodContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VodContent $vodContent)
    {
        //
    }
}
