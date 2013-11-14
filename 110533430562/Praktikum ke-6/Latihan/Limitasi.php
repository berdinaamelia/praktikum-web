<!DOCTYPE html>
<html>
        <head>
                <title>Limitasi Data</title>
        </head>

    <body>
            <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" name="frm_select">
            Tampilkan   
            <select name="row_page" onchange="document.forms.frm_select.submit();">     
                      <option>-- pilih --</option>     
                <option <?php if($_POST['row_page']=='5') echo "selected"; ?> value="5">5</option>     
                <option <?php if($_POST['row_page']=='10') echo "selected"; ?> value="10">10</option>     
                <option <?php if($_POST['row_page']=='20') echo "selected"; ?> value="20">20</option>     
                <option <?php if($_POST['row_page']=='50') echo "selected"; ?> value="50">50</option>     
                <option <?php if($_POST['row_page']=='100') echo "selected"; ?> value="100">100</option>   
            </select> 
            baris per halaman.   
        </form>  
                <?php 
                if (isset($_POST['row_page']) && $_POST['row_page']) 
                {   
                        require_once './Koneksi.php';  
                          // Batas baris data   
                        $row = $_POST['row_page'];
                        // LENGKAPI
                        $sql = "SELECT *  FROM mahasiswa LIMIT $row";   
                        // Variabel $sql berisi pernyataan SQL retrieve dg limitasi  
                          $res = mysql_query($sql);  
                        if ($res) 
                        {     
                                if (mysql_num_rows($res)) 
                                { 
                ?>  
                    <table border="1" cellspacing="1" cellpadding="5">       
                        <tr>         
                            <th>#</th>         
                            <th width=100>NIM</th>         
                            <th width=150>Nama</th>         
                            <th>Alamat</th>       
                        </tr>      
             <?php       
                                                $i = 1;       
                                                while ($row = mysql_fetch_row($res)) 
                                                {
                ?>         
                            <tr>           
                                <td><?php echo $i;?></td>           
                                <td><?php echo $row[0];?></td>           
                                <td><?php echo $row[1];?></td>           
                                <td><?php echo $row[2];?></td>         
                            </tr>         
                <?php         
                                                        $i++;       
                                                }       
                ?>       
                                </table>     
                <?php     
                                } 
                                else 
                                {       
                                        echo 'Data Tidak Ditemukan';     
                                }   
                        }  
                }  
                ?>
    </body>
</html>