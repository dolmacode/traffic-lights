<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $logs = Log::query()->orderByDesc('id')->get();

        return view('pages.home', ['logs' => $logs]);
    }
}
