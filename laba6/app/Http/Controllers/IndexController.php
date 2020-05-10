<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Test;
use App\Qestion;
use DB;
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment, Fill};
use PhpOffice\PhpSpreadsheet\IOFactory;
class IndexController extends Controller
{
    



    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data=$request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
      
        return view('auth/login');
        
    }






    public function CreateTestOpen(){
        return view('CreateTestName');
    }


    public function AddQuestion($Test_id){
        $unique1=0;
        return view('CreateQuestion',compact('Test_id','unique1'));
    }
    public function CreateQuestion(Request $request,$Test_id){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'isDisvount'=>['required','array'],
        ]);
        $data=$request->all();
        unset($data['isDisvount'][0]);
        $id_right=array();
       for ($i=1; $i <count($data['isDisvount'])+1 ; $i++) { 
          if($data['isDisvount'][$i]==1){
            array_push($id_right,$i-1);
          }
       }

       Qestion::create([
        'name' => $data['name'],
        'id_test' => $Test_id,
        'vopros' => $data['otvet'],
        'index_right' => $id_right,
    ]);
        return view('AddQuestion',compact('Test_id'));
    }


    public function CreateTest(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            
        ]);
        $data=$request->all();
        $ud=Auth::user()->id;
        Test::create([
            'name' => $data['name'],
            'id_user' => $ud,
        ]);
        $Test_id=DB::table('test')->Where("name", $data["name"])->Where("id_user", $ud)->value('id');
        return view('AddQuestion',compact('Test_id'));
    }

    

}
