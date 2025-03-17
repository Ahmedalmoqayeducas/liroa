<?php

namespace App\Http\Controllers\fileSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class fileController extends Controller
{
    function index() {
        return view('pages.fileSystem.index');
    }
}
