<?php


namespace App\Service;

use Illuminate\Support\ServiceProvider;

//use  Illuminate\Events\Dispatcher;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use JeroenNoten\LaravelAdminLte\AdminLte;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Event;

class Menu
{
    
    private $dispatcher;
    
   
    
    
    public function boot(){
        
     
   
     
    
    if (Auth::user()) {  
        
       
            
            Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
                
             if(Auth::user()->role!='admin'){
                  $count=Product::where("user_id","=",Auth::id())->count();
            }else{
              $count = Product::all()->count();  
            }    
            
            
            
                
              
            $event->menu->add('MAIN NAVIGATION');
            $event->menu->add(
                [
                   'text'        => 'Products',
                   'url'         => url('admin/products'),
                   'icon'        => 'file',
                   'label'       => $count,
                   'label_color' => 'success',
               ]);
               
            if(Auth::user()->role=="admin") {  
            $count = User::all()->count();      
            $event->menu->add(
                [
                   'text'        => 'Users',
                   'url'         => url('admin/users'),
                   'icon'        => 'file',
                   'label'       => $count,
                   'label_color' => 'success',
               ]);
               
            }  
            $event->menu->add(
                [
                   'text'        => 'Grafic',
                   'url'         => url('admin/products/grafic'),
                   
               ]);   
               
   

            
            
            

            
        });
        
    }
    
    
    
        }   
        
    
    
    
}