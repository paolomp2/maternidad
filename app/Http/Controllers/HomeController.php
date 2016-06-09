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
        
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Indicador de ejecución";//nombre de la p'agin;

        return view('home',compact('dataContainer'));
    }
    
    public function execute ()
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Ejecución";//nombre de la p'agin;
        $dataContainer->siderbar_type = "execute";

        return view('home',compact('dataContainer'));
    }

    
    public function assets ()
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Dashboard";//nombre de la p'agin;
        $dataContainer->siderbar_type = "assets";

        return view('home',compact('dataContainer'));
    }

    public function requirements ()
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Dashboard";//nombre de la p'agin;
        $dataContainer->siderbar_type = "request";

        return view('home',compact('dataContainer'));
    }

    public function providers ()
    {
        $dataContainer = new dataContainer;
        $dataContainer->page_name = "Dashboard";//nombre de la p'agin;
        $dataContainer->siderbar_type = "providers";

        return view('home',compact('dataContainer'));
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
