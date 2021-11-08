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

    public function galleryAdd()
    {
        if(isset($_POST['submit']))
        {
            $session      = \Config\Services::session();
            $usersession  = $session->get('adminsession');
            if(!empty($usersession))
            { 
                    $title      = $this->request->getVar('title');
                    $date       = $this->request->getVar('date');
                    $fileName   = $this->request->getFile('galfile');
                    $fileType   = $fileName->getClientMimeType();

                    $rules      = [
                        'title' =>['rules' =>'required', 'required' =>[ 'Title is required']],
                        'date'  =>['rules' =>'required', 'required' =>['date is required']],
                    ];
                    if(empty($fileName) || empty($filetype) && !$this->validate($rules))
                    {
                       $data = array(
                           'errors'        => 'File not found',
                           'color'         => 'red',
                           'validation'    =>$this->validator 
                       );
                       return view('gallery/add_gallery', $data);
                    }else if(!$this->validate($rules)){ 
                        echo "validation found";
                    }else{
                        echo "sdfa";
                    }    
                    
                    
            }else{
                return view('login');
            } 
        }
    }

}
