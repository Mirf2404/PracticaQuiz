<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Models\Pais;

class SettingController extends Controller
{
    public function index(){
        $checked = session('afterInsert', 'show games');
        $checkedList='checked';
        $checkedCreate='';
        
        if($checked != 'show games'){
            $checkedCreate='checked';
            $checkedList='';
        }
         $checked = session('Edit', 'show games edit');
        $checkedList2='checked';
        $checkededit='';
        
        if($checked != 'show games edit'){
            $checkededit='checked';
            $checkedList2='';
        }
        
        return view('setting.index',['checkedList' => $checkedList, 'checkedCreate' => $checkedCreate, 'checkededit' => $checkededit, 'checkedList2' => $checkedList2]);
    }
    
    public function update(Request $request){
        session(['afterInsert'=> $request->afterInsert]);
        return  back();
    }
    
  
}