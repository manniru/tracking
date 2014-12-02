<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('database.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      CREATE TABLE TRACKS
      (ID INT PRIMARY KEY ,MOBILENO TEXT, LAT TEXT, LON TEXT);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
     /// echo $db->lastErrorMsg();
   } else {
     /// echo "Table created successfully\n";
   }


if(isset($_REQUEST['mobileno'])) {
	// date("Y-m-d h:i:sa")
	$mobileno = $_REQUEST['mobileno'];
	$lat = $_REQUEST['lat'];
	$lon = $_REQUEST['lon'];
	$ret = $db->exec("INSERT INTO TRACKS (MOBILENO, LAT, LON) VALUES('$mobileno', '$lat', '$lon');");
	if($ret) echo "Inserted!<br>";
}


   //$db->close();
?>

<?php
/**
  
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (1, 'Paul', 32, 'California', 20000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (2, 'Allen', 25, 'Texas', 15000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (3, 'Teddy', 23, 'Norway', 20000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (4, 'Mark', 25, 'Rich-Mond ', 65000.00 );
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
*/
?>

<?php
/**
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      SELECT * from COMPANY;
EOF;
*/
   $ret = $db->query("SELECT * FROM TRACKS");
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	echo $row['MOBILENO']."==".$row['LAT']."==".$row['LON']."<br>";
      //echo "ID = ". $row['ID'] . "\n";
     // echo "NAME = ". $row['NAME'] ."\n";
      //echo "ADDRESS = ". $row['ADDRESS'] ."\n";
     // echo "SALARY =  ".$row['SALARY'] ."\n\n";
   }
  // echo "Operation done successfully\n";
   $db->close();

?>
