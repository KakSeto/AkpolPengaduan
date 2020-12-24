<html>
<head>
	<title>Print Document</title>
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    
</head>
<body>
    <center>
    <img src="<?php echo base_url()?>/dist/img/kop.png" width="100%">
 <br><br>
    </center>

	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
           <th><center><b>No</b></center></th>
                  <th><center><b> Nama Pelapor</b></center></th>
                  <th><center><b>Nomor Laporan</b></th>
                  <th><center><b>Jenis Laporan</b></center></th>
                  <th><center><b>Tanggal Lapor</></center></th>
                  <th><center><b>Status</b></center></th>
        </tr>
      

                    <?php
                        $no = 0;
                        foreach ($data->result() as $row) {
                            $no++;
                            ?> 
                            <tr> 
                                <td><center><?php echo $no ?></center></td>
                           
              <td><center><?php echo $row->Nama ?></center></td>
              <td><center><?php echo $row->id_laporan ?></center></td>
              <td><center><?php echo $row->Jenis ?></center></td>
              <td><center><?php echo $row->tanggal_lapor ?></center></td>
                 <td>
<center>

                <?php if(($row->Status =='Belum Dibaca')){
                  echo '<i class="fa fa-remove"></i>';
                }else if(($row->Status =='Sudah Dibaca')) {
                  echo '<i class="fa fa-check"></i>';
                }

                 ?>
               </center></td>
                            </tr> 
                            <?php
                        }
                    
                    ?> 
    </table>
 <script>
    window.load = print_d();
    function print_d(){
      window.print();
    }
  </script>
</body>
</html>