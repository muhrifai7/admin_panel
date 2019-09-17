    <!-- Begin Page Content -->
    <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
             <?= $title; ?></h1>

        
          
			<div class="row">
      

				<div class="col-lg-7">
          <form action="<?= base_url('user/changePassword'); ?>" method="post">

          

              <?= $this->session->flashdata('messege'); ?>

              <div class="form-group row">
                <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
              </div>

              <?= form_error('current_password','<div class="alert alert-danger" role="alert">
              ', '</div>') ?>

              <div class="form-group row">
                <label for="new_password1" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="new_password1" name="new_password1">
              </div>

                <?= form_error('new_password1','<div class="alert alert-danger" role="alert">
              ', '</div>')  ?>

              </div>
               <div class="form-group row">
                <label for="new_password2" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="new_password2" name="new_password2">
              </div>
            </div>

      
              
              <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" id="button" name="button"> Send</button>
                </div>
              </div>

          </form>
        </div>
      </div>
    </div>

         



        















