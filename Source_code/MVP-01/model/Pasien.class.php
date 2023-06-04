<?php

/******************************************
Asisten Pemrogaman 11 
 ******************************************/

class Pasien
{
	// Atribut
	var $id = ''; //id Pasien
	var $nik = '';
	var $nama = '';
	var $tempat = '';
	var $tl = '';
	var $gender = '';
	var $email = '';
	var $telp = '';

	// Constructor
	function __construct($id = '', $nik = '', $nama = '', $tempat = '', $tl = '', $gender = '', $email = '', $telp = '')
	{
		$this->id = $id;
		$this->nik = $nik;
		$this->nama = $nama;
		$this->tempat = $tempat;
		$this->tl = $tl;
		$this->gender = $gender;
		$this->email = $email;
		$this->telp = $telp;
	}

	// Setter 

	// Id
	function setId($id)
	{
		$this->id = $id;
	}

	// NIK
	function setNik($nik)
	{
		$this->nik = $nik;
	}

	// Nama
	function setNama($nama)
	{
		$this->nama = $nama;
	}

	// Tempat
	function setTempat($tempat)
	{
		$this->tempat = $tempat;
	}

	// Tempat Lahir
	function setTl($tl)
	{
		$this->tl = $tl;
	}

	// Gender
	function setGender($gender)
	{
		$this->gender = $gender;
	}

	// Email
	function setEmail($email)
	{
		$this->email = $email;
	}

	// Telepon
	function setTelp($telp)
	{
		$this->telp = $telp;
	}

	// Getter

	// Id
	function getId()
	{
		return $this->id;
	}

	// NIK
	function getNik()
	{
		return $this->nik;
	}

	// Nama
	function getNama()
	{
		return $this->nama;
	}

	// Tempat
	function getTempat()
	{
		return $this->tempat;
	}

	// Tempat Lahir
	function getTl()
	{
		return $this->tl;
	}

	// Gender
	function getGender()
	{
		return $this->gender;
	}

	// Email
	function getEmail()
	{
		return $this->email;
	}

	// Telepon
	function getTelp()
	{
		return $this->telp;
	}
}
