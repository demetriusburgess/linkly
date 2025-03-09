<?php 

class DatabaseHandler {
    private $dbh;

    private $host;

    private $database;

    private $username;

	private $password;

	private $tables = [
		'users',
		'short_links',
		'short_keys',
		'settings',
		'events',
		'analytics'
	];

    function __construct(array $config = []) {
        $this->host = $config['host'];
        $this->database = $config['database'];
        $this->username = $config['username'];
		$this->password = $config['password'];

        // $this->connect({$config});
        // $this->create_user_table();
        // $this->create_link_table();
        // $this->create_key_table();
        // $this->remove_link_table();
    }

	private function create_table(string $table, array $columns = []) {
		$cols = implode(',',$columns);

		$query = "CREATE TABLE IF NOT EXISTS {$table} (
            {$cols}
        );";

        return $this->dbh->query($query);
    }
	

	private function remove_table(string $table) {
        $query = "DROP TABLE IF EXISTS {$table};";

        return $this->dbh->query($query);
    }

	public function create_tables() {
		foreach ($this->tables as $table) {
			switch ($table) {
				case 'users':
					$this->create_table($table, [
						'user_id VARCHAR(7) PRIMARY KEY',
						'email VARCHAR(255)',
						'password VARCHAR(255)',
						'user_metadata VARCHAR(255)',
						'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
					]);
					break;
				case 'short_links':
					$this->create_table($table, [
						'short_id VARCHAR(7) PRIMARY KEY',
						'short_url VARCHAR(255)',
						'destination_url VARCHAR(255)',
						'title VARCHAR(255)',
						'url_metadata VARCHAR(255)',
						'icon VARCHAR(255)',
						'creator VARCHAR(255)',
						'tags VARCHAR(255)',
						'analytics VARCHAR(255)',
						'qr_code VARCHAR(255)',
						'archived BOOLEAN',
						'comments VARCHAR(1000)',
						'utm_referal VARCHAR(255)',
						'utm_source VARCHAR(255)',
						'utm_medium VARCHAR(255)',
						'utm_campaign VARCHAR(255)',
						'utm_term VARCHAR(255)',
						'utm_content VARCHAR(255)',
						'user_id VARCHAR(7)',
						'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
						'FOREIGN KEY (user_id) REFERENCES users(user_id)'
					]);
					break;
				case 'short_keys':
					$this->create_table($table, [
						'link_key VARCHAR(255) PRIMARY KEY',
						'link_hash VARCHAR(255)'
					]);
					break;
				case 'settings':
					$this->create_table($table, [
						'settings_id VARCHAR(7) PRIMARY KEY',
					]);
					break;
				case 'events':
					$this->create_table($table, [
						'envet_id VARCHAR(7) PRIMARY KEY',
					]);
					break;
				case 'analytics':
					$this->create_table($table, [
						'analtyic_id VARCHAR(7) PRIMARY KEY',
					]);
					break; 
				default:
					break;
			}
		}
		
	}	

    public function connect() {
        $this->dbh = new mysqli($this->host, $this->username, $this->password);

		$this->select($this->database);

        if ($this->dbh->connect_error) {
            die("connection faild: " . $this->dbh->connection_error);
        }
    }

	public function select(String $database) {
		if ($this->dbh->select_db($database)) {
			$this->database = $database;
		}
	}

    // public function get_user() {
    // }
    
    // public function add_user() {
        
    // }

    public function get_key($id) {
        $query = "SELECT * FROM short_keys WHERE link_hash = (?);";

        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param('s',$id );
        $stmt->execute();
        return $stmt->get_result();
    }

    public function get_keys() {
        return $this->basic_insert("*", "short_keys");
        // $query = "SELECT * FROM short_keys;";

        // $stmt = $this->dbh->prepare($query);
        // $stmt->execute();
        // return $stmt->get_result(); 
    }
    

    public function last_key() {
        $query = "SELECT * FROM short_keys ORDER BY link_key DESC LIMIT 1;";

        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->get_result(); 
    }
    
    public function get_link($id) {
        $query = "SELECT * FROM short_links WHERE short_id = (?);";

        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param('s',$id );
        $stmt->execute();
        return $stmt->get_result();
    }

    public function get_links() {
        return $this->select_from_table("short_links", "*");
        // $query = "SELECT * FROM short_links;";

        // $stmt = $this->dbh->prepare($query);
        // $stmt->execute();
        // return $stmt->get_result(); 
    }
    
    private function sql_instert_val_str(string $table,array $params) {
        return "INSERT INTO {$table} (" . implode(',', sanitize(...$params)) . ") VALUES (" . implode(",",array_map(fn($v) => $v = "?", $params)) . ")";
    }

    public function add_key(array $input) {
            $template = [
                'link_key',
                'link_hash'];
        
        $this->basic_insert("short_keys", $template, $input);
    }

    public function add_user(array $input) {
        $template = [
            'user_id',
            'email',
            'password',
            'user_metadata'];
            // 'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'];
    
        $this->basic_insert("users", $template, $input);
    }

    public function add_link(array $input) {
            $template = [
                'short_id',
                'short_url',
                'destination_url',
                'title',
                'url_metadata',
                'icon',
                'creator',
                'tags',
                'analytics',
                'qr_code',
                'archived',
                'comments',
                'utm_referal',
                'utm_source',
                'utm_medium',
                'utm_campaign',
                'utm_term',
                'utm_content',
                'user_id'];

        $this->basic_insert('short_links', $template, $input);
    }

    private function select_from_table(string $table, string ...$columns) {
        $query = "SELECT " . implode(",", [...$columns]) . " FROM {$table};";

        $stmt = $this->dbh->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    private function basic_insert(string $table, array $template, array $input) {
        // Only user input that is predefined in $template
        $values = array_map(
            fn($key) => array_key_exists($key, $input) ? $input[$key] : NULL, 
            $template
        );

        // Create "sss" string template
        $s = implode("", array_map(fn($v) => $v = 's', $template));

        // Build sql template string
        $query = $this->sql_instert_val_str($table, $template);

        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param($s,...$values);
        $result = $stmt->execute();

        return $result;
    }

    public function remove_link($id) {
        $query = "DELETE FROM short_links WHERE short_id = (?);";

        $stmt = $this->dbh->prepare($query);
        $stmt->bind_param('s',$id );
        $stmt->execute();
        return $stmt->get_result();
    }

	/*
    private function create_user_table() {
        $query = "CREATE TABLE IF NOT EXISTS users (
            user_id VARCHAR(7) PRIMARY KEY,
            email VARCHAR(255),
            password VARCHAR(255),
            user_metadata VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );";

        return $this->dbh->query($query);
    }

    private function create_link_table() {
        $query = "CREATE TABLE IF NOT EXISTS short_links (
            short_id VARCHAR(7) PRIMARY KEY,
            long_url VARCHAR(255),
            short_url VARCHAR(255),
            url_metadata VARCHAR(255),
            user_id VARCHAR(7),
            FOREIGN KEY (user_id) REFERENCES users(user_id)
        );";

        return $this->dbh->query($query);
    }

    private function create_key_table() {
        $query = "CREATE TABLE IF NOT EXISTS short_keys (
            link_key VARCHAR(255) PRIMARY KEY,
            link_hash VARCHAR(255)
        );";

        return $this->dbh->query($query);
    }

    private function remove_link_table() {
        $query = "DROP TABLE IF EXISTS short_links;";

        return $this->dbh->query($query);
    }

    private function remove_user_table() {
        $query = "DROP TABLE IF EXISTS users;";

        return $this->dbh->query($query);
    }
	*/
}




?>