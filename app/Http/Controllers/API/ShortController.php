<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ShortContent;
use Illuminate\Http\Request;

class ShortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ShortContent::all();

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
    public function show(ShortContent $shortContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortContent $shortContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShortContent $shortContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortContent $shortContent)
    {
        //
    }
}
