<body>
    <!-- Page Content -->
    <div class="container">
		<nav class="navbar navbar-light bg-light mb-3">
            <?php foreach ($product as $item) : ?>
        <span class="navbar-brand mb-0 h1"><?= $item['name']  ?></span>
        <a href="" class="btn btn-outline-success my-2 my-sm-0" >Buy Now</a>
        </nav>
<!--    -->
        <div class="row">
        	<div class="col-sm-6  col-md-3">
            			<img class="image-resize" src="<?= base_url('assets/images/'.$item['image']); ?>" class="img-fluid" alt="Responsive image">
			
        		<h3 class="name"><strong><?= $item['name']; ?></strong></h3>
        	</div>
            <?php endforeach; ?>
        	<div class="col-sm-4 ml-4 mt-4">
            </div>
            <div class="col-sm-4 ml-4 mt-4">
                <div class="card" style="width: 18rem;">
  <div class="card-body">
    <label><input type="checkbox" id="addToList"> Add to your list</label>
    
    <h5 class="card-title"><strong> <?= $item['name']; ?></strong></h5>
    <p class="card-text"><strong>Pilihan Produk</strong></p>
    <div class="list-group">
        <!-- <div class="list-group-item"> -->
            <label>
                <input type="checkbox" value=""> 16 GB
                <input type="checkbox" value=""> 32 GB
                <input type="checkbox" value=""> 64 GB
            </label>
        <!-- </div> -->
        <p class="btn btn-success"><?= 'Rp '. $item['price']; ?></p>
    </div>
    <form action="" method="post">
    <p><strong>Full Addrees</strong></p>
    <div class="input-group mb-3">
        
  <input type="text" class="form-control" placeholder="Input your country code">
    </form>
  </div>
  <p><strong>Total :</strong></p>
<a href="#" class="card-link">More detail</a>
  </div>
</div>  
            </div>
        </div>
        <!-- <div class="row"> -->













