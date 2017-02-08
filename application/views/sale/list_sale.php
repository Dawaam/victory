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
	            <h1 style="margin-bottom: 20px;">Daftar Penjualan </h1>
	            <hr class="bg-primary">    
	        </div>
	    </div>
		<div class="row cells5">
	        <div class="cell">
	        	<form method="post" name="filter_sale">
				    <div class="row">
				    	<div class="cell">
					    	<h4 class="margin20 no-margin-top no-margin-right no-margin-left"><span class="mif-filter"></span> Filter</h4>
				        </div>
			        </div>
				    <div class="row">
				    	<div class="cell">
				    		<label><strong>Kata Kunci</strong></label>
				    		<div class="input-control text full-size">
				    			<span class="mif-search prepend-icon"></span>
			                    <input type="text" name="keyword" placeholder="Cari.." value="<?=((isset($keyword)) ? $keyword : '')?>" >
			                </div>
				    	</div>
				    </div>
				    <?php if($outlets): ?>
				    <div class="row">
				    	<div class="cell">
				    		<label><strong>Toko</strong></label>
							<div class="input-control select full-size">
							    <select name="outlet_id">
							        <option value="">Semua Toko</option>
					   				<?php foreach($outlets as $outlet): ?>
							        <option value="<?php echo $outlet->id ?>"<?=((isset($outlet_id) && $outlet->id == $outlet_id) ? ' selected' : '')?>><?php echo $outlet->name ?></option>
					            	<?php endforeach; ?>
							    </select>
							</div>
				    	</div>
				    </div>
					<?php endif; ?>
				    <?php if(isset($type)): ?>
				    <div class="row">
				    	<div class="cell">
				    		<label><strong>Kategori</strong></label>
							<div class="input-control select full-size">
							    <select name="type_id">
							        <option value="">Semua Kategori</option>
					   				<?php foreach($type as $type): ?>
							        <option value="<?php echo $type->id ?>"<?=((isset($type_id) && $type->id == $type_id) ? ' selected' : '')?>><?php echo $type->name ?></option>
					            	<?php endforeach; ?>
							    </select>
							</div>
				    	</div>
				    </div>
					<?php endif; ?>
				    <div class="row">
				    	<div class="cell">
				    		<label><strong>Tanggal Penjualan</strong></label>
							<div class="input-control text full-size" data-role="datepicker" data-scheme="darcula" data-date="1972-12-21" data-format="yyyy-mm-dd">
							    <input type="text" name="date" value="<?=((isset($date)) ? $date : '')?>">
							    <button class="button"><span class="mif-calendar"></span></button>
							</div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="cell">
				    		<label><strong>Minimal Timbangan</strong></label>
				    		<div class="input-control text full-size">
				    			<span class="mif-calculator2 prepend-icon"></span>
			                    <input type="text" name="timbangan" placeholder="Dalam gram.." value="<?=((isset($timbangan)) ? $timbangan : '')?>">
			                </div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="cell">
				    		<label><strong>Minimal Omzet</strong></label>
				    		<div class="input-control text full-size">
				    			<span class="mif-money prepend-icon"></span>
			                    <input type="text" name="omzet" placeholder="Dalam rupiah.." value="<?=((isset($omzet)) ? $omzet : '')?>">
			                </div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="cell text-center">
				    		<button type="reset" name="reset" class="button bg-primary image-button small-button" id="reset_btn" value="Reset"><span class="icon mif-loop2"></span> Reset</button>
				    		<button type="submit" name="submit" class="button bg-primary image-button small-button" id="submit_btn" value="Submit"><span class="icon mif-filter"></span> Filter</button>
				    	</div>
				    </div>
			    </form>
	        </div>
	        <div class="cell colspan4">
				<div class="row">
					<div class="cell table-responsive toggle-circle-filled">
						<table class="table hovered border bordered table-condensed" id="table_sale" data-filter="#filter" data-page-size="10">
							<thead>
								<tr>
									<th data-type="numeric">No.</th>
									<th >Kode Penjualan</th>
									<th data-hide="phone">Jumlah Barang</th>
									<th data-hide="phone">Sales</th>
									<th data-hide="phone">Kasir</th>
									<th data-hide="phone">Customer</th>
									<th data-hide="phone">Total Harga</th>
									<th data-hide="phone">Toko</th>
									<th data-hide="phone">Tanggal</th>
									
								</tr>
							</thead>
							<tbody id="table_body">
								<?php if($sale !=NULL): ?>
									<?php $i = 1; ?>
									<?php foreach($sale as $row): ?>
										<tr>
											<td><?php echo $i ?></td>
											<td><a href="<?php echo base_url('sale/detail/'.$row->sale_code) ?>"><?php echo $row->sale_code ?></a></td>
											<td><?php echo $row->qty ?></td>
											<td><?php echo $row->sales_name ?></td>
											<td><?php echo $row->cashier ?></td>
											<td><?php echo $row->customer ?></td>
											<td><?php echo rupiah($row->total_price) ?></td>
											<td><?php echo $row->outlet_name ?></td>
											<td><?php echo date('d-M-Y H:i',strtotime($row->date)); ?></td>
										</tr>		
										<?php $i++; ?>
									<?php endforeach; ?>
								<?php else:?>
									<tr>
										<td colspan="12" class="text-center"><h3>Table kosong</h3></td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
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
		<?php if($this->session->flashdata('sale')): ?>

	       <?php echo $this->session->flashdata('sale') ?>

	    <?php endif; ?>

	    $('#table_sale').footable();
	    $('a.photobox').fancybox();

	});


	function get_sale_by_outlet(el){
		var monthNames = [
		  "Jan", "Feb", "Mar",
		  "Apr", "May", "Jun", "Jul",
		  "Aug", "Sep", "Oct",
		  "Nov", "Dec"
		];

		
		var no=1;
		$.ajax({
              url: "<?php echo base_url('sale/get_sale_by_outlet')?>" + "/" + $(el).val(),
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
              			var date = new Date(value.date);
						var day = date.getDate();
						var monthIndex = date.getMonth();
						var year = date.getFullYear();
						var hour = date.getHours();
						var min  = date.getMinutes();
					  $('#table_body').append("<tr><td>"+no+"</td><td><a href='<?php echo base_url() ?>sale/detail/"+value.sale_code+"'>"+((value.sale_code) ? value.sale_code : "")+"</a></td><td>"+((value.qty) ? value.qty : "")+"</td><td>"+((value.sales_name) ? value.sales_name : "")+"</td><td>"+((value.cashier) ? value.cashier : "")+"</td><td>"+((value.customer) ? value.customer : "")+"</td><td>"+((value.total_price) ? value.total_price : "")+"</td><td>"+((value.outlet_name) ? value.outlet_name : "")+"</td><td>"+day + '-' + monthNames[monthIndex] + '-' + year + " "+hour+ ":"+min+"</td></tr>");

					  no++;
					});
					$('#table_sale').trigger('footable_initialize');
              	}

              }
            });
	}


	function get_sale_by_type(el){
		var monthNames = [
		  "Jan", "Feb", "Mar",
		  "Apr", "May", "Jun", "Jul",
		  "Aug", "Sep", "Oct",
		  "Nov", "Dec"
		];

		
		var no=1;
		$.ajax({
              url: "<?php echo base_url('sale/get_sale_by_type')?>" + "/" + $(el).val(),
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
              			var date = new Date(value.date);
						var day = date.getDate();
						var monthIndex = date.getMonth();
						var year = date.getFullYear();
						var hour = date.getHours();
						var min  = date.getMinutes();
					  $('#table_body').append("<tr><td>"+no+"</td><td><a href='<?php echo base_url() ?>sale/detail/"+value.sale_code+"'>"+((value.sale_code) ? value.sale_code : "")+"</a></td><td>"+((value.qty) ? value.qty : "")+"</td><td>"+((value.sales_name) ? value.sales_name : "")+"</td><td>"+((value.cashier) ? value.cashier : "")+"</td><td>"+((value.customer) ? value.customer : "")+"</td><td>"+((value.total_price) ? value.total_price : "")+"</td><td>"+((value.outlet_name) ? value.outlet_name : "")+"</td><td>"+day + '-' + monthNames[monthIndex] + '-' + year + " "+hour+ ":"+min+"</td></tr>");

					  no++;
					});
					$('#table_sale').trigger('footable_initialize');
              	}

              }
            });
	}

	
</script>