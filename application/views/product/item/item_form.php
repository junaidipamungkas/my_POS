 <!-- Content Header (Page header) -->
 <section class="content-header">
 	<h1> Items
		<small>Data Barang</small>
	</h1>
    <ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
        
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> Item</h3>
            <div class="pull-right">
                <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">  
                    <form action="<?=site_url('item/process')?>" method="post">
                        <div class="form-group ">
                            <label for="barcode">Barcode *</label>
                            <input type="hidden" name="id" value="<?=$row->item_id?>">
                            <input type="text" name="barcode" id="barcode" value="<?=$row->barcode?>" class="form-control" required>
                        </div>        
                        <div class="form-group ">
                            <label for="product_name">Product Name *</label>
                            <input type="text" name="product_name" id="product_name" value="<?=$row->name?>" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label for="category">Category *</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php foreach ($category->result() as $key => $data) : ?>
                                    <option value="<?=$data->category_id?>"><?=$data->name?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit *</label>
                            <?php echo form_dropdown('unit', $unit, $selectedunit,
                                ['class' => 'form-control', 'required' => 'required']) ?>
                        </div>
                        <div class="form-group">
                            <label for="price">Price *</label>
                            <input type="number" name="name" id="price" value="<?=$row->price?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                            <button type="Reset" class="btn btn btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->