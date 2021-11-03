<?php
  $session                   = \Config\Services::session();
  $usersession['usersession'] = $session->get('adminsession');
  ?>
    <!-- <style>
      <link href="../template/theme/css/sdk-inline.css" rel="stylesheet" />
    </style> -->
    <?php echo view('header',$usersession); ?>

    <style>
		  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      #editbutton{
        border:none;
      }
	 </style>
    
       <!--start sidebar -->
     <?php echo view('sidebar',$usersession) ?>

     <div class="page-content">
         
     <div class="card">
                 <div class="card-body">
                   <div class="d-flex align-items-center">
                      <h5 class="mb-0">Blog's Details</h5>
                       <form class="ms-auto position-relative">
                         <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                         <input class="form-control ps-5" type="text" placeholder="search">
                       </form>
                   </div>
                   <div class="table-responsive mt-3">
                     <table class="table align-middle">
                       <thead class="table-secondary">
                         <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>date</th>
                          <th>Created_at</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                          <td></td>
                           <td>
                             <div class="d-flex align-items-center gap-3 cursor-pointer">
                                <img src="#" class="rounded-circle" width="44" height="44" alt="">
                                <div class="">
                                  <p class="mb-0">asasas</p>
                                </div>
                             </div>
                           </td>
                           <td>sds</td>
                           <td>dwsd</td> 
                           <td>
                             <div class="table-actions d-flex align-items-center gap-3 fs-6">
                               <a href ="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"><i class="bi bi-eye-fill"></i></a>
                                  <form action="<?php echo base_url('view-gallery') ?>" method="POST">
                                    <input  type="hidden" value="<?php echo $blog['blogId']; ?>" name="blogId">
                                   <button type="submit" class="text-warning" style="border: none;"  title="Edit"><i class="bi bi-pencil-fill"></i></button>
                                  </form>
                              <a href ="#" class="text-danger"  data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><i class="bi bi-trash-fill"></i></a>                           
                             </div>
                           </td>
                         </tr>
                      
                       </tbody>
                     </table>
                   </div>
                 </div>
               </div>
     </div>
     
     <?php echo view('footer',$usersession); ?>
     <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
  $(document).ready(function(){
    <?php if(session()->getFlashdata('msg')) { ?>
      alertify.set('notifier','position', 'top-right');
      alertify.success("<?= session()->getFlashdata('msg') ?>");
    <?php } ?>
  });
</script>

