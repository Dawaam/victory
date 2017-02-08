<?php echo form_open_multipart('product/add_product',array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>
<div class="container">
	<div class="grid">
		<div class="row">
			<div class="cell">
				<h3><small><a href=""><span class="fa fa-arrow-circle-o-left"></span>Kembali ke daftar barang</a></small></h3>
			</div>
		</div>

		<div class="row form-title">
			<div class="cell">
				<h1 style="margin-bottom: 20px">Tambah barang baru</h1>
				<hr class="bg-primary">
			</div>
		</div>
		
		<?php if($role == 'admin'): ?>
			<div class="row cells2" id="row_outlet">
				<div class="cell">
					<label for="">Toko</label>
					<div class="input-control select full-size">
						<select name="outlet" id="outlet" onchange="get_tray(this)" data-validate-func="required" data-validate-hint="Baki harus dipilih">
							<option value="">--Pilih Toko--</option>
							<?php foreach($outlets as $outlet): ?>
								<option value="<?php echo $outlet->id ?>"><?php echo $outlet->code.' - '.$outlet->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="cell">
					<label for="">Baki</label>
					<div class="input-control select full-size">
						<select name="product_tray" id="tray" onchange="get_data_new_product()" data-validate-func="required" data-validate-hint="Baki harus dipilih">
							<option value="">--Pilih Baki--</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row cells2">
				<div class="cell">
					<label for="">Supplier</label>
					<div class="input-control select full-size">
						<select name="product_supplier" id="supplier">
							<option value="">--Pilih Supplier--</option>
							<?php foreach ($suppliers as $supplier): ?>
								<option value="<?php echo $supplier->id?>"><?php echo $supplier->name?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="cell">
					<label for="">Kode Produk</label>
					<div class="input-control text full-size">
						<input type="text" placeholder="Kode Produk" id="code" name="product_code" readonly="readonly">
						<input type="hidden" name="code" id="hidden_code">
						<input type="hidden" name="count" id="hidden_count">
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="row cells2">
				<div class="cell">
					<label for="">Baki</label>
					<div class="input-control select full-size">
						<select name="product_tray" id="tray" onchange="get_data_new_product()" data-validate-func="required" data-validate-hint="Baki harus dipilih">
							<option value="">--Pilih Baki--</option>
							<?php foreach($trays as $tray): ?>
								<option value="<?php echo $tray->id ?>"><?php echo $tray->code.' - '.$tray->name ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class="cell">
					<label for="">Kode Produk</label>
					<div class="input-control text full-size">
						<input type="text" placeholder="Kode Produk" id="code" name="product_code" readonly="readonly">
						<input type="hidden" name="code" id="hidden_code">
						<input type="hidden" name="count" id="hidden_count">
					</div>
				</div>
			</div>
		<?php endif; ?>

		

		<div class="row">
			<div class="cell">
				<label for="">Nama Barang</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Nama Barang" id="name" name="product_name" data-validate-func="required" data-validate-hint="Nama barang harus diisi">
				</div>
			</div>
		</div>

		<div class="row cells2" id="row_type">
			<div class="cell">
				<!-- Category -->
				<label for="">Kategori</label>
				<div class="input-control select full-size">
					<input type="text" placeholder="Kategori" id="category" readonly="readonly" name="product_category">
				</div>				
			</div>
			<div class="cell">
				<label for="">Tipe</label>
				<div class="input-control select full-size">
					<input type="text" placeholder="Tipe" id="type" readonly="readonly" name="product_type">
					<input type="hidden" name="type_id" id="type_id" value="">
				</div> 
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label for="">Berat Real</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Timbang disini" id="real" onblur="rounded_weight()" name="product_real_weight">
				</div>
			</div>
			<div class="cell">
				<label for="">Penyesuaian</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="" id="rounded" name="product_rounded_weight" readonly="readonly">
				</div>
			</div>
		</div>

		<div class="row cells3">
			<div class="cell">
				<label for="">Kode Harga</label>
				<div class="input-control text full-size">
					<select name="gold_amount" id="original" onchange="count_gold_amount()" data-validate-func="required" data-validate-hint="Baki harus dipilih">
						<option value="">--Pilih Kadar--</option>
						<?php foreach($gold_amount as $row): ?>
							<option value="<?php echo $row->id ?>"><?php echo $row->type.$row->original ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="cell">
				<label for="">Kadar</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Kadar" id="marked_up" name="product_amount">
				</div>
			</div>
			<div class="cell">
				<label for="">Harga / gram</label>
				<div class="input-control text full-size">
					<input type="text" id="gold_price" name="product_amount">
				</div>
			</div>
		</div>

		<div class="row cells2">
			<div class="cell">
				<label for="">Harga Jual</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Harga Jual" id="selling_price" name="product_selling_price">
				</div>
			</div>
			<div class="cell">
                <label>Upload Photo</label>
                <div class="input-control file full-size" data-role="input">
                    <input type="file" accept="image/*" name="capture" id="capture" capture="camera">
                    <button class="button btn-file"><span class="mif-camera"></span></button>
                </div>
			</div>
		</div>
		<?php if (!$is_mobile): ?>
            <div class="row">
                <div class="cell">
                    <label class="switch">
                        <input type="checkbox" onchange="show_cam(this)">
                        <span class="check"></span>
                        <span class="caption">Ambil Foto</span>
                    </label>
                </div>
            </div>
            <div class="row cells2" id="snapshot" style="display: none">

                <div class="cell text-center">
                    <div id="my_camera" style="width:320px; height:240px; margin:auto"></div>
                    
                    <a class="button info bg-primary btn-teal" href="javascript:void(take_snapshot())"><span class="mif mif-camera"></span> Ambil Foto</a>
                </div>
                <div class="cell text-center">
                    <div id="my_result" style="margin:auto"></div>    
                </div>
                
                
            </div>    
        <?php endif ?>
        <div class="row cells2" style="border-bottom: 1px solid black; padding-bottom: 10px;">
        	<div class="cell">
        		<h4 style="margin: 0">Spesifikasi</h4>
        	</div>
        	<div class="cell">
        		<a class="place-right" style="cursor: pointer" onclick="add_spec()">Tambah</a>
        	</div>
        </div>
        <div id="specification">
	        <div class="row cells3">
	        	<div class='cell'>
	        		<label for=''>Jenis Batu</label>
	        		<div class='input-control select full-size'  style="width:90%">
	        			<select name='stone_type[]' data-validate-hint='Jenis batu harus dipilih'>
	        				<option value=''>--Pilih Batu--</option>
	        				<?php foreach ($stone_type as $row): ?>
	        					<option value="<?php echo $row->id ?>"><?php echo $row->code ?></option>
	        				<?php endforeach ?>
	        			</select>
	        		</div>
	        	</div>
	        	<div class='cell'>
	        		<label for=''>Jumlah Batu</label>
	        		<div class='input-control text full-size'>
	        			<input type='text' placeholder='Jumlah Batu' name='stone_amount[]'>
	        		</div>
	        	</div>
	        	<div class='cell'>
	        		<label for=''>Jumlah Karat</label>
	        			<div class='input-control text full-size'>
	        			<input type='text' placeholder='Jumlah Karat' name='stone_ct[]'>
	        		</div>
	        	</div>
	        </div>
        </div>
		<div class="row">
            <div class="cell text-center">
        	   <input type="submit" name="submit" class="button bg-primary" value="Submit">
            </div>
        </div>

	</div>
</div>

<?php echo form_close() ?>
<script src="<?php echo base_url() ?>js/webcam.min.js"></script>

<script>
	function get_tray(el){
		if($(el).val() != ''){
			$.ajax({
              url: "<?php echo base_url('product/get_tray_data/')?>" + $(el).val(),
              type: 'GET',
              cache : false,
              success: function(result){
              	if (result != 'Toko ini belum punya baki') {
              		$('#tray').empty();
              		$('#tray').append("<option value=''>--Pilih Baki--</option>");
              		$('#tray').append(result);
              		$('#code').val('');
              		$('#hidden_code').val('');
              		$('#hidden_count').val('');
              	}
              }
			});
		}
	}

	function count_selling_price(){
		if($('#gold_price').val() != '' && $('#marked_up').val() != '' && $('#rounded').val()){
			var price = Number($('#gold_price').val()) * Number($('#rounded').val());
			$('#selling_price').val(price);
		}
	}

	function get_data_new_product(){
		var outlet = '';
		if($('#tray').val() != ''){
			if ($('#outlet').val() != '') {
				outlet = $('#outlet').val();
			}
			$.ajax({
              url: "<?php echo base_url('product/get_data_new_product/')?>" + $('#tray').val() +  "/" + outlet,
              type: 'GET',
              cache : false,
              success: function(result){
               	var data = JSON.parse(result);
				$('#name').val(data.category);
				$('#category').val(data.category);
				$('#type').val(data.type);
				$('#type_id').val(data.type_id); 
				$('#code').val(data.product_code);    
				$('#hidden_code').val(data.hidden_code);
				$('#hidden_count').val(data.hidden_count);           	
              }


            
            });


		}
	}

	function add_spec(){
		$('#specification').append("<div class='row cells3'><div class='cell'><label for=''>Jenis Batu</label><div style='width:95%' class='input-control select full-size'><select name='stone_type[]' required='required' data-validate-func='required' data-validate-hint='Jenis batu harus dipilih'><option value=''>--Pilih Batu--</option><?php foreach ($stone_type as $row): ?><option value='<?php echo $row->id ?>'><?php echo $row->code ?></option><?php endforeach ?></select></div></div><div class='cell'><label for=''>Jumlah Batu</label><div class='input-control text full-size'><input type='text' placeholder='Jumlah Batu' name='stone_amount[]'></div></div><div class='cell'><label for=''>Jumlah Karat</label><div class='input-control text full-size'><input type='text' placeholder='Jumlah Karat' name='stone_ct[]'></div></div></div>");
	}

	function count_gold_amount(){
	
		$.ajax({
          url: "<?php echo base_url('product/count_gold_amount/')?>" + $('#original').val(),
          type: 'GET',
          cache : false,
          success: function(result){
          	var data = JSON.parse(result);
           	$('#marked_up').val(data.marked_up);
           	$('#gold_price').val(data.gold_price * data.marked_up / 100);
          	
          	if($('#real').val() != '' && $('#original').val() != ''){
               	          	
                count_selling_price();
        	}
          }
        
        });
		
	}

	function rounded_weight(){
		
			var real = $('#real').val();

			var n = real.lastIndexOf('.');
			
			var result = real.substring(n + 1);
			if(result.length == 1){
				var substr = 0;
			}else{
				var substr = real.substring(real.length - 1, real.length);	
			}
			if(n != -1){
				if(Number(substr) == 0){
					var round = 0.00;
				}else if(Number(substr) <= 5){
					var round = 0.05;
				}else{
					var round = 0.1;
				}
			}else{
				var round = 0.00;
			}
			
			substr = '0.0'+substr;
			substr = Number(substr);
			real = Number(real);
			weight = real - substr + round;
			$('#rounded').val(weight.toFixed(2));

			
			if($('#real').val() != '' && $('#original').val() != ''){
				count_selling_price();
			}
	}

    function show_cam(el){
        if($(el).is(":checked") ){
            $('#snapshot').show();
            Webcam.attach('#my_camera');
            $('#capture').attr('disabled','disabled');
        }else{
            $('#snapshot').hide();
            $('#capture').removeAttr('disabled');
            Webcam.reset();            
        }
      }

    function notifyOnErrorInput(input){
        var message = input.data('validateHint');
        $.Notify({
            caption: 'Error',
            content: message,
            type: 'alert'
        });
    }

    <?php if($this->session->flashdata('product')): ?>

       <?php echo $this->session->flashdata('product') ?>

    <?php endif; ?>


</script>

<script language="JavaScript">
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
            Webcam.upload( data_uri, "<?php echo base_url('product/upload') ?>", function(code, text) {
            } );    
        } );
        
    }
</script>