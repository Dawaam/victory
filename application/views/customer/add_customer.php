<div class="container">
    <div class="grid">

        <div class="row">
            <div class="cell">
                <h3 style="display:inline-block"><small><a href="<?php echo base_url('customer') ?>"><span class="fa fa-arrow-circle-o-left"></span> Kembali ke daftar customer</a></small></h3>
            </div>
        </div>

        <div class="row form-title">
            <div class="cell">
                <h1 style="margin-bottom: 20px;">Tambah Customer Baru</h1>
                <hr class="bg-primary">
            </div>
        </div>

        <?php echo form_open('customer/add_customer',array('data-role' =>  'validator','data-on-error-input' => 'notifyOnErrorInput','data-show-error-hint' => 'false')) ?>

        <div class="row cells2">
            <div class="cell">
                <label>Nama Customer</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Nama Customer" data-validate-func="required" data-validate-hint="Nama customer harus diisi" name="customer_name">
                    
                </div>
            </div>
            <div class="cell">
                <label>Jenis Customer</label>
                <div class="input-control select full-size">
                    <select name="customer_type" data-validate-hint="Jenis customer harus diisi" onchange="get_member(this)">
                        <option value="Regular">Customer Biasa</option>
                        <option value="Member">Member</option>
                    </select>
                </div>         
            </div>
        </div>

        <div class="row cells2">
            <div class="cell">
                <label>No. KTP</label>
                <div class="input-control text full-size">
                    <input type="text" placeholder="Nomor KTP" name="customer_ktp" id="customer_ktp">
                    
                </div>
            </div>
            <div class="cell">
                <label>Jenis Kelamin</label>
                <div class="input-control select full-size">
                    <select name="customer_gender">
                        <option value="Wanita">Wanita</option>
                        <option value="Pria">Pria</option>
                    </select>
                </div>         
            </div>
        </div>

        <div class="row cells3">
            <div class="cell">
                <label>Tanggal Lahir</label>
                 <div class="input-control text full-size" data-role="datepicker" data-format="d mmmm yyyy">
                    <input type="text" name="customer_birthday">
                    <button class="button"><span class="mif-calendar"></span></button>
                </div>
                
            </div>
            <div class="cell">
                <label>No. Telp</label>
                <div class="input-control text full-size" data-role="input">
                    <input type="text" placeholder="Nomor Telephone Customer" name="customer_phone" id="customer_phone">
                    
                </div>
            </div>
            <div class="cell">
                <label>E-mail</label>
                <div class="input-control text full-size" data-role="input" >
                    <input type="email" placeholder="Email Customer" name="customer_email" id="customer_email">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <label>Alamat</label>
                <div class="input-control textarea full-size" data-role="input" data-text-auto-resize="true">
                    <textarea placeholder="Alamat Customer" name="customer_address" id="customer_address"></textarea>
                </div>
            </div>
        </div>  

        <div class="row">
            <div class="cell text-center">
                <input type="submit" class="button bg-primary" name="submit" value="Submit">
            </div>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>

<script>
     function notifyOnErrorInput(input){
        var message = input.data('validateHint');
        $.Notify({
            caption: 'Error',
            content: message,
            type: 'alert'
        });
    }
</script>
<script>
    function get_member(el){
        if($(el).val()=='Member'){
            $('#customer_email').attr({
                'data-validate-func':"required",
                'data-validate-hint':"Email member harus diisi"
            });
            $('#customer_phone').attr({
                'data-validate-func':"required",
                'data-validate-hint':"No.telp member harus diisi"
            });
            $('#customer_address').attr({
                'data-validate-func':"required",
                'data-validate-hint':"Alamat member harus diisi"
            });

            $('#customer_ktp').attr({
                'data-validate-func':"required",
                'data-validate-hint':"No.KTP member harus diisi"
            });
        }
        else{
            $('#customer_email').removeAttr("data-validate-func");
            $('#customer_phone').removeAttr("data-validate-func");
            $('#customer_address').removeAttr("data-validate-func");
            $('#customer_ktp').removeAttr("data-validate-func");
        }
    }

    <?php if($this->session->flashdata('customer')): ?>

       <?php echo $this->session->flashdata('customer') ?>

    <?php endif; ?>
</script>