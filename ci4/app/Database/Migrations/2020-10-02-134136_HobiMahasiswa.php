<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HobiMahasiswa extends Migration
{
	private $table = "hobi_mahasiswa";

	public function up()
	{
		$this->forge->addField([
			'kode_hobi_mahasiswa'          => [
					'type'           => 'INT',
					'constraint'     => '11',
					'unsigned'		 => TRUE,
					'auto_increment' => TRUE,
			],
			'kode_hobi'       => [
					'type'           => 'INT',
					'constraint'     => '11',
					'unsigned'		 => TRUE,
			],
			'nim'       	  => [
					'type'           => 'VARCHAR',
					'constraint'     => '9',
			],
		]);
		$this->forge->addKey('kode_hobi_mahasiswa', true);
		$this->forge->addForeignKey('kode_hobi', 'hobi', 'kode_hobi', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('nim', 'mahasiswa', 'nim', 'CASCADE', 'CASCADE');
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
