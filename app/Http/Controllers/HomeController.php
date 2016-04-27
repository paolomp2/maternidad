<?php

namespace Maternidad\Http\Controllers;

use Illuminate\Http\Request;

use Maternidad\Http\Requests;
use Maternidad\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        
    }

    public function index()
    {

        $data=[
            'page_name' => "Inicio",
            'siderbar_type' => "",
            'chart' => false,
            'chart_model' => '',
        ];

        return view('home',compact('data'));
    }
    
    public function execute ()
    {
        $data=[
            'page_name' => "Ejecución",
            'siderbar_type' => "execute",
            'chart' => false,
            'chart_model' => '',
        ];

        return view('home',compact('data'));
    }

    
    public function assets ()
    {
        $data=[
            'page_name' => "Dashboard",
            'siderbar_type' => "",
            'chart' => false,
            'chart_model' => '',
        ];

        return view('home',compact('data'));
    }

    public function requirements ()
    {
        $data=[
            'page_name' => "Dashboard",
            'siderbar_type' => "",
            'chart' => false,
            'chart_model' => '',
        ];

        return view('home',compact('data'));
    }

    public function providers ()
    {
        $data=[
            'page_name' => "Dashboard",
            'siderbar_type' => "",
            'chart' => false,
            'chart_model' => '',
        ];

        return view('home',compact('data'));
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
        //
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
