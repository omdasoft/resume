<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use Illuminate\Http\Request;
use App\Models\Education;
class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::latest()->get();

        return response()->json($educations, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationRequest $request)
    {
        $education = new Education();
        $education->create($request->validated());

        $message = "education created successfully";

        return response()->json($message, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $education = Education::findOrFail($id);
        return response()->json($education, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEducationRequest $request, $id)
    {
        $education = Education::findOrFail($id);
        $education->update($request->validated());
        $message = "education updated successfully ";

        return response()->json($message, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::findOrFail($id)->delete();
        $message = "education deleted successfully";

        return response()->json($message, 200);
    }
}
