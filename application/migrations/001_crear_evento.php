<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Migration_crear_evento extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_evento'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_usuario'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nombre_evento'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'unidad_organizadora'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '200',
			],
			'fecha_inicio'       => [
				'type'           => 'DATE',
			],
			'fecha_final'       => [
				'type'           => 'DATE',
			],
			'mensaje_emision' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'imagen_fondo' => [
				'type'           => 'LONGBLOB',
				'null'           => true,
			],
			'usuario_creacion' => [
				'type'           => 'VARCHAR',
				'constraint'     => '200',
			],
			'fecha_creacion' => [
				'type'           => 'DATE',
			],
			'usuario_modificacion' => [
				'type'           => 'VARCHAR',
				'constraint'     => '200',
			],
			'fecha_modificacion' => [
				'type'           => 'DATE',
			],
			'estado' => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
		]);
		$this->forge->addKey('id_evento', true);
		$this->forge->createTable('evento');
	}

	public function down()
	{
		$this->forge->dropTable('evento');
	}
}
