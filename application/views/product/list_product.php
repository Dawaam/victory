<link href="<?php echo base_url() ?>css/footable.core.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>fancybox/source/jquery.fancybox.css">
<div class="container-fluid">
	<div class="grid">
		<div class="row">
	        <div class="cell">
	            <h3 style="display: inline-block;"><small><a href="<?php echo base_url() ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke Home</a></small></h3>
	        </div>
	    </div>
		<div class="row form-title">
	        <div class="cell">
	            <h1 style="margin-bottom: 20px;">Daftar Barang <?php echo ucfirst($outlet_name) ?></h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    			<label class="input-control radio small-check">
						    <input type="radio" name="radio_outlet" value="0" checked="checked" id="radio_outlet" onclick="get_product_from_outlet()">
						    <span class="check"></span>
						    <span class="caption">Semua Toko</span>
					</label>
	   				<?php foreach($outlets as $outlet): ?>
                    	<label class="input-control radio small-check">
						    <input type="radio" value="<?php echo $outlet->id ?>" name="radio_outlet" id="radio_outlet" onclick="get_product_from_outlet()">
						    <span class="check"></span>
						    <span class="caption"><?php echo $outlet->name ?></span>
						</label>
                	<?php endforeach; ?>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    			<label class="input-control radio small-check">
						    <input type="radio" name="item_status" checked="checked" value="available" id="item_status" onclick="get_product_from_outlet()">
						    <span class="check"></span>
						    <span class="caption">Available</span>
					</label>
	   				<label class="input-control radio small-check">
						    <input type="radio" name="item_status" value="terjual" id="item_status" onclick="get_product_from_outlet()">
						    <span class="check"></span>
						    <span class="caption">Terjual</span>
					</label>
					<label class="input-control radio small-check">
						    <input type="radio" name="item_status" value="pending" id="item_status" onclick="get_product_from_outlet()">
						    <span class="check"></span>
						    <span class="caption">Sedang Dikirim</span>
					</label>
	    	</div>
	    </div>
	    <div class="row">
	    	<div class="cell">
	    		<div class="input-control text full-size">
                    <input type="text" placeholder="Cari barang" id="filter" >
                </div>
	    	</div>
	    </div>
		<div class="row">
			<div class="cell table-responsive toggle-circle-filled">
				<table class="table hovered border bordered table-condensed" id="table_product" data-filter="#filter" data-page-size="10">
					<thead>
						<tr>
							<th data-type="numeric">No.</th>
							<th data-hide="phone">Foto</th>
							<th data-hide="phone">Kode Barang</th>
							<th >Nama</th>
							<th data-hide="phone">Baki</th>
							<th data-hide="phone">Tipe</th>
							<th data-hide="phone">Kategori</th>
							<th data-hide="phone">Berat Real</th>
							<th data-hide="phone">Penyesuaian</th>
							<th data-hide="phone">Status</th>
							<th data-hide="phone">Kadar</th>
							<th data-hide="phone">Supplier</th>
							<th data-hide="phone">Lokasi</th>
						</tr>
					</thead>
					<tbody id="table_body">
						<?php if($products !=NULL): ?>
							<?php $i = 1; ?>
							<?php foreach($products as $product): ?>
								<tr>
									<td><?php echo $i ?></td>
									<td><a class="photobox" href="<?php echo base_url().$product->photo ?>"><img width="20" src="<?php echo base_url().$product->photo ?>" alt=""/></a></td>
									<td><?php echo $product->product_code ?></td>
									<td><a href="#" onclick="showDialog('<?php echo $product->product_code ?>')"><?php echo $product->name ?></a></td>
									<td><?php echo $product->tray ?></td>
									<td><?php echo $product->type ?></td>
									<td><?php echo $product->category ?></td>
									<td><?php echo $product->real_weight ?></td>
									<td><?php echo $product->rounded_weight ?></td>
									<td><?php echo $product->status ?></td>
									<td><?php echo $product->amount_type.$product->original.' -> '.$product->marked_up ?></td>
									<td><?php echo $product->supplier?></td>
									<td><?php echo $product->outlet ?></td>
								</tr>		
								<?php $i++; ?>
							<?php endforeach; ?>
						<?php else:?>
							<tr>
								<td colspan="13" class="text-center"><h3>Table kosong</h3></td>
							</tr>
						<?php endif; ?>
					</tbody>
					<tfoot class="hide-if-no-paging">
						<td colspan="13">
							<div class="pagination"></div>
						</td>						
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="<?php echo base_url() ?>css/alertify.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>css/default.min.css">
<script src="<?php echo base_url() ?>js/alertify.min.js"></script>
<script src="<?php echo base_url() ?>js/footable.js"></script>
<script src="<?php echo base_url() ?>js/footable.filter.js"></script>
<script src="<?php echo base_url() ?>js/footable.paginate.js"></script>
<script src="<?php echo base_url() ?>js/footable.sort.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/fancybox/source/jquery.fancybox.js"></script>

