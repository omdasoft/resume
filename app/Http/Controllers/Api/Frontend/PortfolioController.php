<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Http\Resources\PortfolioResource;
class PortfolioController extends Controller
{
    public function index() {
        $portfolios = Portfolio::with('image')->latest()->get();
        return PortfolioResource::collection($portfolios);
    }
}
