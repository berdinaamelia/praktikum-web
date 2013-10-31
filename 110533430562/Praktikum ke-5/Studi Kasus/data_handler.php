<?php
	/**	
	* Fungsi utama untuk menangani pengolahan data
	* @param string root parameter menu
	*/
	function data_handler($root) 
	{
		if (isset($_GET['act']) && $_GET['act'] == 'add') 
		{
			data_editor($root);
			return;
		}
		$sql = 'SELECT COUNT(*) AS total FROM ' . MHS;
		$res = mysql_query($sql);
		// Jika data di tabel ada
		if (mysql_num_rows($res)) 
		{
			if (isset($_GET['act']) && $_GET['act'] != '') 
			{
				switch($_GET['act']) 
				{
					case 'edit':	
					if (isset($_GET['id']) && ctype_digit($_GET['id'])) 
					{
						data_editor($root, $_GET['id']);
					}
					else 
					{
						show_admin_data($root);
					}
					break;
					case 'view':
					if (isset($_GET['id']) && ctype_digit($_GET['id'])) 
					{
						data_detail($root, $_GET['id'], 1);
					} 
					else 
					{
						show_admin_data($root);
					}
					break;
					case 'del':	
					if (isset($_GET['id']) && ctype_digit($_GET['id'])) 
					{ 		
						// Key untuk penghapusan data
						data_delete($root, $_GET['id']);
					} 
					else 
					{
						show_admin_data($root);
					}
					break;
					default:
						show_admin_data($root);
				}
			} 
			else 
			{
				show_admin_data($root);
			}
			@mysql_close($res);
		} 
		else 
		{
			echo 'Data Tidak Ditemukan';
		}
	}
	//--------------------------------------------------------------------------------------------------------
	/**
	* Fungsi untuk menampilkan menu administrasi
	* @param string root parameter menu
	*/
	function show_admin_data($root) { ?>
	<h2 class="heading">Administrasi Data</h2>
<?php
	$sql = 'SELECT nim, nama, alamat FROM ' . MHS;
	$res = mysql_query($sql);
	if ($res) 
	{
		$num = mysql_num_rows($res);
		if ($num) {
?>
		<div class="tabel">
		<div style="padding:5px;">
			<a href="<?php echo $root;?>&amp;act=add">Tambah Data</a>
		</div>
		<table border=1 width=700 cellpadding=4 cellspacing=0>
			<tr>
				<th>#</th>
				<th width=120>NIM</th>
				<th width=200>Nama</th>
				<th width=200>Alamat</th>
				<th>Menu</th>
			</tr>
<?php
			$i = 1;
			while ($row = mysql_fetch_row($res)) 
			{
				$bg = (($i % 2) != 0) ? '' : 'even';
				$id = $row[0]; 
?>
				<tr class="<?php echo $bg;?>">
					<td width="2%"><?php echo $i;?></td>
					<td>
						<a href="<?php echo $root;?>&amp;act=view&amp;id=<?php echo $id;?>"title="Lihat Data"><?php echo $id;?></a>
					</td>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2]?></td>
					<td align="center">| <a href="<?php echo $root;?>&amp;act=edit&amp;id=
<?php echo $id;?>">Edit</a> || <a href="<?php echo $root;?>&amp;act=del&amp;id=
<?php echo $id;?>" onclick="return confirm('Delete data with id <?php echo $id; echo " (".$row[1]. " )"; ?>  ?');" > Hapus</a> |

					<!--Lengkapi kode PHP untuk membuat link hapus data-->
					</td>
				</tr>
<?php
				$i++;
			}
?>
			</table>
			</div>
<?php
		} 
		else 
		{
			echo 'Belum ada data, isi <a href="'.$root.'&amp;act=add">di sini</a>';
		}	
		@mysql_close($res);
	}	
}

//--------------------------------------------------------------------------------------------------------


/**
* Fungsi untuk menampilkan detail data mahasiswa
* @param string root parameter menu
* @param integer id nim mahasiswa
*/
function data_detail($root, $id) 
{
	$sql = 'SELECT nim, nama, alamat
			FROM ' . MHS .
			' WHERE nim=' . $id;
	$res = mysql_query($sql);
	if ($res) 
	{
		if (mysql_num_rows($res)) 
		{ ?>
			<div class="tabel">
				<table border=1 width=700 cellpadding=4 cellspacing=0>
<?php
				$row = mysql_fetch_row($res); ?>
					<tr>
						<td>NIM</td>
						<td><?php echo $row[0];?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td><?php echo $row[1];?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?php echo $row[2];?></td>
					</tr>
				</table>
			</div>
<?php
		} 
		else 
		{
			echo 'Data Tidak Ditemukan';
		}
		@mysql_close($res);
	}
}

