<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function inserUser(request $request){
        $name = $request->name;
        $department = $request->department;
        $permittion = $request->permittion;
        $phone = $request->phone;
        $password = $request->password;

        $Users = new Users();
        $Users->name = $name;
        $Users->department = $department;
        $Users->permittion = $permittion;
        $Users->phone = $phone;
        $Users->password = $password;
        $Users->save();

        return response()->json([
            'message' => 'เพิ่ม User สำเร็จ',
            'date' => $Users,

        ], 201);
    }

    public function editUser(request $request, $id){
        $name = $request->name;
        $department = $request->department;
        $permittion = $request->permittion;
        $phone = $request->phone;
        $password = $request->password;

        $Users = Users::find($id);
        $Users->name = $name;
        $Users->department = $department;
        $Users->permittion = $permittion;
        $Users->phone = $phone;
        $Users->password = $password;
        $Users->save();

        return response()->json([
            'message' => 'แก้ไข',
            'date' => $Users,

        ], 200);

    }
    public function deleteUser($id)
    {
        $Users = Users::find($id);
        $Users->delete();

        return response()->json([
            'message' => 'ลบผู้ใช้งานสำเร็จ',
            'data' => '',
        ], 200);
    }

    public function getUser()
    {
        $Users = Users::all();

        return response()->json([
            'message' => 'แสดงรายชื่อสำเร็จ',
            'data' => $Users,
        ], 200);
    }
}
