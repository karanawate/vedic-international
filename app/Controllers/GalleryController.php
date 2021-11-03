<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GalleryController extends BaseController
{
    public function index()
    {
        $session      = \Config\Services::session();
        $usersession  = $session->get('adminsession');
        if(!empty($usersession)){
            return view('gallery/add_gallery');
        }else{
            return view('login');
        } 
    }

    public function view_gallery()
    {
         return view('gallery/view_gallery');
    }

}
