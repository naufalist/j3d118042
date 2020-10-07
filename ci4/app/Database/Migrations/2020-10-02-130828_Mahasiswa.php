<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	private $table = "mahasiswa";

	public function up()
	{
		$this->db->enableForeignKeyChecks();
		$this->forge->addField([
			'nim'          => [
					'type'           => 'VARCHAR',
					'constraint'     => '9',
			],
			'nama'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'jenis_kelamin' => [
					'type'           => 'ENUM',
					'constraint'     => ['Laki-laki', 'Perempuan'],
					'default'		 => 'Laki-laki',
			],
			'kode_agama' => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'		 => true,
			],
			'alamat' => [
					'type'           => 'TEXT',
			],
			'foto' => [
					'type'           => 'TEXT',
			],
			'tempat_lahir' => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'tanggal_lahir' => [
					'type'           => 'DATE',
			],
		]);
		$this->forge->addKey('nim', true);
		$this->forge->addForeignKey('kode_agama', 'agama', 'kode_agama', 'CASCADE', 'CASCADE');
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
