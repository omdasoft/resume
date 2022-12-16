<?php

namespace App\Http\Controllers;

use App\Models\EmploymentDetails;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($request->get('details'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmploymentDetails  $employmentDetails
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentDetails $employmentDetails)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmploymentDetails  $employmentDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentDetails $employmentDetails)
    {
        $detail = $request->get('detail');
        $empDetail = $employmentDetails->where('id', $detail['id'])->first();
        $empDetail->desc = $detail['desc'];
        $empDetail->employment_id = $detail['employment_id'];
        $empDetail->save();
        return response()->json($empDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmploymentDetails  $employmentDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmploymentDetails::find($id)->delete();
    }
}
