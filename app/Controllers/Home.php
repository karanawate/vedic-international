<?php
namespace App\Controllers;
use App\Models\RegModel;
use App\Models\BlogModel;
class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function dashboard()
    {
       $session     = \Config\Services::session();
       $usersession = $session->get('adminsession');
        if($usersession)
        {
         return view('dashboard');
        }else{
          return view('login');
        }
    }
    public function register()
    {
        return view('register');
    }

    public function registerUser()
    {
        $regModel = new RegModel();
        if(isset($_POST['submit']))
        {
            $name          = $this->request->getVar('name');
            $email         = $this->request->getVar('email');
            $password      = $this->request->getVar('password');
            $rules         =[
                'name'     =>['rules' =>'required','error' => ['required' =>'Name is required']],
                'email'    =>['rules' =>'required','error' =>['required' =>'email is required']],
                'password' =>['rules' =>'required','error' =>['required' =>'password is required']]
            ];

              if(!$this->validate($rules))
              {
                return view('register',['validation' =>$this->validator]);
              }else{
                    $insertedData = array(
                        'name'       =>$name,
                        'email'      =>$email,
                        'password'   =>sha1($password)
                    );
                    $res = $regModel->RegisterSubmit($insertedData);
                    return redirect()->to(base_url('register'))->with('status', 'Login Successfully');
              }
        }else{   
             return redirect()->to('Login'); 
        }
    }
    public function loginUser()
    {
        return view('login');
    }

    public function check_login()
    {
        $regModel = new RegModel();
        if(isset($_POST['submit']))
        {
            $email         = $this->request->getVar('email');
            $password      = sha1($this->request->getVar('password'));
            $remember      = $this->request->getVar('remember');
            $rules         = [
                'email'    =>['rules' =>'required', 'error'  =>['required' =>'required email Id']],
                'password' =>['rules' =>'required', 'error'  =>['required' =>'required Password']]
            ];
                if(!$this->validate($rules))
                {
                    return view('login',['validation' =>$this->validator]);
                }else{
                    $res = $regModel->check_exit_admin($email, $password);
                    if(!empty($res))
                    {
                        $session     = \Config\Services::session();
                        $result      = $session->set("adminsession", $res);
                        $usersession = $session->get('adminsession');
                        if(!empty($this->request->getVar("remember"))) 
                        {
                            setcookie("email", $email , time()+3600, "/","", 0);
                            setcookie("password", $this->request->getVar('password'), time()+3600, "/", "",  0);
                            }
                        if(!empty($usersession))
                        {
                            return view('dashboard');
                        }else{
                            return redirect()->to(base_url('login'))->with('status', 'mobile or password is wrong');
                        }
                    }else{
                        return redirect()->to(base_url('login'))->with('status', 'mobile or password is wrong');
                    }
                }

        }
    }

    public function logout_user()
    {
        $session     = \Config\Services::session();
        $usersession = $session->get('adminsession');
        if(!empty($usersession)){
           $session = \Config\Services::session();
           $session->destroy();
           return view('login');
       }else{
        return view('login');
       }
    }

    public function blog_created()
    {
        $session      = \Config\Services::session();
        $usersession  = $session->get('adminsession');
        if($usersession)
        {   
            return view('blogs/blog_created');
        }else
        {
            return view('login');
        } 
    }

    public function views_blogs()
    {
        $BlogModel   = new BlogModel();
        $session               = \Config\Services::session();
        $usersession           = $session->get('adminsession');
        $data['getBlog']      =  $BlogModel->getBlogs();
        if($usersession)
        {
            return view('blogs/views_blogs', $data);
        }else{
            return view('login');
        }   
    }

    public function blog_submit()
    {
        $BlogModel   = new BlogModel();
        $session     = \Config\Services::session();
        $usersession = $session->get('adminsession');
            if(isset($_POST['submit'])){
                $title       = $this->request->getVar('title');
                $date        = $this->request->getVar('date');
                $description = $this->request->getVar('description');
                $fileName   = $this->request->getFile('blog_file');
                $filetype    = $fileName->getClientMimeType();
                $rules       = [
                    'title'       =>['rules' => 'required', 'required' => ['Title is required']],
                    'description' =>['rules' => 'required', 'required' => ['Description is required']],
                    'date'        =>['rules' => 'required', 'required' => ['date' =>'Date is required']]
                ];

                    if(empty($fileName) || empty($filetype) && !$this->validate($rules))
                    {
                        $data = array('errors' =>'File not selected', 'color' =>'red', 'validation' => $this->validator);
                        return view('blogs/blog_created', $data);
                    }else if(!$this->validate($rules))
                    {
                        return view('blogs/blog_created', ['validation' =>$this->validator]);
                    }else{
                        
                        $valid_img_type = array('image/png','image/jpeg', 'image/jpg');
                            if(in_array($filetype,$valid_img_type))
                            {
                                $filename = $fileName->getName();
                                $fileName->move('blogimages', $filename);
                                $blogaraay = array(
                                    'title'         => $title,
                                    'description'   => $description,
                                    'blog_file'     => $filename,
                                    'date'          => $date 
                                );
                                $result = $BlogModel->blogInserted($blogaraay);
                                if(!empty($result))
                                {
                                    return redirect()->to( base_url('add-blogs'))->with('msg', 'Blog Submited Successfully');   
                                }else{
                                    return redirect()->to( base_url('add-blogs'))->with('msg', 'Blog not submited successfully');   
                                }
                            }else{
                                return redirect('add-blogs');
                            }
                    }

            }else{
                    return redirect('add-blogs');
            }
    }


public function blog_delete($id = null)
{
   $session      = \Config\Services::session();
   $usersession  = $session->get('adminsession');
   if(!empty($usersession))
   {
    $model = new BlogModel();
    $data['post'] = $model->where('blogId', $id)->delete();
    return redirect()->to( base_url('view-blog'))->with('msg', 'Blog Deleted Successfully');
   }else{
        return view('login');
   } 
}
public function blog_edit()
{
    $session      = \Config\Services::session();
    $usersession  = $session->get('adminsession');
    $blogId       = $this->request->getVar('blogId');
    if(!empty($usersession))
    {
         $blogModel         = new BlogModel();
         $data['editblog']  = $blogModel->editBlog($blogId);
         return view('blogs/edit_blog',$data);

     }else{
        return view('login');
     }
    
}






































}
