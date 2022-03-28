<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class downloadFilesController extends Controller
{


    public function index(Request $request) {

        $getIIN = $request->input('sendIIN');
        $zip = new ZipArchive;

        $fileName = $getIIN.'zipFileName.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            /**
             *  НЕ ЗАБЫВАЕМ ПОДКЛЮЧИТЬ php artisan storage:link
             */
            // Folder files to zip and download
            // files folder must be existing to your public folder
            // динамически создаем папку для сохранения где .$getIIN означает что у папки у будет название
            $files = File::files(storage_path('app/public/folder/'.$getIIN.'/'));
//            $files = File::files(storage_path('app/public/folder/777/'));
//                dd($files);
            // loop the files result
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
            // если хотим просто удалить файл zip file
//            unlink($getIIN.'zipFileName.zip');
        }

        // Download the generated zip и deleteFileAfterSend() - означает что удаляем после скачивания
        return response()->download(public_path($fileName))->deleteFileAfterSend();

    }
}
