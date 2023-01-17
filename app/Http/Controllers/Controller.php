<?php

namespace App\Http\Controllers;

// use illuminate\routing\controler as basecontroller;
// use illuminate\support\facades\db;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // mengambil data dari table syllabus
   // $syllabus = DB::table('syllabus')->get();

    // mengirim data syllabus ke view index
    //return view('welcome', ['syllabus' => $syllabus]);

}