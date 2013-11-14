<!doctype html>
<html lang="en-US">
        <head>
                  <meta charset="utf-8">
                <meta http-equiv="Content-Type" content="text/html">
                <title>Sorting Table</title>
                <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
                <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
                <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
        </head>

<body>
 <div id="wrapper">
  <h1>Sortable Table</h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>#</span></th>
        <th><span>NIM</span></th>
        <th><span>Nama</span></th>
        <th><span>Alamat</span></th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once './Koneksi.php';
          $sql = "SELECT * FROM mahasiswa";
          $res = mysql_query($sql); 
          $i = 1;
          while ($row = mysql_fetch_row($res)) 
          {
      ?>
              <tr>
                <td class="lalign"><?php echo $i;?></td>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
                <td><?php echo $row[2];?></td>
              </tr>
              <?php 
                      $i++;
              ?>
      <?php
          }
      ?>
    </tbody>
  </table>
 </div> 
<script type="text/javascript">
$(function()
{
  $('#keywords').tablesorter(); 
});
</script>
</body>
</html>