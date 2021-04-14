<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    //Download do cúrriculo
    public function download(){
        return Storage::download('jackson_souza.pdf', 'jackson_souza.pdf', [
            'ResponseContentType' => 'application/pdf',
            'ResponseContentDisposition' => 'inline; filename=jackson_souza.pdf',
        ]);
    }
}
