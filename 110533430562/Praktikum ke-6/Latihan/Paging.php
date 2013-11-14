<!DOCTYPE html>
<html>
        <head>
                <title>Paging Data</title>
        </head>

        <body>
                <?php 
                require_once './Koneksi.php'; 
                //***************** Setup paging 
                $sql = 'SELECT * FROM mahasiswa';  
                $self = $_SERVER['PHP_SELF']; 
                $page = isset($_GET['page']) ? $_GET['page'] : 0;  
                // Jumlah link counter, misal (prev 1 2 3 next) = 3 
                $link_num = 3; 
                // Jumlah record per halaman 
                $record_num = 5;  
                // Item pertama yang akan ditampilkan 
                $offset = $page ? ($page - 1) * $record_num : 0;  
                $total_rows = mysql_num_rows(mysql_query($sql)); 
                $query = $sql. ' LIMIT ' . $offset . ', ' . $record_num; 
                $result     = mysql_query($query); 
                $max_page   = ceil($total_rows/$record_num);  
                // Reset jika page tidak sesuai 
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
                                $paging .= ' <a href="'.$self.'?page='.($page-1).'">previous</a> ';   
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
                                        $paging .= ' <a href="'.$self.'?page='.$counter.'">' .$counter. '</a> ';     
                                }   
                        }  
                        //*** Render link next   
                        if ($page < $max_page) 
                        {     
                                $paging.= ' <a href="' .$self.'?page='.($page+1).'">next</a> ';   
                        } 
                        else 
                        {     
                                $paging.= ' next ';
                        }  
                } 
        ?>  
                <table border=1 cellspacing=1 cellpadding=5> 
                <tr>   
                    <th>#</th>   
                <th width=100>NIM</th>   
                <th width=150>Nama</th>   
                <th>Alamat</th> 
                  </tr> 
        <?php 
                        $i = 1; 
                        while ($row = mysql_fetch_row($result)) 
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
                //***************** Tampilkan navigasi 
                echo $paging;  
?> 
    </body>
</html>