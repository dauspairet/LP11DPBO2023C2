<?php

include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	// Menampilkan data pasien
	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
                    <a href=\"index.php?id_edit=" . $this->prosespasien->getId($i) .  "\" ' class='btn btn-success''>Edit</a>
                    <a href=\"index.php?id_hapus=" . $this->prosespasien->getId($i) . "\" ' class='btn btn-warning'>Delete</a>
            </td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	// Form add data pasien
	public function formPasienAdd(){
        $crudLabel = null;
        $homeLabel = null;
        $processLabel = null;
        $formControl = null;
        $cancelLabel = null;
        $addNew = null;

        // Navbar
        $crudLabel .= "index.php";
        $homeLabel .= "index.php";
        
        // Judul
        $processLabel .= "Create New Pasien";

        // Menyimpan variabel link add
        $addNew .= "index.php?id_add=1";

        // Form pasien
        $formControl .= "
		<form method='post'>
          <label> NIK: </label>
          <input type='text' name='nik' class='form-control'> <br>

          <label> NAMA: </label>
          <input type='text' name='nama' class='form-control'> <br>

          <label> TEMPAT: </label>
          <input type='text' name='tempat' class='form-control'> <br>

          <label> TANGGAL LAHIR: </label>
          <input type='date' name='tl' class='form-control'> <br>

		  <label> GENDER: </label>
          <input type='text' name='gender' class='form-control'> <br>
		  
		  <label> EMAIL: </label>
          <input type='text' name='email' class='form-control'> <br>

		  <label> TELEPON: </label>
          <input type='text' name='telp' class='form-control'> <br>

          <br>
		  
		  <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
		  <a class='btn btn-info' type='submit' name='cancel' href='CANCEL_LABEL'> Cancel </a>
		  <br>
		  </form>";

		// jika melakukan submit   
		if (isset($_POST['submit'])) {
			$this->prosespasien->add();
			header("location:index.php");
		}

        // Button cancel
        $cancelLabel .= "index.php";

        // Membuka template baru
        $tpl = new Template("templates/skinform.html");

        // Menukar isi variabel
        $tpl->replace("CRUD_LABEL", $crudLabel);
        $tpl->replace("HOME_LABEL", $homeLabel);
        $tpl->replace("ADD_NEW", $addNew);
        $tpl->replace("PROCESS_LABEL", $processLabel);
        $tpl->replace("FORM_CONTROL", $formControl);
        $tpl->replace("CANCEL_LABEL", $cancelLabel);
        $tpl->write();
		
      }

	  // Form add data pasien
	public function formPasienEdit($id){
		$this->prosespasien->prosesDataPasien();
        $crudLabel = null;
        $homeLabel = null;
        $processLabel = null;
        $formControl = null;
        $cancelLabel = null;
        $addNew = null;

        // Navbar
        $crudLabel .= "index.php";
        $homeLabel .= "index.php";
        
        // Judul
        $processLabel .= "Edit Pasien";

        // Menyimpan variabel link add
        $addNew .= "index.php?id_add=1";

        // Ukuran data
    	$size = $this->prosespasien->getSize();

		// Penanda Id
		$found = false;

		// Mencari Id
		for ($i = 0; $i < $size; $i++) {
			if ($this->prosespasien->getId($i) == $id && !$found) {
				$found = true;
				break;
			}
		}

		// Jika Id ditemukan
		if ($found) {
			$nik = $this->prosespasien->getNik($i);
			$nama = $this->prosespasien->getNama($i);
			$tempat = $this->prosespasien->getTempat($i);
			$tl = $this->prosespasien->getTl($i);
			$gender = $this->prosespasien->getGender($i);
			$email = $this->prosespasien->getEmail($i);
			$telp = $this->prosespasien->getTelp($i);

			// Form pasien
			$formControl .= "
			<form method='post'>
				<label> NIK: </label>
				<input type='text' name='nik' class='form-control' value='$nik'> <br>

				<label> NAMA: </label>
				<input type='text' name='nama' class='form-control' value='$nama'> <br>

				<label> TEMPAT: </label>
				<input type='text' name='tempat' class='form-control' value='$tempat'> <br>

				<label> TANGGAL LAHIR: </label>
				<input type='date' name='tl' class='form-control' value='$tl'> <br>

					<label> GENDER: </label>
				<input type='text' name='gender' class='form-control' value='$gender'> <br>

				<label> EMAIL: </label>
				<input type='text' name='email' class='form-control' value='$email'> <br>

				<label> TELEPON: </label>
				<input type='text' name='telp' class='form-control' value='$telp'> <br>

				<br>

				<button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
				<a class='btn btn-info' type='submit' name='cancel' href='CANCEL_LABEL'> Cancel </a>
				<br>
			</form>";

			// Jika melakukan submit
			if (isset($_POST['submit'])) {
				$this->prosespasien->editPasien($id);
				header("location:index.php");
			}
		}


        // Button cancel
        $cancelLabel .= "index.php";

        // Membuka template baru
        $tpl = new Template("templates/skinform.html");

        // Menukar isi variabel
        $tpl->replace("CRUD_LABEL", $crudLabel);
        $tpl->replace("HOME_LABEL", $homeLabel);
        $tpl->replace("ADD_NEW", $addNew);
        $tpl->replace("PROCESS_LABEL", $processLabel);
        $tpl->replace("FORM_CONTROL", $formControl);
        $tpl->replace("CANCEL_LABEL", $cancelLabel);
        $tpl->write();
		
      }
	
	// Melakukan delete
	function delete($data)
	{
		$this->prosespasien->deletePasien($data);
		header("location:index.php");
	}
}
