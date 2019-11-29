<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadDragDropController extends Controller
{
    
function subir() {
    return view('formDragDrop.dragDrop');
}

function upload(Request $request) {
    if($request->hasFile('file') && $request->file('file')->isValid()) {
    $file = $request->file('file');
    $target = '../../../upload/';
    $name = $file->getClientOriginalName();
    $file->move($target, $name);
    }
    return redirect('subirDragDrop');
    // return response()->file($target . $name);
}

function ver($archivo) {
    $array = [
    '3' => '3.jpg',
    '4' => '4.jpg',
    ];
    $mostrar = 'default.html';
    if(isset($array[$archivo])) {
    $mostrar = $array[$archivo];
    }

    return response()->file('../../../upload/' . $mostrar);
}