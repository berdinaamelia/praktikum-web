<!DOCTYPE html>
<html>
    <head>
        <title>Studi Kasus</title>
    </head>

    <body>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="get">   
                Nama <input type="text" name="nama" size=40 value="<?php echo $_GET['nama']; ?>" />   <input type="submit" value="CARI" /> 
        </form>  
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" name="frm_select">
            Tampilkan   
            <select name="row_page" onchange="document.forms.frm_select.submit();" <?php if($_GET['nama']=="") echo "disabled"; ?>>     
                      <option value="">-- pilih --</option>     
                <option <?php if($_POST['row_page']=='2'||$_GET['limit']=='2') echo "selected"; ?> value="2">2</option>     
                <option <?php if($_POST['row_page']=='10'||$_GET['limit']=='10') echo "selected"; ?> value="10">10</option>     
                <option <?php if($_POST['row_page']=='20'||$_GET['limit']=='20') echo "selected"; ?> value="20">20</option>     
                <option <?php if($_POST['row_page']=='50'||$_GET['limit']=='50') echo "selected"; ?> value="50">50</option>     
                <option <?php if($_POST['row_page']=='100'||$_GET['limit']=='100') echo "selected"; ?> value="100">100</option>   
            </select> 
            baris per halaman.   
        </form>
                <?php 
                if (isset($_GET['nama'])) 
                {   
                        require_once './Koneksi.php';  
                          // Kata kunci pencarian   
                          $key = $_GET['nama'];
                        if($_POST['row_page']!=""||$_GET['page']!='') 
                        { 
                                if($_POST['row_page']!="") 
                                        $record_num = $_POST['row_page'];
                                else
                                        $record_num = $_GET['limit'];
                                $self = $_SERVER['PHP_SELF']; 
                                $link_num = 5; 
                                $page = isset($_GET['page']) ? $_GET['page'] : 0;  
                                // Variabel $sql berisi pernyataan SQL pencarian
                                $offset = $page ? ($page - 1) * $record_num : 0;
                                $sql = 'SELECT * FROM mahasiswa';    
                                $total_rows = mysql_num_rows(mysql_query($sql)); 
                                $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$key%' LIMIT $offset, $record_num";
                                $max_page   = ceil($total_rows/$record_num);
                                if ($page > $max_page || $page <= 0) 
                                {  
                                        $page = 1; 
                                }   
                                //***************** Generate paging 
                                $paging = '';
                                if($max_page > 1) 
                                {   
                                        //*** Render link previous   
                                        if ($page > 1) 
                                        { 
                                                if($_POST['row_page']!="")    
                                                        $paging .= ' <a href="'.$self.'?nama='.$_GET['nama'].'&limit='.$_POST['row_page'].'&page='.($page-1).'">previous</a> ';
                                                else
                                                        $paging .= ' <a href="'.$self.'?nama='.$_GET['nama'].'&limit='.$_GET['limit'].'&page='.($page-1).'">previous</a> ';
                                        } 
                                        else 
                                        {     
                                                $paging .= ' previous ';   
                                        }  
                                        //*** Render link counter halaman   
                                        for ($counter = 1; $counter <= $max_page; $counter += $link_num) 
                                        {     
                                                if ($page >= $counter) 
                                                {       
                                                        $start = $counter;     
                                                }   
                                        }   
                                        if ($max_page > $link_num) 
                                        {     
                                                $end = $start + $link_num;     
                                                if ($end > $max_page) 
                                                {       
                                                        $end = $max_page + 1;     
                                                }   
                                        } 
                                        else 
                                        {     
                                                $end = $max_page;   
                                        }   
                                        for ($counter = $start; $counter < $end; $counter++) 
                                        {     
                                                if ($counter == $page) 
                                                {       
                                                        $paging .= $counter;     
                                                } 
                                                else 
                                                {       
                                                        if($_POST['row_page']!="")
                                                                $paging .= ' <a href="'.$self.'?nama='.$_GET['nama'].'&limit='.$_POST['row_page'].'&page='.$counter.'">' .$counter. '</a> ';     
                                                        else
                                                                $paging .= ' <a href="'.$self.'?nama='.$_GET['nama'].'&limit='.$_GET['limit'].'&page='.$counter.'">' .$counter. '</a> ';     
                                                }   
                                        }  
                                        //*** Render link next   
                                        if ($page < $max_page) 
                                        { 
                                                if($_POST['row_page']!="")   
                                                        $paging.= ' <a href="' .$self.'?nama='.$_GET['nama'].'&limit='.$_POST['row_page'].'&page='.($page+1).'">next</a> ';
                                                else
                                                        $paging.= ' <a href="' .$self.'?nama='.$_GET['nama'].'&limit='.$_GET['limit'].'&page='.($page+1).'">next</a> ';
                                        } 
                                        else 
                                        {     
                                                $paging.= ' next ';
                                        }  
                                }  
                        } 
                        else 
                        {
                                  // Variabel $sql berisi pernyataan SQL pencarian   
                                $sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$key%'";  
                        }
                          $res = mysql_query($sql);  
                         if ($res) 
                        {     
                                $num = mysql_num_rows($res);     
                                if ($num) 
                                {       
                                        echo 'Ditemukan ' . $num . ' row(s)'; 
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
                else 
                {   
                        echo 'Masukkan kata kunci pencarian'; 
                }  
                if($_POST['row_page']!=""||$_GET['page']!='') 
                { 
                        echo $paging;
                }
                ?>
    </body>
</html>