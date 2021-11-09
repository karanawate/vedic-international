<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

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
        $GalleryModel = new GalleryModel();
        $session      = \Config\Services::session();
        $usersession  = $session->get('adminsession');
          if(!empty($usersession)){
              $galleries = $GalleryModel->getGalleries();
              return view('gallery/view_gallery');
          }else{
              return view('login');
          }
    }

    public function galleryAdd()
    {
        $GalleryModel = new GalleryModel();
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
                       return view('gallery/add_gallery', ['validation' =>$this->validator]);
                    }else{
                        $valid_img_type = array('image/png','image/jpeg', 'image/jpg');
                        if(in_array($fileType,$valid_img_type))
                        {
                            $filename = $fileName->getName();
                            $fileName->move('blogimages', $filename);
                            $gallerydata = array(
                                'title'   =>$title,
                                'date'    =>$date,
                                'gal_file' =>$filename
                            );
                            $res = $GalleryModel->inserted_gallery($gallerydata);
                            if(!empty($res)){
                                return redirect()->to( base_url('add-gallery'))->with('msg', 'Added gallery Successfully');
                            }else{
                                return redirect()->to( base_url('add-gallery'))->with('msg', 'Added gallery Successfully');
                            }
                        }else{
                            return view('gallery/add_gallery');
                        }
                    }     
            }else{
                return view('login');
            } 
        }
    }

}
