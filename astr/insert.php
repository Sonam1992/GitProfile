<?php
    // Functions

    // Function to Upload the File to the MySql DataBase
    function mysql_insert_array($table, $data,$conn,$csv_columns_with_quotes,$SBU,$project,$tower,$upload_time, $exclude = array()) {

        $fields = $values = array();

        if( !is_array($exclude) ) $exclude = array($exclude);
        array_push($values,"'$upload_time'");
        array_push($values,"'$project'");
        array_push($values,"'$tower'");
        array_push($values,"'$SBU'");
        
        foreach( array_keys($data) as $key ) {
            if( !in_array($key, $exclude) ) {
                $fields[] = "`$key`";
                $values[] = "'" . mysqli_real_escape_string($conn,$data[$key]) . "'";
            }
        }
        
        $col = implode(",", $csv_columns_with_quotes);
        $values = implode(",", $values);

        
        // Uploading data based on the Column name
        if( mysqli_query($conn,"INSERT INTO `$table` ($col) VALUES ($values)") ) {
        } 
        else {
            // return array( "mysql_error" => mysql_error() );
            header("location: ../upload.php?error=Failed");
            exit();
        }

    }

    if (isset($_POST["submit_button"])) {
        // Main Connection
        $conn = mysqli_connect('uploaddatabase.cmi7k84twi7t.us-east-1.rds.amazonaws.com','nikhil','TFjune2022','data_loads') or die($link);
        $table_name      = $_POST['table_name'];
        $project    = $_POST['project'];
        $SBU        = $_POST['SBU'];
        $tower      = $_POST['tower'];

        /* Adding the data for Upload Time*/
        $uploadDate = $_POST['uploadDate'];
        if (empty($uploadDate)) {
            $upload_time = date('Y-m-d h:i:s');
        } elseif ($uploadDate > date('Y-m-d')) {
            header("location:index.php?error=dateissue#Uploaddata");
            exit();
        }else {
            $uploadTime = date(' h:i:s');
            $upload_time = $uploadDate.$uploadTime;
        }
        
        // Collecting the data table name based on the selection from user
        $queryTable =  mysqli_query($conn,"SELECT DISTINCT data_table FROM PHP_TABLE_LIST WHERE display_name = '$table_name';");
        $table_fetch= mysqli_fetch_array($queryTable);
        $table = $table_fetch['data_table'];   

        $sql = "SHOW COLUMNS FROM $table";
        // Collecting the Coloumn Name 
        $result = mysqli_query($conn,$sql);
        $stack = [];
        while($row = mysqli_fetch_array($result))
            {
                if ($row['Field']!=='id_' && $row['Field']!=='time_of_upload') {
                    $value_edited = "`".trim($row['Field'])."`";
                    array_push($stack,$value_edited);
                }            
            }
        $file = $_FILES['Upload_File']['tmp_name'];

        // Opening the file and creating a file handler
        $handler = fopen($file,"r");
        $csv = array_map("str_getcsv", file($file,FILE_SKIP_EMPTY_LINES));
        $csv_columns = array_shift($csv);
        
        $csv_columns_with_quotes = [];
        array_push($csv_columns_with_quotes,"`upload_time`");
        array_push($csv_columns_with_quotes,"`project_id`");
        array_push($csv_columns_with_quotes,"`tower`");
        array_push($csv_columns_with_quotes,"`sbu_id`");
        foreach ($csv_columns as $old => $new) {
                    $value_head = "`".trim($new)."`";
                    if ($value_head !== "``") {
                        array_push($csv_columns_with_quotes,$value_head);
                    }
                    
        }
        
        // print_r($csv_columns_with_quotes);
        
        $j=0;
        if (array_intersect($csv_columns_with_quotes, $stack) == $csv_columns_with_quotes) {
            while (($line = fgetcsv($handler)) !== false) {
                //$line is an array of the csv elements
                if ($j!=0)
                {
                    mysql_insert_array($table, $line, $conn,$csv_columns_with_quotes,$SBU,$project,$tower,$upload_time);
                    $j++;
                }        
                else 
                {
                    $j++;
                }      
            }
            fclose($handler);
            header("location: index.php?error=UploadSuccessful#Uploaddata");
            exit();
        }
        else{
            // echo "This is not matching at all";
            header("location:index.php?error=Failedtablemissmatch#Uploaddata");
            // echo "CSV";
            // print_r($csv_columns_with_quotes);
            // echo "<br> <br>";
            // echo "Table";
            // print_r($stack);
            // echo "<br> <br>";
            // echo "Intersection";
            // print_r(array_intersect($csv_columns_with_quotes, $stack));
            exit();
        }
    }
    
    // This is download function and dosent need to change
    if (isset($_POST["download_button"])) {
        $table_name = $_POST['table_name'];
        $conn = mysqli_connect('uploaddatabase.cmi7k84twi7t.us-east-1.rds.amazonaws.com','nikhil','TFjune2022','data_loads') or die($link);
        // Collecting the data table name based on the selection from user
        $queryTable =  mysqli_query($conn,"SELECT DISTINCT data_table FROM PHP_TABLE_LIST WHERE display_name = '$table_name';");
        $table_fetch= mysqli_fetch_array($queryTable);
        $table = $table_fetch['data_table']; 
        $sql = "SHOW COLUMNS FROM $table";
        // Collecting the Coloumn Name 
        $result = mysqli_query($conn,$sql);
        // Getting the column Count for the data base table
        $stack = [];
        while($row = mysqli_fetch_array($result))
        {
            if ($row['Field']!=='id_' && $row['Field']!=='project_id' && $row['Field']!=='tower' && $row['Field']!=='sbu_id' && $row['Field']!=='upload_time') {
                array_push($stack, $row['Field']);
            }            
        }
        // print_r(gettype($stack));
        header("Content-Type: text/csv;charset=utf8");
        header("Content-Disposition:attachment; filename = $table.csv");
        $output = fopen("php://output","w");
        fputcsv($output,$stack);
        fclose($output);
    }
    