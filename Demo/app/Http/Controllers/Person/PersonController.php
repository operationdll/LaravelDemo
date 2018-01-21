<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller{
    public function getList(){
        if(Input::all()){
            //设置session值
            session(['user'=>'已登录']);
            //查询
            $input = Input::all();
            $persons = DB::table('PersonalProfile')
                ->where('f_name','like','%'.$input['name'].'%')
                ->orWhere('l_name','like','%'.$input['name'].'%')
                ->get();
            echo $persons;
        }else{
            $persons = DB::table('PersonalProfile')->get();
            return view('person.list',['persons'=>$persons]);
        }

    }

    public function add(Request $request){
        //if($request->isMethod('POST')){
        if(Input::all()){
            //文件上传
            $file = $request->file('photo');
            $fileName="";
            if($file->isValid()){
                //原文件名
                $orginName = $file->getClientOriginalName();
                //扩展名
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                //文件绝对路径
                $realPath = $file->getRealPath();
                $fileName=date('Y-m-d-H-i-s').'-'.uniqid().'.'.$ext;
                $bol = Storage::disk('uploads')->put($fileName,file_get_contents($realPath));
            }
            $input = Input::all();
            DB::table('PersonalProfile')->insert([
                'F_name'=>$input['fname'],
                'L_name'=>$input['lname'],
                'photo'=>$fileName,
                'email'=>$input['email'],
                'phone'=>$input['phone'],
                'provence'=>$input['provence'],
                'city'=>$input['city'],
                'address'=>$input['address'],
                'short_desc'=>$input['shortDesc'],
            ]);
            return redirect('person/list');
        }else{
            return view('person.add');
        }
    }

    public function delete(){
        $input = Input::all();
        DB::table('PersonalProfile')->where('user_id',$input['id'])->delete();
        return redirect('person/list');
    }

    public function update(Request $request){
        $input = Input::all();
        if($request->isMethod('post')){
            DB::table('PersonalProfile')
                ->where('user_id',$input['id'])
                ->update([
                'F_name'=>$input['fname'],
                'L_name'=>$input['lname'],
                'photo'=>$input['photo'],
                'email'=>$input['email'],
                'phone'=>$input['phone'],
                'provence'=>$input['provence'],
                'city'=>$input['city'],
                'address'=>$input['address'],
                'short_desc'=>$input['shortDesc'],
            ]);
            return redirect('person/list');
        }else{
            $person = DB::table('PersonalProfile')->where('user_id',$input['id'])->first();
            return view('person.add',['person'=>$person]);
        }
    }

}
