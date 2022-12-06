<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employment;
use App\Models\EmploymentDetails;
use App\Http\Requests\StoreEmploymentRequest;
class EmploymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employments = Employment::with('employmentDetails')->get();

        return response()->json($employments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmploymentRequest $request)
    {
        $employment = new Employment;
        $employment->designation = $request->designation;
        $employment->company = $request->company;
        $employment->start_date = $request->start_date;
        $employment->end_date = $request->end_date;
        $employment->until_now = $request->until_now;
        $employment->country = $request->country;
        $employment->save();
        foreach($request->details as $detail) {
            $details = new EmploymentDetails;
            $details->desc = $detail;
            $employment->employmentDetails()->save($details);
        }
        $message = 'Employment created successfully';
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
        $employment = Employment::with('employmentDetails')->findOrFail($id);

        return response()->json($employment, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmploymentRequest $request, $id)
    {
        $employment = Employment::findOrFail($id);
        $employment->designation = $request->designation;
        $employment->company = $request->company;
        $employment->start_date = $request->start_date;
        $employment->end_date = $request->end_date;
        $employment->until_now = $request->until_now;
        $employment->country = $request->country;
        $employment->save();

        $message = 'Employment Updated successfully';
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
        Employment::findOrFail($id)->delete();
        $message = "employment deleted successfully";
        return response()->json($message, 200);
    }
}
