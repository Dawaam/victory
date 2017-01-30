<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title ?> - Kemenangan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
    <link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/metro-schemes.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url() ?>assets/logo-k.png">

    <link href="<?php echo base_url() ?>css/docs.css" rel="stylesheet">

    
    

    <script src="<?php echo base_url() ?>js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/metro.js"></script>
    <script src="<?php echo base_url();?>js/script.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $configuration = $this->crud_model->get_data('configuration')->row() ?>
    <style>
      /**alertify modal**/
      .alertify .ajs-header{
        color: <?php echo $configuration->primary_color ?> !important;
        background: white !important;
        border-bottom: 1px solid <?php echo $configuration->primary_color ?> !important;
      }
      .alertify .ajs-footer{
        color: <?php echo $configuration->primary_color ?> !important;
        background: white !important;
        border-top: 1px solid <?php echo $configuration->primary_color ?> !important;
      }

      .alertify .ajs-footer .ajs-buttons .ajs-button.ajs-ok{
        background-color: <?php echo $configuration->primary_color ?> !important;
        color: white !important;
      }
      /** end of alertify **/

      .segoe{
        font-family: 'Segoe UI';
        font-size: 12px;
        line-height: 30px;
      }
     
      .navbar{
        background-color: <?php echo $configuration->primary_color ?>;
        height: 40px;
        border:none;
        border-radius: 0px;
      }
      .bg-primary{
        background-color: <?php echo $configuration->primary_color ?> !important;
        color: white !important;
      }
      .overlay{
        position: fixed;
        width: 100%;
        height: 0;
        z-index: 3;
        left: 0;
        top: 50px;
        opacity: 0;
        background-color:#fff;
        overflow-x: hidden;
        overflow-y: hidden;
        -webkit-box-shadow: 0 7px 10px 0 #9E9E9E;
        box-shadow: 0 7px 10px 0 #9E9E9E;
        transition: 0.2s ease-in;
      }
      
      #charm_currency{
          height: 100px;        
          background-color: <?php echo $configuration->primary_color ?> !important;
      }
      #currency_head{
        border-bottom: 0px;
      }
      @media (max-width: 1127px){
      .tile-group {
        margin:0 !important;
        float: left !important;
      }}
      @media(max-width: 500px){
        .navbar-brand{
          display: none;
        }
      }

      @media(max-width: 425px){
        .tile-large,.tile,.tile-wide{
          width: 150px;
          height: 150px;
        }
        .navbar-nav>li{
          width: 14.27% !important;
          text-align: center;
        }
        .navbar-nav{
          width: 100%;
        }
        .tile-group{
          width: 320px !important;
          margin: 0 3% !important;
        }
        #transaksi-container{
          margin:0 !important;
        }
        .navbar > .container-fluid{
          padding: 0 !important;
        }
      }
      @media (max-width: 968px){
        .menu-text{
          display: none;
        }
      }
      .tile-group{
        margin: 0 12%;
      }
      .overlay-content{
        position: relative;
        top: 0%;
        width: 100%;
        text-align: center;
        margin-top: 20px;
      }
      .navbar-nav>li{
        border-right: 1px solid #fff;
      }
      .navbar-nav>li:hover{

        background-color: white !important;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
      }
      .navbar-nav>li:hover .menu-a {
        color: <?php echo $configuration->primary_color ?> !important;
      }
      .navbar-nav>li>a{
        color: white !important;
      }
      .navbar-brand{
        border-right: 1px solid #fff; 
        color: white !important;
      }
      .tile-group-title{
        color: black !important;
        text-transform: uppercase;
      }
      .buka{

        background-color: #FFFFFF !important;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
      }
      .buka>a:visited,.buka>a:focus,.buka>a:active,.buka>a:hover{
        color: <?php echo $configuration->primary_color ?> !important;
        background-color: #FFFFFF;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
      }
      .input-control input, .input-control textarea, .input-control select{
        border-color: rgba(127, 140, 141,1.0);
      }
      .btn-file{
        border-color: rgba(127, 140, 141,1.0);
      }
      .btn-teal:hover{
        background-color: white !important;
        -webkit-transition: all 0.3s ease-in;
        -moz-transition: all 0.3s ease-in;
        transition: all 0.3s ease-in;
        color: <?php echo $configuration->primary_color ?> !important;
        border: 1px solid <?php echo $configuration->primary_color ?> !important;
        font-weight: bold
      }
      
      .footable>thead>tr>th, .footable>thead>tr>td {       
        background-color : #ecf0f1 !important;
        border : 1px solid #999 !important;
        color: #000 !important;
      }

   

    .footable>tfoot>tr>th, .footable>tfoot>tr>td { 
      background-color : #ecf0f1 !important;
      border : 1px solid #999 !important;
    }
    .footable>tbody{
      border: 1px solid #999 !important;
    }
  

    #kurstoggle {
      z-index: 2;
      -webkit-transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
      transition-timing-function: cubic-bezier(0.175, 0.885, 0.32, 1.275);
      -webkit-transition-duration: 400ms;
      transition-duration: 400ms;
      -webkit-transform: scale(1.1, 1.1) translate3d(0, 0, 0);
      transform: scale(1.1, 1.1) translate3d(0, 0, 0);
      cursor: pointer;
      box-shadow: 3px 3px 0 0 rgba(0, 0, 0, 0.14);
      border:none;
      background-color: #FFF !important;
        height: 40px;
        width: 40px;
        border-radius: 50%;
      margin: 5px;
      font-size: 14px;
      color: black;
      padding: 12px;
    }

    #kurstoggle:hover {
      -webkit-transform: scale(1.2, 1.2) translate3d(0, 0, 0);
      transform: scale(1.2, 1.2) translate3d(0, 0, 0);
    }

  
    </style>

  </head>
  <body style="padding-top: 50px;">
  
  <header>
      <nav class="navbar navbar-default" style="position: fixed; top: 0; width:100%;z-index: 3;">
        <div class="container-fluid" style="padding-left: 15px; padding-right: 15px;">
          <!-- Brand and toggle get grouped for better mobile display -->

          <div class="navbar-header">
            
            <a class="navbar-brand" href="#">Logo</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url('home') ?>" class="menu-a" ><i class="fa fa-home" aria-hidden="true"></i> <span class="menu-text">Home</span></a></li>
              <!--Menu+dropdown Transaksi-->
              <li><a href="#" onclick="openNav(this)" class="menu-a"><i class="fa fa-money" aria-hidden="true"></i> <span class="menu-text">Transaksi</span></a>
                  <div class="container-fluid overlay" style="padding-top: 0px">
                    <div class="overlay-content" >
                      <div class="grid">
                        <div class="row cells2">
                          <div class="cell">
                            <div class="tile-group triple">
                              <span class="tile-group-title">Penjualan</span>
                                <div class="tile-container"><!--Container Penjualan begins-->
                                    <a href="<?php echo base_url('sale') ?>" accesskey="1" class="tile-large fg-white" data-role="tile" style="background-color: #734ACC">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-coins mif-ani-slow mif-ani-bounce"></span>
                                        <span class="tile-label">Daftar Penjualan</span>
                                      </div>
                                    </a>
                                    <a href="<?php echo base_url('sale/new_sale') ?>" accesskey="2" class="tile fg-white" data-role="tile" style="background-color: #905CFF">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-plus"></span>
                                        <span class="tile-label">Penjualan Baru</span>
                                      </div>
                                    </a>    
                                    <div class="tile fg-white" data-role="tile" style="background-color:  #4383E8">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-checkmark"></span>
                                        <span class="tile-label">Booking Baru</span>
                                      </div>
                                    </div>    
                                    <div class="tile-wide tile-big-x fg-white" data-role="tile" style="background-color: #3466B5">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-clipboard mif-ani-slow mif-ani-heartbeat"></span>
                                        <span class="tile-label">Daftar Booking</span>
                                      </div>
                                    </div>
                                </div><!--Container ends-->
                            </div>    
                          </div>
                          
                          <div class="cell">
                            <div class="tile-group triple" >
                              <span class="tile-group-title">Buyback</span>
                                <div class="tile-container"><!--Container Buyback begins-->
                                    <div class="tile-wide fg-white" data-role="tile" style="background-color: #A7857E">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-file-text mif-ani-slow mif-ani-vertical"></span>
                                        <span class="tile-label">Daftar Buyback</span>
                                      </div>
                                    </div>
                                    <a href="<?php echo base_url('buyback/new_buyback') ?>" class="tile fg-white" data-role="tile" style="background-color: #E0A194">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-plus"></span>
                                        <span class="tile-label">Buyback Baru</span>
                                      </div>
                                    </a>
                                </div><!--Container ends-->
                            </div>
                            <div class="tile-group triple" >
                                <span class="tile-group-title">Pembelian</span>
                                <div class="tile-container"><!--Container Pembelian begins-->
                                    <div class="tile-wide fg-white" data-role="tile" style="background-color: #3AB2A5">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-file-text mif-ani-slow mif-ani-vertical"></span>
                                        <span class="tile-label">Daftar Pembelian</span>
                                      </div>
                                    </div>
                                    <div class="tile fg-white" data-role="tile" style="background-color: #3DBD8B">
                                      <div class="tile-content iconic">
                                        <span class="icon mif-plus"></span>
                                        <span class="tile-label">Pembelian Baru</span>
                                      </div>
                                    </div>
                                </div><!--Container ends-->
                            </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li><!--Transaksi ends-->
              <!--Menu + Dropdown Inventory-->
              <li><a href="#" onclick="openNav(this)" class="menu-a"><i class="fa fa-dropbox" aria-hidden="true"></i> <span class="menu-text">Inventory</span></a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="grid">
                        <div class="row">
                          <div class="cell">
                            <div class="tile-group">
                              <span class="tile-group-title">Inventori</span>
                              <div class="tile-container left-margin"><!--Container begins-->
                                <a href="<?php echo base_url('product') ?>" class="tile-large tile-wide-y bg-amber fg-white" data-role="tile">
                                  <div class="tile-content iconic"><span class="icon mif-list  mif-ani-float"></span><span class="tile-label">Daftar Barang</span></div>
                                </a>
                                <a class="tile-large bg-orange fg-white" data-role="tile" href="<?php echo base_url('product/add_product') ?>">
                                  <div class="tile-content iconic"><span class="icon mif-plus"></span><span class="tile-label">Input Barang</span></div>
                                </a>
                                
                                <a class="tile tile-wide-x bg-cyan fg-white" data-role="tile" href="<?php echo base_url('category')?>">
                                  <div class="tile-content iconic"><span class="icon mif-file-text"></span><span class="tile-label">Kategori</span></div>
                                </a>
                           
                                <div class="tile tile-wide-x bg-magenta fg-white" data-role="tile">
                                  <div class="tile-content iconic"><span class="icon mif-versions mif-ani-horizontal"></span><span class="tile-label">Daftar Transaksi Barang</span></div>
                                </div>
                              </div><!--Container ends-->
                            </div>      
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <!--Inventory ends-->
              <!--Menu + Dropdown Outlets-->
              <li><a href="#" onclick="openNav(this)" class="menu-a"><span class="icon mif-shop"></span> <span class="menu-text">Toko</span></a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="grid">
                        <div class="row">
                          <div class="cell">
                            <div class="tile-group">
                              <div class="tile-group-title">Outlet</div>
                                <div class="tile-container left-margin"><!--Container begin-->
                                  <a href="<?php echo base_url('outlets') ?>" class="tile-large tile-wide-y bg-lime fg-white" data-role="tile">
                                    <div class="tile-content iconic"><span class="icon mif-shop mif-ani-shake"></span><span class="tile-label">Daftar Outlet</span></div>
                                  </a>
                                  <a href="<?php echo base_url('sales/add_sales') ?>" class="tile tile-wide-x bg-green fg-white" data-role="tile">
                                    <div class="tile-content iconic"><span class="icon mif-user-plus"></span><span class="tile-label">Tambah Sales Baru</span></div>
                                  </a>
                                  <a href="<?php echo base_url('outlets/add_outlet') ?>" class="tile tile-wide-x bg-emerald fg-white" data-role="tile">
                                    <div class="tile-content iconic"><span class="icon mif-plus"></span><span class="tile-label">Tambah Outlet Baru</span></div>
                                  </a>
                                  <a href="<?php echo base_url('sales') ?>" class="tile tile-super-x bg-darkEmerald fg-white" data-role="tile">
                                    <div class="tile-content iconic"><span class="icon mif-users  mif-ani-float"></span><span class="tile-label">Daftar Sales</span></div>
                                  </a>
                                </div><!--Container ends-->
                            </div>    
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <!--Outlet ends-->
              <!--Menu + Dropdown Kontak-->
              <li><a href="#" onclick="openNav(this)" class="menu-a"><i class="fa fa-phone" aria-hidden="true"></i> <span class="menu-text">Kontak</span></a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="grid">
                        <div class="row">
                          <div class="cell">
                            <div class="tile-group">
                              <span class="tile-group-title">DAFTAR KONTAK</span>
                              <div class="tile-container left-margin"> <!--Tile container begins-->
                                <a href="<?php echo base_url('customer') ?>" class="tile-large tile-wide-y bg-darkCobalt fg-white" data-role="tile">
                                  <div class="tile-content iconic">
                                    <span class="icon mif-users mif-ani-bounce"></span>
                                    <span class="tile-label">Daftar Customer</span>
                                  </div>
                                </a>
                                <a class="tile tile-super-x bg-cobalt fg-white" data-role="tile" href="<?php echo base_url('supplier') ?>">
                                  <div class="tile-content iconic">
                                    <span class="icon mif-file-text  mif-ani-heartbeat"></span>
                                    <span class="tile-label ">Daftar Supplier</span>
                                  </div>
                                </a>
                                <a class="tile tile-wide-x bg-darkBlue fg-white" data-role="tile" href="<?php echo base_url('customer/add_customer') ?>">
                                  <div class="tile-content iconic">
                                    <span class="icon mif-user-plus"></span>
                                    <span class="tile-label">Tambah Customer</span>
                                  </div>
                                </a>
                                <a class="tile tile-wide-x bg-lightBlue fg-white" data-role="tile" href="<?php echo base_url('supplier/add_supplier') ?>">
                                  <div class="tile-content iconic">
                                    <span class="icon mif-user-plus"></span>
                                    <span class="tile-label">Tambah Supplier</span>
                                  </div>
                                </a>
                              </div><!--Container Ends-->
                            </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
              <!--Kontak ends-->
              <!--Menu + Dropdown Konfigurasi-->
              <li><a href="#" onclick="openNav(this)" class="menu-a"><i class="fa fa-cog" aria-hidden="true"></i> <span class="menu-text">Konfigurasi</span></a>
                  <div class="container-fluid overlay">
                    <div class="overlay-content">
                      <div class="grid">
                        <div class="row">
                          <div class="cell">
                            <div class="tile-group">
                              <div class="tile-group-title">Konfigurasi</div>
                              <div class="tile-container left-margin"><!--Tile container start-->
                                <a href="<?php echo base_url('configuration/outlet_config') ?>" class="tile tile-large bg-darkBrown fg-white" data-role="tile">
                                    <div class="tile-content iconic"><span class="icon mif-shop  mif-ani-float"></span><span class="tile-label">Limit Jual Toko</span></div>
                                </a>
                                <a class="tile-wide bg-darkTeal fg-white" data-role="tile" href="<?php echo base_url('configuration/currency')?>">
                                  <div class="tile-content iconic"><span class="icon mif-dollar2"></span><span class="tile-label">Kurs</span></div>
                                </a>
                                <a href="<?php echo base_url('configuration/gold_amount') ?>" class="tile bg-brown fg-white" data-role="tile">
                                  <div class="tile-content iconic"><span class="icon mif-coins"></span><span class="tile-label">Gold</span></div>
                                </a>
                                <a href="<?php echo base_url('configuration/diamond_type') ?>" class="tile bg-darkOrange fg-white" data-role="tile">
                                  <div class="tile-content iconic"><span class="icon fa fa-diamond"></span><span class="tile-label">Diamond</span></div>
                                </a>
                                <div class="tile-wide tile-big-x bg-taupe fg-white" data-role="tile">
                                  <div class="tile-content iconic"><span class="icon mif-discout  mif-ani-shuttle"></span><span class="tile-label">Promo</span></div>
                                </div>
                                <a href="<?php echo base_url('configuration/color') ?>" class="tile bg-darkCrimson fg-white" data-role="tile">
                                  <div class="tile-content iconic"><span class="icon mif-palette mif-ani-bounce"></span><span class="tile-label">Tampilan</span></div>
                                </a>
                                <a href="<?php echo base_url('configuration/sales_point') ?>" class="tile tile-big-x bg-mauve fg-white" data-role="tile">
                                    <div class="tile-content iconic"><span class="icon mif-users"></span><span class="tile-label">Sales</span></div>
                                </a>
                                <a href="<?php echo base_url('configuration/member_point') ?>" class="tile tile-big-x bg-olive fg-white" data-role="tile">
                                    <div class="tile-content iconic"><span class="icon mif-organization"></span><span class="tile-label">Member</span></div>
                                  </a>  
                              </div><!--Tile Container ends-->
                          </div>    
                          </div>
                        </div>
                      </div>
                  </div>
              </li>
              <!--Konfigurasi ends-->
              <li><a href="<?php echo base_url('accounts/logout') ?>" class="menu-a"><i class="fa fa-power-off"></i> <span class="menu-text">Logout</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="hidden-sm">
              <li class="dropdown">
                  <a class="menu-a" style="cursor: pointer;" href="#"><span class="icon mif-user" style="margin-bottom: 4px;"></span> <span class="menu-text">Welcome, <?php echo $this->session->user_name?></span></a>
              </li>
            </ul>
              
            
           <!--Main menu ul ends-->
             
          
        </div><!-- /.container-fluid -->
      </nav>
  </header>
  
  <section style="min-height: 556px; margin-bottom: 60px;">
    <?php echo $body ?>
  </section>
  
  <?php $currencies = $this->crud_model->get_data('currency')->result();?>
  <div data-role="charm" data-position="bottom" id="charm_currency">
      <table class="table" style="margin-top: 0px;">
          <thead id="currency_head">
            <tr>
              <?php foreach ($currencies as $currency):?>

                  <td style="color: #fff;text-transform:uppercase;"><?php echo $currency->name; ?></td>
              <?php endforeach; ?>
            </tr>  
          </thead>
          <tbody>
            <tr>
              <?php foreach ($currencies as $currency):?>
                  <td><?php echo 'Rp '. number_format($currency->value,2,',','.') ?></td>
              <?php endforeach; ?>
            </tr>  
          </tbody>
      </table>
  </div>

  <footer style="height: 50px; position: fixed; bottom:0; width: 100%; background-color: <?php echo $configuration->primary_color ?>">
    <button onclick="toggleMetroCharm('#charm_currency');" id="kurstoggle" class="open-kurs button"><span class="icon mif-dollar2" style="margin-bottom: 4px;"></span></button>
  </footer>

    <script>


      function openNav(el){
        if($(el).parent('li').hasClass('buka')){
          $(el).parent('li').find('.overlay').css('height', 0);
          $(el).parent('li').find('.overlay').css('overflow-y', 'hidden');
          $(el).parent('li').find('.overlay').css('overflow-x', 'hidden');
          $(el).parent('li').find('.overlay').css('opacity', 0);
          $(el).parent('li').find('.overlay').css('padding-bottom', '0px');
          $('body').css('overflow-y','scroll');
          $(el).parent('li').removeClass('buka');
        }else{
          $('body').css('overflow-y','hidden');
          $('.navbar-nav').find('.overlay').css('overflow-x', 'hidden');
          $('.navbar-nav').find('.overlay').css('opacity', 0);
          $('.navbar-nav').find('.overlay').css('overflow-y', 'hidden');
          $('.navbar-nav').find('.overlay').css('padding-bottom', '0px');
          $('.navbar-nav').find('li').removeClass('buka');
          $('.navbar-nav').find('.overlay').css('height', 0);
          $(el).parent('li').find('.overlay').css('padding-bottom', '50px');
          $(el).parent('li').find('.overlay').css('overflow-y', 'scroll');
          $(el).parent('li').find('.overlay').css('overflow-x', 'scroll');
          $(el).parent('li').find('.drop').css('overflow-y', 'hidden');
          $(el).parent('li').find('.drop').css('overflow-x', 'hidden');
          $(el).parent('li').find('.overlay').css('opacity', '1');
          $(el).parent('li').addClass('buka');
          $(el).parent('li').find('.overlay').css('height','100%');
        } 
        
      }
    </script>
  </body>
</html>