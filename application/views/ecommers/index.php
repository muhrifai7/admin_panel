
<body>
    <!-- Page Content -->
    <div class="container">
		<nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">E-Comemrs</span>
        </nav>
<br>

        <div class="col-md-3 pl-0">
         <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search!.." autofocus="">
         </div> 
        </div>

      <div class="row">
             <div class="col-md-3">
    <!-- <div class="list-group">
     <h3>Price</h3>
     <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>    
       -->          <div class="list-group">
     <h3>Brand</h3>
     <?php
                    foreach($brand_data->result_array() as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['brand']; ?>"  > <?php echo $row['brand']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>

    <div class="list-group">
     <h3>RAM</h3>
     <?php
                    foreach($ram_data->result_array() as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['ram']; ?>" > <?php echo $row['ram']; ?> GB</label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
    
    <div class="list-group">
     <h3>Internal Storage</h3>
     <?php
                    foreach($product_storage->result_array() as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['storage']; ?>"  > <?php echo $row['storage']; ?> GB</label>
                    </div>
                    <?php
                    }
                    ?> 
                </div>
            </div>

            <div class="col-md-9">
             <!-- <h2 align="center">Product Filters in Codeigniter using Ajax</h2> -->
    
    <div align="right" id="pagination_link">

                </div>
    <br />
    
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
 text-align:center; 
 background: url('<?php echo base_url(); ?>assets/images/favicon.ico') no-repeat center; 
 height: 150px;
}
</style>










