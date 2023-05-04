<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SliderService;
use App\Services\Views\ProductService;
use App\Services\UserService;
use Illuminate\Http\Request;

class MainController extends Controller
{   
    protected $sliderService;
    protected $productService;
    protected $userService;

    public function __construct(SliderService $sliderService, ProductService $productService, UserService $userService){
        $this->sliderService = $sliderService;
        $this->productService = $productService;
        $this->userService = $userService;
    }

    // Home page user
    public function index()
    {
        return view('user.home', [
            'title' => 'Trang chủ',
            'sliders' => $this->sliderService->getSliders(),
            'products' => $this->productService->getNewest()
        ]);
    }

    // Introduction website
    public function intro(){
        return view('user.intro',[
            'title' => 'Giới thiệu'
        ]);
    }
    //Contact form 
    public function contact(){
        return view('user.contact',[
            'title' => 'Liên hệ'
        ]);
    }
    //Send Contact form
    public function sendContact(Request $request){
        $message = $this->userService->sendContact($request->email, $request->msg);
        return redirect()->back()->with('message', $message);
    }
}
