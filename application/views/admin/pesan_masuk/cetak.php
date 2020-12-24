<html>
<head>
	<title>Print Document</title>
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    
</head>
<body>
    <center>
    <img src="<?php echo base_url()?>/dist/img/kopsurat.png" width="100%">
 <br><br>
    </center>

	<table border="1" width="90%" style="border-collapse:collapse;" align="center">
    	<tr class="tableheader">
           <th><center><b>No</b></center></th>
                  <th><center><b> Nama Pelapor </b></center></th>
                  <th><center><b> Jenis Laporan </b></center></th>
                  <th><center><b> Tanggal Lapor </b></center></th>
                  <th><center><b> Departemen </b></center></th>
                  <th><center><b> Laporan </b></center></th>
                  <th><center><b> Lokasi </b></center></th>
        </tr>
      

                    <?php
                        $no = 0;
                        foreach ($data->result() as $row) {
                            $no++;
                            ?> 
                            <tr> 
                                <td><center><?php echo $no ?></center></td>
                           
              <td><center><?php echo $row->Nama ?></center></td>
              <td><center><?php echo $row->Jenis ?></center></td>
              <td><center><?php echo $row->tanggal_lapor ?></center></td>
              <td><center><?php echo $row->Nama_Departemen ?></center></td>
              <td><center><?php echo $row->Laporan ?></center></td>
              <td><center><?php echo $row->nama_gedung ?></center></td>

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