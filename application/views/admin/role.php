    <!-- Begin Page Content -->
    <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
             <?= $title; ?> Page</h1>

        
          
			<div class="row">
      

				<div class="col-lg-7">
          <?= form_error('menu','<div class="alert alert-danger" role="alert">
              ',
            '</div>')  ?>

         <?= $this->session->flashdata('messege'); ?>

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#roleModal"> Add new role</a>

					<table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
          <tbody>

              <?php $i = 1; ?>

              <?php foreach ($role as $r) : ?>
              <tr>
                
                <th scope="row"><?= $i; ?></th>

                <td><?= $r['role']; ?></td>
                <td>

                  <a href="<?= base_url('admin/roleAccess/'). $r['id'];  ?>" class="badge badge-primary mb-3"> Access </a>
                  
                  <a href="<?= base_url('menu/edit/'). $r['id'];  ?>" class="badge badge-primary mb-3" data-toggle="modal" data-target="#menuModal"> Edit</a>



                  <a href="<?= base_url('menu/delete/'). $r['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin hapus!');">Delete</a>
                </td>
                <?php $i++;  ?>
              <?php endforeach; ?>
              </tr>
            </tbody>
          </table>
				</div>

			</div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="roleModalLabel">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role');  ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="menu">New role</label>
          <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
    </form>
    </div>
  </div>
</div>
      






