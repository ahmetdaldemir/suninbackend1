<?php namespace App\Http\Controllers;

class MainController extends Controller
{

    public function index()
    {
        return view('welcome');
    }


    public function contact()
    {
        return view('pages/contact');
    }

    public function blog()
    {
        return view('pages/blog');
    }

    public function about()
    {
        return view('pages/static');
    }

    public function detail()
    {
        return view('pages/detail');
    }

    public function listing()
    {
        return view('pages/list');
    }

    public function add_listing()
    {
        return view('pages/add_listing');
    }

}