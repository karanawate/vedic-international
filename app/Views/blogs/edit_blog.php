<?php
  $session = \Config\Services::session();
  $usersession['usersession'] = $session->get('adminsession');
  ?>
  <!-- <style>
    <link href="../template/theme/css/sdk-inline.css" rel="stylesheet" />
  </style> -->
    <?php echo view('header',$usersession); ?>  
       <!--start sidebar -->
     <?php echo view('sidebar',$usersession); ?>
     <div class="page-content">
      <div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Edit Added</h6>
						<hr/>
						<div class="card">
							<div class="card-body">
								<div class="p-4 border rounded">
									<form class="row g-3 needs-validation"  method="POST"  action="<?php echo base_url('blog-submit'); ?>" enctype="multipart/form-data" >
										<div class="col-md-6">
											<label for="validationCustom01" class="form-label">Title</label>
											<input type="text" name="title" value="<?php echo  $editblog[0]['title']; ?>" class="form-control">
											<span style="color:red"><?php if(isset($validation)) { echo $validation->getError('title'); } ?></span>
										</div>
										<div class="col-md-6">
											<label for="validationCustom02" class="form-label">Date</label>
											<input type="date" name="date"  value="<?php echo $editblog[0]['date']; ?>" class="form-control" id="validationCustom02">
											<span style="color:red"><?php if(isset($validation)) {echo $validation->getError('date'); } ?></span>
										</div>
										<div class="mb-3">
												<label for="formFile" class="form-label">blog banner</label>
												<input class="form-control" type="file" name="blog_file" id="formFile">
												<span style="color:red"><?php if(isset($errors)) { echo $errors; }?></span>
										</div>
										<div class="mb-3">
											<label for="formFile" class="form-label">Description</label>
											<textarea name="description" value="<?php echo $editblog[0]['description']; ?>"  col="10" row="10"  style="border:black" ><?php echo $editblog[0]['description']; ?></textarea>
											<span style="color:red"><?php if(isset($validation)) { echo $validation->getError('description'); } ?></span>
										</div>
										<div class="col-12">
											<button class="btn btn-primary" type="submit" name="submit"   value="submit">Submit form</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
     </div>
     <?php echo view('footer',$usersession); ?>
	 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
     <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>   
     <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
	 
     <script>
      CKEDITOR.replace( 'description' );
    </script>

</body>

</html>