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

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#menuModal"> Add new menu</a>

					<table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
          <tbody>

              <?php $i = 1; ?>

              <?php foreach ($menu as $m) : ?>
              <tr>
                
                <th scope="row"><?= $i; ?></th>

                <td><?= $m['menu']; ?></td>
                <td>
                  <a href="<?= base_url('menu/edit/'). $m['id'];  ?>" class="badge badge-primary mb-3" data-toggle="modal" data-target="#menuModal"> Edit</a>

                  <a href="<?= base_url('menu/delete/'). $m['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin hapus!');">Delete</a>
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
<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu');  ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="menu">New menu</label>
          <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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
      






