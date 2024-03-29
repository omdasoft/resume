<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SendMessageRequest;

use App\Models\Profile;
use App\Models\Employment;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Message;

use App\Http\Resources\SkillsResource;
use App\Http\Resources\EmploymentResource;
use App\Http\Resources\PortfolioResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\EducationResource;
use App\Traits\FileUpload;
use Storage;
class FrontendController extends Controller
{
    use FileUpload;
    
    public function index(){
        return view('layouts.front');
    }
    
    public function profile() {
        $profile = Profile::first();
        return new ProfileResource($profile);
    }

    public function employment() {
        $employment = Employment::with('employmentDetails')->latest()->get();
        return EmploymentResource::collection($employment);
    }

    public function latestProjects() {
        $latesProjects = Portfolio::with('image')->latest()->limit(3)->get();
        return PortfolioResource::collection($latesProjects);
    }

    public function featuredProject() {
        $featuredProject = Portfolio::with('image')->where('featured', 1)->first();
        return new PortfolioResource($featuredProject);
    }

    public function skills() {
        $skills = Skill::get();
        return SkillsResource::collection($skills);
    }

    public function education() {
        $education = Education::latest()->get();
        return EducationResource::collection($education);
    }

    public function sendMessage(SendMessageRequest $request){
        Message::create($request->validated());
        return response()->json(['success'=>'your message sent successfully']);
    }

     /**
     * Download cv file
     * 
     * @param string $fileName
     * @return \Illuminate\Http\Response
    */
    public function download($fileName)
    {
        if($this->checkIfFileExists($fileName)) {
            $path = Storage::disk('public')->path("uploads/$fileName");
    	    return response()->download($path, $fileName, ['Content-Type: application/pdf']);
        }else {
            abort('file not found', 404);
        }
    }
}