<script>
	

	$(document).ready(function(){
		<?php if($this->session->flashdata('product')): ?>

	       <?php echo $this->session->flashdata('product') ?>

	    <?php endif; ?>

	    $('#table_product').footable();
	    $('a.photobox').fancybox();

	});

	function get_product_from_outlet(){
		var no=1;
		$.ajax({
              url: "<?php echo base_url('product/get_product_by_outlet/')?>" + $('input[name=radio_outlet]:checked').val() + "/" + $('input[name=item_status]:checked').val(),
              type: 'GET',
              cache : false,
              success: function(result){
               	if(result == 'not found'){
      		        $.Notify({
			            caption: 'Error',
			            content: 'Barang Tidak Ditemukan',
			            type: 'alert'
			        });
              	}else{
              		var data = JSON.parse(result);
              		$('#table_body').empty();
              		$.each(data, function( index, value ) {
					  $('#table_body').append("<tr><td>"+no+"</td><td><a class=photobox href='<?php echo base_url() ?>"+value.photo+"'><img width='20' src='<?php echo base_url()?>"+value.photo+"' alt=''/></a></td><td>"+value.product_code+"</td><td><a href='#' onclick='showDialog(\""+value.product_code+"\")'>"+value.name+"</a></td><td>"+value.tray+"</td><td>"+value.type+"</td><td>"+value.category+"</td><td>"+value.real_weight+"</td><td>"+value.rounded_weight+"</td><td>"+value.status+"</td><td>"+value.amount_type+" "+value.original+"->"+value.marked_up+"</td><td>"+value.outlet+"</td></tr>");	
					  no++;
					});
					$('#table_product').trigger('footable_initialize');
              	}

              }
            });
	}

	function showDialog(code){
	  	$.ajax({
	            url: "<?php echo base_url('product/get_product_detail/')?>" + code,
	            type: 'GET',
	            cache : false,
	            success: function(result){
	            	if(result == 'not found'){
	    		        $.Notify({
			            caption: 'Error',
			            content: 'Barang Tidak Ditemukan',
			            type: 'alert'
			        });
	            	}else{
	            		var data = JSON.parse(result);
	            		metroDialog.create({
			            title: "Detil Barang",
			            content: "<div class='grid'><div class='row cells3 bg-grayLighter' style='padding: 20px;'><div class='cell'><div class='grid'><div class='row'><div class='cell'><img src='<?php echo base_url()?>"+data.photo+"' style='margin:auto;display:block' width='200' alt=''></div></div></div></div><div class='cell colspan2'><div class='grid' id='dialogfont'><div class='row'><div class='cell'><table><tr><th colspan='2'>"+data.name+" - "+data.product_code+"<td><b></tr><tr><td><b>Tipe</td><td>:</td><td>"+data.type+"</td></tr><tr><td><b>Kategori</td><td>:</td><td>"+data.category+"</td></tr><tr><td><b>Berat</td><td>:</td><td>"+data.real_weight+"g ~ "+data.rounded_weight+"g</td></tr></tr><tr><td><b>Kadar Emas</td><td>:</td><td>"+data.gold_amount+"</td></tr></tr><tr><td><b>Baki</td><td>:</td><td>"+data.tray+"</td></tr></tr><tr><td><b>Outlet</td><td>:</td><td>"+data.outlet+"</td></tr></tr><tr><td><b>Status</td><td>:</td><td>"+data.status+"</td></tr>"+(data.status == 'terjual' ? "<tr><td><b>Harga Jual</b></td><td>:</td><td>"+data.selling_price+"</td></tr>":"")+"</table></div></div></div></div></div></div>",
			            actions: [
			                {
			                    title: "OK",
			                    onclick: function(el){
			                        //console.log(el);
			                        $(el).data('dialog').close();
			                    }
			                },
			            ],
			            options: {
			            }
			        });
	            	}
	        }
	  	});
	}

</script>