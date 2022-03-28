<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {

        $search = $request->input('search');
        switch ($request->hiddenOption) {
            case '0':
                $asd = \DB::select("select * FROM personal_datamba WHERE name LIKE '%$search%' ");
                break;
            case '1':
                $asd = \DB::select("select * FROM personal_datamba WHERE surname LIKE '%$search%' ");
                break;
            case '2':
                $asd = \DB::select("select * FROM personal_datamba WHERE iin LIKE '%$search%' ");
                break;
        }

        $aa['data'] = $asd;
        $aa['hiddenOption'] = $request->hiddenOption;
        return redirect()->back()->with('asd', $aa);
    }
}
