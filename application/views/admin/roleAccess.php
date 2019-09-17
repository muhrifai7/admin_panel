    <!-- Begin Page Content -->
    <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
             <?= $title; ?> Page</h1>

        
          
			<div class="row">

         <?= $this->session->flashdata('messege'); ?>

    
    <h5 class="pl-3"> Role : <?= $role['role'];  ?></h5>
    <br><br>
					<table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">menu</th>
                <th scope="col">Access</th>
              </tr>
            </thead>
          <tbody>

              <?php $i = 1; ?>

              <?php foreach ($menu as $m) : ?>
              <tr>
                
                <th scope="row"><?= $i; ?></th>

                <td><?= $m['menu']; ?></td>
                <td>
  <?php 
    $role_id = $role['id'];
    $menu_id = $m['id'];

   ?>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                    <?= check_access($role_id, $menu_id); ?> data-role="<?= $role_id; ?>" data-menu=" <?= $menu_id; ?>">
                  </div>

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


