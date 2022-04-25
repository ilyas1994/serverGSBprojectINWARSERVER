<?php

namespace App\Http\Controllers\ExcelExportControl;

use App\Exports\ExcelExports;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelCreate extends Controller
{
    public function export()
    {
        return Excel::download(new ExcelExports(), 'users.xlsx');
    }
}
