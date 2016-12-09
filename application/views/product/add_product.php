<?php echo form_open_multipart('product/add_product') ?>
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

		<div class="row">
			<div class="cell">
				<label for="">Nama Barang</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Nama Barang" id="name" name="product_name" data-validate-func="required" data-validate-hint="Nama barang harus diisi">
				</div>
			</div>
		</div>
		
		<div class="row cells2">
			<div class="cell">
				<label for="">Kode Produk</label>
				<div class="input-control text full-size">
					<input type="text" placeholder="Kode Produk" id="code" name="product_code" readonly="readonly">
					<input type="hidden" name="code" id="hidden_code">
					<input type="hidden" name="count" id="hidden_count">
				</div>
			</div>
			<div class="cell">
				<label for="">Baki</label>
				<div class="input-control select full-size">
					<select name="product_tray" id="tray" onchange="get_data_new_product()" data-validate-func="required" data-validate-hint="Baki harus dipilih">
						<option value="">--Pilih Tipe--</option>
						<?php foreach($trays as $tray): ?>
							<option value="<?php echo $tray->id ?>"><?php echo $tray->code.' - '.$tray->name ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

		<div class="row cells2">
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
				<label for="">Kadar</label>
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
				<label for="">Kadar</label>
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
	function count_selling_price(){
		if($('#gold_price').val() != '' && $('#marked_up').val() != '' && $('#rounded').val()){
			var price = Number($('#gold_price').val()) * Number($('#marked_up').val()) * Number($('#rounded').val()) /100;
			$('#selling_price').val(price);
		}
	}

	function get_data_new_product(){
		if($('#tray').val() != ''){
			$.ajax({
              url: "<?php echo base_url('product/get_data_new_product/')?>" + $('#tray').val(),
              type: 'GET',
              cache : false,
              success: function(result){
               	var data = JSON.parse(result);
				$('#name').val(data.category);
				$('#category').val(data.category);
				$('#type').val(data.type);
				$('#code').val(data.product_code);    
				$('#hidden_code').val(data.hidden_code);
				$('#hidden_count').val(data.hidden_count);           	
                
              }
            
            });
		}
	}

	function count_gold_amount(){
		if($('#real').val() != '' && $('#original').val() != ''){
			$.ajax({
              url: "<?php echo base_url('product/count_gold_amount/')?>" + $('#original').val(),
              type: 'GET',
              cache : false,
              success: function(result){
               	var data = JSON.parse(result);
               	$('#marked_up').val(data.marked_up);
               	$('#gold_price').val(data.price);          	
                count_selling_price();
              }
            
            });
		}else{
			$.ajax({
              url: "<?php echo base_url('product/count_gold_amount/')?>" + $('#original').val(),
              type: 'GET',
              cache : false,
              success: function(result){
               	var data = JSON.parse(result);
               	$('#marked_up').val(data.marked_up);
               	$('#gold_price').val(data.price);  
                
              }
            
            });
		}
	}

	function rounded_weight(){
		if($('#real').val() != '' && $('#original').val() != ''){
			var real = $('#real').val();
			var substr = real.substring(real.length - 1, real.length);
			if(Number(substr) < 5){
				var round = 0.05;
			}else{
				var round = 0.1;
			}
			substr = '0.0'+substr;
			substr = Number(substr);
			real = Number(real);
			weight = real - substr + round;
			$('#rounded').val(weight.toFixed(2));

			count_selling_price();


		}else{
			var real = $('#real').val();
			var substr = real.substring(real.length - 1, real.length);
			if(Number(substr) < 5){
				var round = 0.05;
			}else{
				var round = 0.1;
			}
			substr = '0.0'+substr;
			substr = Number(substr);
			real = Number(real);
			weight = real - substr + round;
			$('#rounded').val(weight.toFixed(2));
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