<?

$con = mysql_connect("localhost","eventesi_admin","Eventes1@");
 
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("eventesi_webcomments", $con);

$article_id = $_GET['id'];

if( ! is_numeric($article_id) )
  die('invalid article id');

$query = "SELECT * FROM `comments` WHERE `articleid` = 1";
//$article_id LIMIT 0 , 30

$comments = mysql_query($query);

echo "<h1>User Comments</h1>";

// Please remember that  mysql_fetch_array has been deprecated in earlier
// versions of PHP.  As of PHP 7.0, it has been replaced with mysqli_fetch_array.  

while($row = mysql-fetch-array($comments, MYSQL_ASSOC))
{
  $name = $row['name'];
  $email = $row['email'];
  $website = $row['website'];
  $comment = $row['comment'];
  $timestamp = $row['timestamp'];
  
  $name = htmlspecialchars($row['name'],ENT_QUOTES);
  $email = htmlspecialchars($row['email'],ENT_QUOTES);
  $website = htmlspecialchars($row['website'],ENT_QUOTES);
  $comment = htmlspecialchars($row['comment'],ENT_QUOTES);
  
  echo "  <div style='margin:30px 0px;'>
      Name: $name<br />
      Email: $email<br />
      Website: $website<br />
      Comment: $comment<br />
      Timestamp: $timestamp
    </div>
  ";
}

mysql_close($con);

?>