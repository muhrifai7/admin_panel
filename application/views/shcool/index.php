<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= base_url('admin'); ?>">Live CRUD Data Mahasiswa </a>
    
  </nav>
</div>
<div class="container">
  <div class="col-lg">
    
  <div class="alert alert-success" id="alert" style="display:none"></div>
  <div class="col-lg-4">
    <h4>Student List</h4>
  <div class="input-group mb-3">
    <!-- <form action="" method="get"> -->
  <input type="text" class="form-control search" id="search" autofocus="" name="search" placeholder="Searcing data... " aria-label="Recipient's username" aria-describedby="button-addon2">
<!-- </form> -->
  <div class="input-group-append">
</div>
  </div>
</div>
<!-- data-toggle="modal" data-target="#subMenuModal" -->


<div class="col-lg-4">
<button class=" btn-primary mb-3 pl-2 addData" >Add new data"</button>
 </div>   
   <div class="row">
    <div class="col-lg-8">
       
      <div id="reload">
        <table class="table table-hover" id="mydata">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nrp</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
          </tr>
        </thead>
 
      <tbody id="show_data">

      </tbody>
  </table>
  </div>
  </div>
</div>


		<!-- MODAL ADD -->
        <!-- Modal -->
<div class="modal fade" id="subMenuModal" tabindex="-1" role="dialog" aria-labelledby="subMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title tombolTambahMenu" id="subMenuModalLabel">Add New mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="myForm" action="" method="post">
        <input type="hidden" name="id" value="0">
      <div class="modal-body">
        <div class="form-group">
          <label for="nrp">Nrp</label>
          <input type="text" class="form-control" id="nrp" name="nrp" autocomplete="off">
        </div>
        
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" autocomplete="off"> 
        </div>
          <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete="off">
        </div>
      
      <div class="modal-footer">
        <button type="button" id="btnSave" class="btn btn-primary">Add</button>
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
    </form>
    </div>
  </div>
</div>


<!-- delete -->
<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title deleteMenuLabel" id="deleteLabel">Add New mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="myForm" action="" method="post">
        <input type="hidden" name="id" value="">
      <div class="modal-body">
        <div class="form-group">
          <label for="nrp">Nrp</label>
          <input type="text" class="form-control" id="nrp" name="nrp" autocomplete="off">
        </div>
        
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" autocomplete="off"> 
        </div>
          <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete="off">
        </div>
      
      <div class="modal-footer">
        <button type="button" id="btnDelete" class="btn btn-primary">Add</button>
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        
      </div>
    </form>
    </div>
  </div>
</div> -->



