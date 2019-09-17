    <!-- Begin Page Content -->
    <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
             <?= $title; ?> Page</h1>

        
          
			<div class="row">
      

				<div class="col">
          <?= form_error('smenu','<div class="alert alert-danger" role="alert">
              ',
            '</div>')  ?>
            <?= form_error('subMenu','<div class="alert alert-danger" role="alert">
              ',
            '</div>')  ?>
            <?= form_error('url','<div class="alert alert-danger" role="alert">
              ',
            '</div>')  ?>
            <?= form_error('icon','<div class="alert alert-danger" role="alert">
              ',
            '</div>')  ?>

         <?= $this->session->flashdata('messege'); ?>

        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#subMenuModal"> Add new submenu</a>

					<table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Title</th>
                <th scope="col">Url</th>
                <th scope="col">Icon</th>
                <th scope="col">Is_Active</th>
                <th scope="col">Action</th>
            </thead>
          <tbody>

              <?php $i = 1; ?>

              <?php foreach ($subMenu as $sm) : ?>
              <tr>
                
                <th scope="row"><?= $i; ?></th>

                <td><?= $sm['menu']; ?></td>
                <td><?= $sm['title']; ?></td>
                <td><?= $sm['url']; ?></td>
                <td><?= $sm['icon']; ?></td>
                <td><?= $sm['is_active']; ?></td>
                <td>
                
                  <a href="<?= base_url('menu/editSubMenu/').$sm['id']  ?>" class="badge badge-primary modalUbah" data-toggle="modal" data-target="#subMenuModal" data-id="<?= $sm['id']; ?>">edit</a>
                  <a href="<?= base_url('menu/deleteSubmenu/'). $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('yakin hapus!');">delete</a>
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
<div class="modal fade" id="subMenuModal" tabindex="-1" role="dialog" aria-labelledby="subMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title tombolTambahMenu" id="subMenuModalLabel">Add New Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu');  ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
          <label for="title">Sub menu title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
          <select class="custom-select" name="menu_id">
              Select menu 
              <option value="">Select menu</option>
              <?php foreach ($menu as $m) :?>
              <option value="<?= $m['id'];  ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
          </select>     
        </div>
        <div class="form-group">
          <label for="url">Url</label>
          <input type="text" class="form-control" id="url" name="url"> 
        </div>
          <div class="form-group">
          <label for="icon">Icon</label>
          <input type="text" class="form-control" id="icon" name="icon">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" checked>
            <label class="form-check-label"> Active?</label>
          </div>
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
      







