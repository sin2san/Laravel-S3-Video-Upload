<?php namespace App\Http\Controllers\Site;

use DB;
use Hash;
use App\User;
use App\Http\Requests\Site\RegisterRequest;
use App\Http\Requests\Site\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function __construct(User $user, Permission $permission, Role $role)
    {
        $this->module = "auth";
        $this->user = $user;
        $this->permission = $permission;
        $this->role = $role;

        $this->option = Cache::get('optionCache');
    }

    public function get_register(){
        $module = $this->module;
        if(Auth::user()){
            if(Auth::user()->hasRole('admin')){
                return redirect('admin/dashboard')->with('success', 'You are already logged in.');
            }else{
                return redirect('/')->with('success', 'You are already logged in.');
            }
	    }else{
	        return view('site.'.$module.'.register');
	    }
    }

    public function post_register(RegisterRequest $request)
    {
        $this->user->name = $request->first_name.' '.$request->last_name;
        $this->user->email = strtolower($request->email);
        $this->user->password = Hash::make($request->password);
        $this->user->age = $request->age;
        $this->user->gender = $request->gender;
        $this->user->ethnicity = $request->ethnicity;
        $this->user->save();

        $userId = $this->user->id;

        //Assign role
        DB::table('model_has_roles')->insert(['role_id' => '2','model_id' =>  $userId, 'model_type'=>'App\User']);

        return redirect('login')->with('success', 'You have successfully registered with our system');
    }

    public function get_login()
    {
	    $module = $this->module;
	    if(Auth::user()){
            if(Auth::user()->hasRole('admin')){
                return redirect('admin/dashboard')->with('success', 'You are already logged in.');
            }else{
                return redirect('/')->with('success', 'You are already logged in.');
            }
	    }else{
	        return view('site.'.$module.'.login');
	    }
    }

    public function post_login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->login_email,
            'password' => $request->login_pass,
        ];

        if (Auth::attempt($credentials)){
            $user = Auth::user();
            Session::put('user', $user);

            //Function to prevent user to login from one device at a time
            $previous_session = $user->session_id;
            if ($previous_session) {
                Session::getHandler()->destroy($previous_session);
            }
            Auth::user()->session_id = Session::getId();
            Auth::user()->save();

            if($user->hasRole('admin')){
                return redirect('admin/dashboard')->with('success', 'Hello '.$user->name.' !');
            }elseif($user->hasRole('user')){
                return redirect('/');
            }else{
                return redirect()->back()->with('error', 'Unautharized access.');
            }
        }else{
            return redirect()->back()->with('error', 'Username or Password Invalid');
        }
    }

    public function get_logout()
    {
        //CLEAR ALL SESSIONS
        Session::forget('user');
        Auth::logout();
        return redirect('login');
    }
}
