<?php

namespace App\Http\Controllers;

use App\Models\User_payrol_rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayrollRulesController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User_payrol_rule $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.payroll-rules.';
        $this->routeName = 'payroll-rules.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = User_payrol_rule::orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = User_payrol_rule::findOrFail($id);
        return view($this->viewName . 'edit', compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{
        $pay =User_payrol_rule::where('id',$id)->first();
        $pay->basic_salary = $request->get('basic_salary');
        $pay->settlements = $request->get('settlements');
        $pay->allowances = $request->get('allowances');
        $pay->taxes = $request->get('taxes');
        $pay->insurance = $request->get('insurance');
            $pay->update();
            return redirect()->route($this->routeName . 'index')->with('flash_success', 'تم تعديل بيانات المستخدم بنجاح');

        } catch (\Exception$e) {
                     return redirect()->route($this->routeName.'index')->with('flash_success', $e->getMessage());

            // return redirect()->route($this->routeName . 'index')->with('flash_danger', 'خطأ ...  !!!');
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
        //
    }
}
