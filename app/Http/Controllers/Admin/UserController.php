<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

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
    
    public function add(Request $request){
        
        
          if ($request->isMethod('post')){
          
         // dump($request->all());
          
          $v = Validator::make($request->all(), [
                  'name' => 'required|max:255',
                  'email' => 'required|email|max:255|unique:users',
                  'password' => 'min:6|confirmed',
                  'role'=>'required'
           ]);
           
         
          
          if ($v->fails())
                {
                    return redirect()->back()->withErrors($v->errors()); 
                }
                
                
         $request->merge(array('password' => bcrypt($request->input('password'))));   
         User::create($request->except('_token'));
         
         return redirect()->route('admin.user.index')->with('info','Item created successfully!');
      }
        
      return view('admin.users.add');  
    }
    
    
    
    public function edit($id,Request $request){
        
       
      if ($request->isMethod('post')){
          
          $array_validate=[
                  'name' => 'required|max:255',
                  'role'=>'required'
            ];
            
          if($request->has('password')){
              array_push($array_validate,['password' => 'min:6|confirmed']);
            }
          
          $v = Validator::make($request->all(),$array_validate);
           
         
          
          if ($v->fails())
            {
             return redirect()->back()->withErrors($v->errors()); 
            }
                
          if($request->has('password')) {     
            $request->merge(array('password' => bcrypt($request->input('password'))));     
          }
          
          $request->except('_token'); 
          $model=User::find($id);
         
          $model->update($request->except('_token'));
          $model->touch();
          return redirect()->back()->with('info','Item saved successfully!');    
      }
     
      return view('admin.users.update',['user'=>User::find($id)]);  
    }
    
    public function delete($id){
        
       User::find($id)->delete(); 
        
      return redirect()->route('admin.user.index'); 
    }
}