 
   <div class="row">
    <div class="col-lg-6">
       
      <!-- <div id="reload"> -->
        <div id="ajaxContent"></div>
        <table class="table table-hover" id="mydata">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nrp</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Jurusan</th>
          </tr>
        </thead>
 
      <tbody id="show_data">
          <?php if (!empty($mahasiswa)) { ?>
            <?php foreach ($mahasiswa as $mhs) { ?>
              <tr>
                <td> <?= $mhs['nrp'];  ?></td>
                <td> <?= $mhs['name'];  ?></td>
                <td> <?= $mhs['email'];  ?></td>
                <td> <?= $mhs['Jurusan'];  ?></td>
              </tr>
            <?php } ?>
            <?php } else { ?>
              <div class="alert alert-info">
                Data not found.
              </div>
            <?php } ?>
          
      </tbody>
  </table>
  </div>
    <div class="paging">
      <ul class="pagination">
        <?= $pagelinks ?>
      </ul>
    </div>
  </div>
</div>

<script>
  
</script>













