<?php

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect(){
        try{
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $pdo = new PDO($connection, $this->user, $this->password, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }

    //Crear un backup de la base de datos utilizando mysqldump
    function exportDB(){
        $pdo = $this->connect();
        $tables = array();
        $result = $pdo->query("SHOW TABLES");
        while($row = $result->fetch(PDO::FETCH_NUM)){
            $tables[] = $row[0];
        }
        $return = "";
        foreach($tables as $table){
            $result = $pdo->query("SELECT * FROM $table");
            $num_fields = $result->columnCount();
            $return .= "DROP TABLE $table;";

            $row2 = $pdo->query("SHOW CREATE TABLE $table")->fetch(PDO::FETCH_NUM);
            $return .= "\n\n" . $row2[1] . ";\n\n";

            for($i = 0; $i < $num_fields; $i++){
                while($row = $result->fetch(PDO::FETCH_NUM)){
                    $return .= "INSERT INTO $table VALUES(";
                    for($j = 0; $j < $num_fields; $j++){
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = str_replace("\n", "\\n", $row[$j]);
                        if(isset($row[$j])){
                            $return .= '"' . $row[$j] . '"';
                        }else{
                            $return .= '""';
                        }
                        if($j < ($num_fields - 1)){
                            $return .= ',';
                        }
                    }
                    $return .= ");\n";
                }
            }
            $return .= "\n\n";
        }

        $handle = fopen('dbbackup/db-backup-' . date("Y-m-d-H-i-s") . '.sql', 'w+');
        fwrite($handle, $return);
        fclose($handle);

        // Download the SQL backup file to the browser
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        ob_clean();
        flush();
        readfile($backup_file_name);
        exec('rm ' . $backup_file_name); 
    }

    //Crear backup de la base de datos y que se guarde el archivo en la carpeta db/backup
    function export(){
        $pdo = $this->connect();
        $tables = array();
        $result = $pdo->query("SHOW TABLES");
        while($row = $result->fetch(PDO::FETCH_NUM)){
            $tables[] = $row[0];
        }
        $return = "";
        foreach($tables as $table){
            $result = $pdo->query("SELECT * FROM $table");
            $num_fields = $result->columnCount();
            $return .= "DROP TABLE $table;";

            $row2 = $pdo->query("SHOW CREATE TABLE $table")->fetch(PDO::FETCH_NUM);
            $return .= "\n\n" . $row2[1] . ";\n\n";

            for($i = 0; $i < $num_fields; $i++){
                while($row = $result->fetch(PDO::FETCH_NUM)){
                    $return .= "INSERT INTO $table VALUES(";
                    for($j = 0; $j < $num_fields; $j++){
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = str_replace("\n", "\\n", $row[$j]);
                        if(isset($row[$j])){
                            $return .= '"' . $row[$j] . '"';
                        }else{
                            $return .= '""';
                        }
                        if($j < ($num_fields - 1)){
                            $return .= ',';
                        }
                    }
                    $return .= ");\n";
                }
            }
            $return .= "\n\n\n";
        }
        $backup_file_name = '../dbbackup' . $this->db . '-backup-' . date('d-m-Y_H-m-s') . '.sql';
        $handle = fopen($backup_file_name, 'w+');
        fwrite($handle, $return);
        fclose($handle);

        // Download the SQL backup file to the browser
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        ob_clean();
        flush();
        readfile($backup_file_name);
        exec('rm ' . $backup_file_name); 
    }

    //Importar base de datos desde un archivo sql
    function import($file){
        $pdo = $this->connect();
        $templine = '';
        $lines = file($file);
        foreach($lines as $line){
            if(substr($line, 0, 2) == '--' || $line == ''){
                continue;
            }
            $templine .= $line;
            if(substr(trim($line), -1, 1) == ';'){
                $pdo->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $pdo->error . '<br /><br />');
                $templine = '';
            }
        }
    }
    

}

?>