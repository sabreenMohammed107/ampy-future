<?php

namespace App\Http\Controllers;

// use App\Models\Branch;

use App\Models\Company;
use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
   // This is for General Class Variables.
   protected $model;
   protected $view;
   protected $route;

   /**
    * UserController Constructor.
    *
    * @return \Illuminate\Http\Response
    */
   public function __construct(User $model)
   {
       $this->middleware('auth');

       $this->model = $model;
       $this->view = 'admin.users.';
       $this->route = 'users.';
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model::get();

        return view($this->view.'index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

$companies=Company::pluck('name','id')->all();
        return view($this->view.'add',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Validating fields
        // $this->validate($request, [
        //     'f_name' => 'required',
        //     'l_name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'phone' => 'required|unique:users',
        //     'username' => 'required|unique:users',
        //     'password' => 'required',
        //     'roles' => 'required',
        // ],
        // [
        //     'f_name.required' => 'حقل الاسم الاول مطلوب',
        //     'l_name.required' => 'حقل الاسم الاخير مطلوب',
        //     'username.required' => 'حقل اسم المستخدم مطلوب',
        //     'phone.required' => 'حقل التليفون مطلوب',
        //     'email.required' => 'حقل البريد الالكترونى مطلوب',
        //     'password.required' => 'حقل كلمه السر مطلوب',
        //     'roles.required' => 'حقل الادوار مطلوب',
        //     'email.unique' => 'البريد الالكترونى  موجود بالفعل',
        //     'phone.unique' => 'التليفون موجود بالفعل',
        //     'username.unique' => 'اسم المستخدم موجود بالفعل',
        // ]);

        try {
            $input = $request->all();
            $input['password'] = \Hash::make($input['password']);
            $input['company_id']=$request->input('company');
            if ($request->hasFile('image')) {
                $attach_image = $request->file('image');

                $input['image'] = $this->UplaodImage($attach_image);
            }
            $user = $this->model::create($input);


            // Display a successful message ...
            return redirect()->route($this->route.'index')->with('flash_success','تم إنشاء المستخدم بنجاح');

        } catch (\Exception $e){
            return redirect()->route($this->route.'index')->with('flash_danger','خطأ ... لا يمكن الحذف حتي لا تتأثر البيانات الأخري بعملية الحذف !!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->model::findOrFail($id);
        $user->password = null;
        $companies=Company::pluck('name','id')->all();
        // $roles = Role::pluck('name','name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();
        // $branches = Branch::pluck('name','id')->all();
        // $userBranch = $user->branches->pluck('name','name')->all();
        return view($this->view.'edit', compact('user','companies'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 // Validating fields
        // $this->validate($request, [
        //     'f_name' => 'required',
        //     'l_name' => 'required',
        //     'email' => 'required|email|unique:users,email,'.$id,
        //     'phone' => 'required|unique:users,phone,'.$id,
        //     'username' => 'required|string|unique:users,username,'.$id,

        //     'roles' => 'required',
        // ],
        // [
        //     'f_name.required' => 'حقل الاسم الاول مطلوب',
        //     'l_name.required' => 'حقل الاسم الاخير مطلوب',
        //     'username.required' => 'حقل اسم المستخدم مطلوب',
        //     'phone.required' => 'حقل التليفون مطلوب',
        //     'email.required' => 'حقل البريد الالكترونى مطلوب',

        //     'roles.required' => 'حقل الادوار مطلوب',
        //     'email.unique' => 'البريد الالكترونى  موجود بالفعل',
        //     'phone.unique' => 'التليفون موجود بالفعل',
        //     'username.unique' => 'اسم المستخدم موجود بالفعل',
        // ]);
        try {

            $input = $request->all();
            if($input['password'] != null)
                $input['password'] = \Hash::make($input['password']);
            else
                unset($input['password']);

            $input['company_id']=$request->input('company');
            if ($request->hasFile('image')) {
                $attach_image = $request->file('image');

                $input['image'] = $this->UplaodImage($attach_image);
            }
            $user = $this->model::findOrFail($id);
            $user->update($input);

            // \DB::table('model_has_roles')->where('model_id',$id)->delete();
            // $user->assignRole($request->input('roles'));
            // $user->branches()->sync($request->input('branches'));
            // Display a successful message ...
            return redirect()->route($this->route.'index')->with('flash_success','تم تعديل بيانات المستخدم بنجاح');

        } catch (\Exception $e){
            return redirect()->route($this->route.'index')->with('flash_danger','خطأ ... لا يمكن الحذف حتي لا تتأثر البيانات الأخري بعملية الحذف !!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $account = $this->model::findOrFail($id);
            $account->delete();

            // Display a successful message ...
            return redirect()->route($this->route.'index')->with('flash_success','تم حذف بيانات المستخدم بنجاح');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            // Display a successful message ...
            return redirect()->route($this->route.'index')->with('flash_danger','خطأ ... لا يمكن الحذف حتي لا تتأثر البيانات الأخري بعملية الحذف !!!');
        }
    }

     /* uplaud image
       */
      public function UplaodImage($file_request)
      {
          //  This is Image Info..
          $file = $file_request;
          $name = $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          $size = $file->getSize();
          $path = $file->getRealPath();
          $mime = $file->getMimeType();

          // Rename The Image ..
          $imageName = $name;
          $uploadPath = public_path('uploads/users');

          // Move The image..
          $file->move($uploadPath, $imageName);

          return $imageName;
      }
}
