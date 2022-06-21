<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\FieldPostRequest;
use App\Http\Requests\FieldRequest;
use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::all();

        return response()->json([
            'status' => true,
            'fields' => $fields
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FieldRequest $request)
    {
        $field = Field::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Field Created successfully!",
            'field' => $field
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(FieldRequest $request, Field $field)
    {
        $field->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Field Updated successfully!",
            'field' => $field
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        $field->delete();

        return response()->json([
            'status' => true,
            'message' => "Field Deleted successfully!",
        ], 200);
    }
}
