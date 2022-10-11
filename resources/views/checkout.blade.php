<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Checkout | E-Shopper</title>
        <link href="/BahanStudy/css/bootstrap.min.css" rel="stylesheet">
        <link href="/BahanStudy/css/font-awesome.min.css" rel="stylesheet">
        <link href="/BahanStudy/css/prettyPhoto.css" rel="stylesheet">
        <link href="/BahanStudy/css/price-range.css" rel="stylesheet">
        <link href="/BahanStudy/css/animate.css" rel="stylesheet">
   <link href="/BahanStudy/css/main.css" rel="stylesheet">
   <link href="/BahanStudy/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/BahanStudy/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/BahanStudy//BahanStudy/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/BahanStudy/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/BahanStudy/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
   <header id="header"><!--header-->
           <?php
                $id = Session::get('id_user');
	   ?>
           <div class="header-middle"><!--header-middle-->
                   <div class="container">
                           <div class="row">
                                   <div class="col-md-4 clearfix">
                                           <div class="logo pull-left">
                                                   <a href="/"><img src="/BahanStudy/images/home/logo.png" alt="" /></a>
                                           </div>

                                   </div>
                                   <div class="col-md-8 clearfix">
                                           <div class="shop-menu clearfix pull-right">
                                                   <ul class="nav navbar-nav">
                                                           <li><a href="checkout_list"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                                           <li><a href="keranjang"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                                           <?php if($id != 0) { ?>
							   <li><a href='keluar'><i class='fa fa-sign-out'></i> Logout</a></li>
						           <?php } else{ echo "<li><a href='login'><i class='fa fa-sign-in'></i> Login</a></li>";}?>
                                                   </ul>
                                           </div>
                                   </div>
                           </div>
                   </div>
           </div><!--/header-middle-->

           <div class="header-bottom"><!--header-bottom-->
                   <div class="container">
                           <div class="row">
                                   <div class="col-sm-9">
                                           <div class="navbar-header">
                                                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                           <span class="sr-only">Toggle navigation</span>
                                                           <span class="icon-bar"></span>
                                                           <span class="icon-bar"></span>
                                                           <span class="icon-bar"></span>
                                                   </button>
                                           </div>
                                           <div class="mainmenu pull-left">
                                                   <ul class="nav navbar-nav collapse navbar-collapse">
                                                           <li><a href="/" class="active">Home</a></li>
                                                           <li><a href="contact">Contact</a></li>
                                                           <li><a href="confirm">Confirm</a></li>
                                                   </ul>
                                           </div>
                                   </div>
                                   <div class="col-sm-3">
                                           <div class="search_box pull-right">
                                                   <input type="text" placeholder="Search"/>
                                           </div>
                                   </div>
                           </div>
                   </div>
           </div><!--/header-bottom-->
   </header><!--/header-->

   <section id="cart_items">
           <div class="container">
                   <div class="breadcrumbs">
                           <ol class="breadcrumb">
                             <li><a href="#">Home</a></li>
                             <li class="active">Check out</li>
                           </ol>
                   </div><!--/breadcrums-->


                   <div class="review-payment">
                           <h2>Review & Payment</h2>
                   </div>

                   <div class="table-responsive cart_info">
                           <table class="table table-condensed">
                                   <thead  class="text-center">
                                           <tr class="cart_menu">
                                                   <td class="image">Item</td>
                                                   <td class="description"></td>
                                                   <td class="price">Price</td>
                                                   <td class="quantity">Quantity</td>
                                                   <td class="total">Total</td>
                                                   <td></td>
                                           </tr>
                                   </thead>
                                   <tbody>
                                   <?php $total = 0; if($id != 0) { ?>
                                        @foreach($checkout as $ckt)
                                           <tr class="text-center">
                                                   <td class="cart_product">
                                                           <a href=""><img src="{{asset('storage/data_file/'.$ckt->gambar)}}" alt=""></a>
                                                   </td>
                                                   <td class="cart_description">
                                                           <h4>{{$ckt->nama_produk}}</h4>
                                                   </td>
                                                   <td class="cart_price">
                                                           <h4><?php echo "Rp ".number_format($ckt->harga, 0,',','.'); ?></h4>
                                                   </td>
                                                   <td class="cart_quantity">
                                                           <p>{{$ckt->jumlah}}</p>
                                                   </td>
                                                   <td class="cart_total">
                                                           <p class="cart_total_price"><?php echo "Rp ".number_format($ckt->harga * $ckt->jumlah, 0,',','.'); ?></p>
                                                   </td>
                                           </tr>
                                           <?php $total += ($ckt->jumlah * $ckt->harga) ?>
                                           @endforeach
                                           <?php } else{}?>

                                           <tr>
                                                   <td colspan="4">&nbsp;</td>
                                                   <td colspan="2">
                                                           <table class="table table-condensed total-result">
                                                                   <tr>
                                                                           <?php $id_token = 0; ?>
                                                                           @foreach($checkout as $idc)
                                                                                <?php $id_token = $idc -> id_checkout ?>
                                                                           @endforeach
                                                                           <?php if($id != 0) { ?>
                                                                           <td>Id Token</td>
                                                                           <td><input type="text" id="pilih" style="color: #FE980F; border: none; outline: none; font-size: 17px; font-weight: bold;" readonly value="{{ $id_token }}"></td>
                                                                           <td><button type="button" onclick="copy_text()" style="border: none; padding: 0; background: none;"><i class="fa fa-clipboard"></i></button></td>
                                                                           <?php } else{}?>
                                                                           <td>Total</td>
                                                                           <td><span><?php echo "Rp ".number_format($total, 0,',','.'); ?></span></td>
                                                                   </tr>
                                                           </table>
                                                   </td>
                                           </tr>
                                   </tbody>
                           </table>
                   </div>
                   <div class="payment-options">

                           </div>
           </div>
   </section> <!--/#cart_items-->

   <footer id="footer"><!--Footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>

   </footer><!--/Footer-->

        <script src="/BahanStudy/js/jquery.js"></script>
        <script src="/BahanStudy/js/bootstrap.min.js"></script>
        <script src="/BahanStudy/js/jquery.scrollUp.min.js"></script>
        <script src="/BahanStudy/js/jquery.prettyPhoto.js"></script>
        <script src="/BahanStudy/js/main.js"></script>

        <script type="text/javascript">

                function copy_text() {
                        document.getElementById("pilih").select();
                        document.execCommand("copy");
                        alert('ID Token Berhasil di Salin !');
                }
        </script>
</body>
</html>