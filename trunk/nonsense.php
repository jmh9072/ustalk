<?

//connect to db
$db = @mysql_connect("MYSQL_SERVER","USERNAME","PASSWORD");

if(mysql_errno())
{
	die("Error connecting to database, contact jmh9072 immediately");
}

mysql_select_db("ustalk");
?>
