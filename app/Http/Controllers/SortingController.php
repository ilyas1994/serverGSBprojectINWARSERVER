<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SortingController extends Controller
{
    public function index(Request $request) {
//        dd($request->input('sortBy'));
        $requestData = $request->input('sortBy');
        $asd = \DB::select("select * FROM personal_datamba WHERE name LIKE '%$requestData%' ");
//        dd($profileData);
        return redirect()->back()->with('asd', $asd);
    }
}
