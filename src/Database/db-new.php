<?php

class DatabaseHandler {
    private $dbh;

    private $host;

    private $database;

    private $username;

	private $password;

    function __construct(array $config = []) {
        $this->host = $config['host'];
        $this->database = $config['database'];
        $this->username = $config['username'];
		$this->password = $config['password'];
    }

    public function connect() {
        $this->dbh = new mysqli($this->host, $this->username, $this->password);

		$this->db($this->database);

        if ($this->dbh->connect_error) {
            die("connection faild: " . $this->dbh->connection_error);
        }
    }

	public function db(String $database) {
		if ($this->dbh->select_db($database)) {
			$this->database = $database;
		}
	}

    public function create_database(string $name, bool $unique = true) {
        if ($unique) {
            $query = "CREATE DATABASE IF NOT EXISTS {$name};";
        } else {
            $query = "CREATE DATABASE {$name};";
        }
        
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    // public function create_table(string $table, array $columns = [], boolean $unique) {
	public function create_table(string $table, array $columns = [], bool $unique = true) {
        $clean = sanitize(...$columns);
		$cols = implode(',',$clean);

        if ($unique) {
            $query = "CREATE TABLE IF NOT EXISTS {$table} ({$cols});";
        } else {
            $query = "CREATE TABLE {$table} ({$cols});";
        }

        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
	
	public function create_tables(array $tables) {
		foreach ($tables as $table) {
            $this->create_table($table['name'], $table['values']);
		}
	}

    public function remove_table(string $table) {
        return $this->drop("table", $table);
    }

    public function select(string $table, array $columns, array $where = [], int $limit = NULL) {
        $limit_str = $limit ? "LIMIT " . $limit : ""; 

        if (sizeof($where)>0) {
            $key = array_keys($where)[0];
            $val = $where[$key];
        }

        if ($key && $val) {
            $query =  "SELECT " . implode(",", [...$columns]) . " FROM {$table} WHERE {$key}='{$val}'{$limit_str};";
        } else {
            $query =  "SELECT " . implode(",", [...$columns]) . " FROM {$table}{$limit_str};";
        };
        
        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    private function insert_str(string $table,array $params) {
        // @EXAMPLE: "INSERT INTO pokemon (num, type, name, zones) VALUES (?,?,?,?)"
        return "INSERT INTO {$table} (" . implode(',', sanitize(...$params)) . ") VALUES (" . implode(",",array_map(fn($v) => $v = "?", $params)) . ")";
    }

    public function insert(string $table, array $row) {
        $columns = array_keys($row);
        $values = sanitize(...array_values($row));

        // Create "sss" string template
        $s = implode("", array_map(fn($v) => $v = 's', $columns));

        // Build sql template string
        $query = $this->insert_str($table, $columns);

        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param($s,...$values);
        $result = $stmt->execute();

        return $result;
    }

    public function drop(string $type, string $subject, string $table = null) {
        switch ($type) {
            case "table":
                $query = "DROP TABLE {$subject};"; 
                break;
            case "column":
                $query = "ALTER TABLE {$table}";
                $query .= "DROP COLUMN {$subject};";
                break;
            default:
                $query = "DROP TABLE {$subject};"; 
                break;
        }

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();

        return $result;
    }

    public function update(string $table, array $columns, array $where) {
        $table_name = implode("", sanitize($table));
        global $c;
        
        $c = $columns;


        $updates = array_map(function($k) {
            global $c;
            $key = sanitize($k)[0];
            $value = $c[$key];

            return "{$key}='{$value}'";
        }, array_keys($c));

        $updates = implode(",", $updates);

        $key = array_keys($where)[0];
        $val = $where[$key];
        
        $query = "UPDATE {$table_name} SET {$updates} WHERE {$key}='{$val}';";
        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();

        return $result;
    }

    public function delete(string $table,  array $where = NULL) {
        $table_name = sanitize($table)[0];
        
        if ($where) {
            $key = array_keys($where)[0];
            $val = $where[$key];
        }

        if ($key && $val) {
            $query = "DELETE FROM {$table_name} WHERE {$key}='{$val}';";
        } else {
            $query = "DELETE FROM {$table_name};";
        }

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute();
    }
}

?>