<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;
use App\Models\Profile;
use App\Models\Image;
use App\Traits\FileUpload;
use DB;
class ProfileController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::with('image')->first();

        return response()->json($profile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {

        $imageName = $this->uploadFile($request->image);
        $cvName = $this->uploadFile($request->cv);

        $profile = new Profile;
        $profile->name = $request->name;
        $profile->address = $request->address;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->github_url = $request->github_url;
        $profile->linkedin_url = $request->linkedin_url;
        $profile->title = $request->title;
        $profile->summary = $request->summary;
        $profile->cv = $cvName;
        $profile->save();
        $image = new Image;
        $image->image_name = $imageName;
        $profile->image()->save($image);
        $message = 'profile created successfully';
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
        $profile = Profile::findOrFail($id);
        return response()->json($profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProfileRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            $profile = Profile::findOrFail($id);

            $image = $profile->image->image_name;
            if($request->hasFile('image')) {
               if($this->checkIfFileExists($image)) {
                   $this->deleteFile($image);
               }
                $imageName = $this->uploadFile($request->file('image'));
                $profile->image->update(['image_name' => $imageName]);
            }

            if($request->hasFile('cv')) {
                if($this->checkIfFileExists($profile->cv)) {
                    $this->deleteFile($profile->cv);
                }
                 $cvName = $this->uploadFile($request->file('cv'));
                 $profile->cv = $cvName;
            }

            $profile->name = $request->name;
            $profile->address = $request->address;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->github_url = $request->github_url;
            $profile->linkedin_url = $request->linkedin_url;
            $profile->title = $request->title;
            $profile->summary = $request->summary;
            $profile->save();
            DB::commit();
            $message = 'profile updated successfully';
            return response()->json($message, 200);
        }catch(\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
