
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Donasi</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1-1.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-1.css">
     <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
    <body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white" id="mainNav">
        <div class="container"><a class="navbar-brand text-dark js-scroll-trigger" href="index.php">BajuKita</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler text-lowercase text-light bg-dark navbar-toggler-right" type="button" data-toogle="collapse"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto text-uppercase">
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#page-top">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#profil">PROFIL</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#cara-donasi">SYARAT &amp; CARA</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="table.php">DONASI</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="login.php">PENGURUS</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link text-info js-scroll-trigger" href="index.php#footer">KONTAK</a></li>
                </ul>
            </div>
        </div>
    </nav>
   

   
<div class="col-md-12 search-table-col">
    <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" >
                    <h2 class="text-uppercase section-heading">Daftar Permintaan Donasi&nbsp;</h2>
  
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Cari Donasi disini.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover">
                <thead class="bill-header cs">

                    <tr>
                        
                        <th id="trs-hd" class="col-lg-0" >No</th>
                        <th id="trs-hd" class="col-lg-0">Jenis Pakaian</th>
                        <th id="trs-hd" class="col-lg-0">Gender</th>
                        <th id="trs-hd" class="col-lg-0">Jumlah</th>
                        <th id="trs-hd" class="col-lg-0">Nama Panti</th>
                        <th id="trs-hd" class="col-lg-0">Nama pengurus</th>
                        <th id="trs-hd" class="col-lg-0">Tanggal</th>
                        <th id="trs-hd" class="col-lg-0">Aksi</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                                        
  <?php include('pengurus/includes/config.php');
		$ret="select * from donasi d,pantiasuhan pa, pengurus p WHERE p.id_pengurus=d.id_pengurus AND pa.id_panti=d.id_panti ";
        $stmt= $mysqli->prepare($ret) ;
       
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        $cnt=1;
        while($row=$res->fetch_object())
              {?>
                    <tr>
                         <td><?php echo $cnt++; ?></td>
                <td><?php echo $row->Jenis_pakaian; ?></td>
                <td><?php echo $row->gender; ?></td>
                <td><?php echo $row->jumlah;?></td>
                <td><?php echo $row->nama_panti;?></td>
                <td><?php echo $row->name;?></td>
                <td><?php echo $row->tgl;?></td>
                        
                        <td><a href="detail.php?id=<?php echo $row->id_donasi;?>" title="Lihat Detail Donasi"><button class="btn btn-success" style="margin-left: 5px;" type="submit">Lihat Detail</button></a></td>
                        <?php 
		}
		?>  </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/Table-with-search-1.js"></script>
    
</body>