//--------------------------------------------------------------------------------------------------------


/**
* Fungsi untuk menghasilkan form penambahan/pengubahan
* @param string root parameter menu
* @param integer id nim mahasiswa
*/
function data_editor($root, $id = 0) 
{
	$view = true;
	if (isset($_POST['nim']) && $_POST['nim'] ) 
	{
		// Jika tidak disertai id, berarti insert baru
		if (!$id) 
		{
			// Lengkapi Pernyataan PHP SQL untuk INSERT data
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$sql = "INSERT INTO mahasiswa
					VALUES ('" .$nim. "', '" .$nama. "', '" .$alamat. "' )";
			$res = mysql_query($sql);
			if ($res) 
			{ ?>
				<script type="text/javascript">
					document.location.href="<?php echo $root;?>";
				</script>
<?php
			} 
			else 
			{
				echo 'Gagal menambah data';
			}
		} 
		else 
		{
			// Lengkapi Pernyataan PHP SQL untuk UPDATE data
			$nim = $_POST['nim'];
			$nama = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$sql = "UPDATE " . MHS . " SET nim = '" .$nim. "', nama = '" .$nama. "', alamat = '" .$alamat. "' WHERE nim = " . $id;
			$res = mysql_query($sql);
			if ($res) 
			{ 
				// Lengkapi script untuk redireksi ke root
?>
				<script type="text/javascript">
					document.location.href="<?php echo $root;?>";
				</script>
<?php
			} 
			else 
			{
				echo 'Gagal memodifikasi';
			}
		}
	}
	// Menyiapkan data untuk updating
	if ($view) 
	{
		if ($id) 
		{
			$sql = 'SELECT nim, nama, alamat FROM ' . MHS .
					' WHERE nim=' . $id;
			$res = mysql_query($sql);
			if ($res) 
			{
				if (mysql_num_rows($res)) 
				{
					$row = mysql_fetch_row($res);
					$nim = $row[0];
					$nama = $row[1];
					$alamat = $row[2];
				} 
				else 
				{
					show_admin_data();
					return;
				}
			}
		} 
		else 
		{
			$nim = @$_POST['nim'];
			$nama = @$_POST['nama'];
			$alamat = @$_POST['alamat'];
		}
?>
		<h2> <?php echo $id ? 'Edit' : 'Tambah';?> Data</h2>
		<form action="" method="post">
			<table border=1 cellpadding=4 cellspacing=0>
				<tr>
					<td width=100>NIM*</td>
					<td> <input type="text" name="nim" size=10 value="<?php echo $nim;?>" /> </td>
				</tr>
				<tr>
					<td>Nama</td>
					<td> <input type="text" name="nama" size=40 value="<?php echo $nama;?>" /> </td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td> <input type="text" name="alamat" size=60 value="<?php echo $alamat;?>" /> </td>
				</tr>
				<tr>
					<td> </td>
					<td><input type="submit" value="Submit" />
					<input type="button" value="Cancel" onclick="history.go(-1)" /></td>
				</tr>
			</table>
		</form> <br />
		<p>Ket: * Harus diisi</p>
<?php
	}
	return false;
}


//--------------------------------------------------------------------------------------------------------


/* Fungsi untuk menghasilkan form menghapus 
@param string root parameter menu 
@param integer id nim mahasiswa
*/
function data_delete($root, $id) 
{
	if (isset($_GET['id']) && $_GET['id']) 
	{
		// Pernyataan SQL hapus data
		$sql = "DELETE FROM " . mahasiswa . " WHERE nim =" . $id;
		@$res = mysql_query($sql);
		if ($res) 
		{
			// Script untuk redireksi ke root
?>
			<script type="text/javascript">
				document.location.href="<?php echo $root;?>";
			</script>
<?php echo 'Data dengan NIM ' . $id . ' berhasil dihapus';
		} 
		else 
		{
			echo 'Gagal menghapus data';
		}
		@mysql_close($res);
	}
}
