<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BTTHController extends Controller
{
    public function index() {
        return view('btth.thanh_vien');
    }
    public function showLevelTwoDirectories($id)
    {
        $directories = File::directories(resource_path("views/btth/$id"));
        return view('btth.list_level_two_directories', compact('directories', 'id'));
    }

    public function showLevelThreeFiles($id, $levelTwoFolder)
    {
        $directory = resource_path("views/btth/$id/$levelTwoFolder");
        $files = File::files($directory);
        $fileNames = [];
        foreach ($files as $file) {
            $fileName = pathinfo($file)['filename'];
            $fileNames[] = $fileName;
        }
        return view('btth.list_level_three_files', compact('id', 'levelTwoFolder', 'fileNames'));
    }

    public function showFileContent($id, $levelTwoFolder, $fileName)
    {
        $filePath = resource_path("views/btth/$id/$levelTwoFolder/$fileName.php");
        if (File::exists($filePath)) {
            return view("btth.$id.$levelTwoFolder.$fileName");
        } else {
            abort(404);
        }
    }
}
