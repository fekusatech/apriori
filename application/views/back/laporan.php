<head>
    <title><?=$title?></title>
    <style>
        body{margin:50px};
    </style>
</head>
<?php $bln = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");?>
<body>
<center>
    <h3><?=$title?><br> <font style="font-size:12pt;">Periode <?=$bln[$bulan]?></font></h3>
</center>
<table border='1' style="border-collapse:collapse">
  <thead>
      <th width="3%">No</th>
      <th>User</th>
      <th>Item</th>
      <th>Harga</th>
      <th>Biaya Admin</th>
      <th>Subtotal</th>
  </thead>
  <tbody style="text-align:center">
      <?php 
      if ($data) { 
        $total = 0;
        $no=1; foreach ($data as $d) {  ?>
          <tr>
              <td><?=$no++?></td>
              <td><?=ucfirst($d->nama)?></td>
              <td><?=$d->namaproduk?></td>
              <td>Rp. <?=number_format($d->harga)?></td>
              <td >Rp. <?=number_format($web->biaya_admin)?></td>
              <td >Rp. <?=number_format($web->biaya_admin + $d->harga)?></td>
          </tr>
        <?php $total += $d->harga; } ?>
      <?php }else{ ?>
        <tr>
          <td colspan="5">Data tidak ditemukan</td>
        </tr>
      <?php } ?>
  </tbody>
</table>
</body>
<script type="text/javascript">
    function PrintWindow() {                    
       window.print();            
       CheckWindowState();
    }

    function CheckWindowState()    {           
        if(document.readyState=="complete") {
            window.close(); 
        } else {           
            setTimeout("CheckWindowState()", 1000)
        }
    }
    PrintWindow();
</script>