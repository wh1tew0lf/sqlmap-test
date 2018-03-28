<?php
class db {
	const FILENAME = './tmp/simple.db';
	private $db = null;
	
	public function __construct() {
		$this->db = new SQLite3(self::FILENAME);
		$this->init();
	}
	
	private function init() {
		$this->db->exec(
<<<EOL
		CREATE TABLE IF NOT EXISTS `records` (
			`id` integer primary key autoincrement,
			`title` string,
			`descr` text
		);
EOL
		);
	}
	
	public function getAll() {
		$result = $this->db->query('select * from `records`');
		$data = [];
		while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
			$data[] = $res;
		}
		$result->finalize();
		return $data;
	}
	
	public function getById($id) {
		$result = $this->db->query("select * from `records` where id={$id}");
		$res = $result->fetchArray(SQLITE3_ASSOC);
		$result->finalize();
		return $res;
	}
	
	public function createRow($title, $description) {
		$result = $this->db->exec("INSERT INTO `records` (`id`, `title`, `descr`) VALUES (null, \"{$title}\", \"{$description}\")");
		return $result ? $this->db->lastInsertRowID() : null;
	}
	
	public function updateRow($id, $title, $description) {
		$result = $this->db->exec("UPDATE `records` SET `title`=\"{$title}\", `descr`=\"{$description}\" WHERE `id`={$id}");
		return $result;
	}
	
	public function deleteRow($id) {
		$result = $this->db->exec("DELETE FROM `records` WHERE `id`={$id}");
		return $result;
	}
	
	public function __destruct() {
		$this->db->close();
	}

}
