<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function users()
     {
        
        return view('admin.users.index',['users'=>User::orderBy('id','updated_at', 'desc')->paginate(5)]);
         
    }
    
    public function add(){
        
      return view('admin.users.add');  
    }
    
    public function add_post(UserAddRequest $request){
        
                
         $request->merge(array('password' => bcrypt($request->input('password'))));   
         User::create($request->except('_token'));
         
         return redirect()->route('admin.user.index')->with('info','Item created successfully!');
    
    }
    
    public function edit($id){
        
       return view('admin.users.update',['user'=>User::find($id)]);  
    }
    
    public function edit_post($id,UserEditRequest $request){
        
         if($request->has('password')) {     
            $request->merge(array('password' => bcrypt($request->input('password'))));     
          }
          
          
          $model=User::find($id);
          $model->update($request->except('_token'));
          $model->touch();
          return redirect()->back()->with('info','Item saved successfully!');    
     
    }
    
    
    
    public function delete($id){
        
       User::find($id)->delete(); 
        
      return redirect()->route('admin.user.index'); 
    }
}