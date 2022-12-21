<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortfolioRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Traits\FileUpload;
use DB;
class PortfolioController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::with('image')->latest()->get();

        return response()->json($portfolios, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        return DB::transaction(function() use ($request) {
            $portfolio = new Portfolio();
            $portfolio->title = $request->title;
            $portfolio->summary = $request->summary;
            $portfolio->url = $request->url;
            $portfolio->github_url = $request->github_url;
            $portfolio->save();
            $image = new Image();
            $image->image_name = $this->uploadFile($request->image);
            $portfolio->image()->save($image);
            $message = "portfolio created successfully";
            return response()->json($message, 201);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::with('image')->findOrFail($id);
        return response()->json($portfolio, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePortfolioRequest $request, $id)
    {
        return DB::transaction(function() use($request, $id){
            $oldImage = "";
            $portfolio = Portfolio::with('image')->findOrFail($id);
            if($portfolio->image != null) {
                $oldImage = $portfolio->image->image_name;
            }

            $portfolio->title = $request->title;
            $portfolio->summary = $request->summary;
            $portfolio->url = $request->url;
            $portfolio->github_url = $request->github_url;
            $portfolio->save();

            if($request->hasFile('image')) {
                if($oldImage && $this->checkIfFileExists($oldImage)) {
                    $this->deleteFile($oldImage);
                }
                $imageName = $this->uploadFile($request->file('image'));
                $portfolio->image()->updateOrCreate(
                    ['imageable_type' => 'App\Models\Portfolio','imageable_id' => $portfolio->id],
                    ['image_name' => $imageName]
                );
            }
            $message = "portfolio updated successfully";
            return response()->json($message, 200);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::transaction(function() use ($id) {
            $portfolio = Portfolio::with('image')->findOrFail($id);
            if($portfolio->image) {
                if($this->checkIfFileExists($portfolio->image->image_name)) {
                    $this->deleteFile($portfolio->image->image_name);
                }
            }

            $portfolio->delete();
            $message = "portfolio deleted successfully";
            return response()->json($message, 200);
        });
    }
}
