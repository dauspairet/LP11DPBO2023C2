<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	// Mengambil data pasien berdasarkan id
    function getPasienById($id)
    {
        $query = "SELECT * FROM pasien WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    // Menambah data pasien
    function addPasien($data)
    {
        // Data tabel pasien
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];

        // Operasi add
        $query = "INSERT INTO pasien (`nik`, `nama`, `tempat`,`tl`, `gender`, `email`, `telp`) VALUES ('$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";

        // Mengeksekusi query
        return $this->execute($query);
    }

   // Mengedit data pasien
   function editPasien($data)
   {
       // Data tabel pasien
       $id = $data['id'];
       $nik = $data['nik'];
       $nama = $data['nama'];
       $tempat = $data['tempat'];
       $tl = $data['tl'];
       $gender = $data['gender'];
       $email = $data['email'];
       $telp = $data['telp'];

       // Operasi edit
       $query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id=$id";

       // Mengeksekusi query
       return $this->execute($query);
   }

   // Menghapus data pasien
   function deletePasien($id)
   {
       // Operasi delete
       $query = "DELETE FROM pasien WHERE id=$id";

       // Mengeksekusi query
       return $this->execute($query);
   }
	
}
