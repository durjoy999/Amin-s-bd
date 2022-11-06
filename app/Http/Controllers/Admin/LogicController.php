<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogicController extends Controller
{
    /**
     * List of all Logic
     */
    public function index()
    {
        $logics = Logic::with(['adminCreatedBy', 'adminEditedBy'])->latest()->get();
        return view('admin.pages.logic.index', [
            'logics' => $logics
        ]);
    }
    public function show(Request $request){

         if($request->version == null && $request->group == null && $request->class == null){
                return back();
           }
         else{
            if ($request->version == null && $request->group == null) {
                $class= $request->class;
                echo Logic::where('class', $class)->get();
                echo "class";
            } elseif ($request->version == null && $request->class == null) {
                $group = $request->group;
                echo Logic::where('group', $group)->get();
            } elseif ($request->group == null && $request->class == null) {
                $version = $request->version;
                echo Logic::where('version', $version)->get();
            } elseif ($request->class == null) {
                $version = $request->version;
                 $group = $request->group;
                echo Logic::where('group', $group)->where('version', $version)->get();
            } elseif ($request->group == null) {
                $version = $request->version;
                $class = $request->class;
                echo Logic::where('class', $class)->where('version', $version)->get();
            } elseif ($request->version == null) {
                $group = $request->group;
                $class = $request->class;
               echo Logic::where('class', $class)->where('group', $group)->get();
            }
            else{
                 $group = $request->group;
                 $class = $request->class;
                 $version = $request->version;
          echo  Logic::where('class', $class)->where('group', $group)->where('version', $version)->get();
            }
         }
    }
}
