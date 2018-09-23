<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? include("managecomments.php");?>
<form method="post">
NAME: <input type="text" name="name" id="name"/><br />
Email: <input type="text" name="email" id="email"/> <br/>
Website: <input type="text" name="website" id="website" /><br/>
Comment:<br /><textarea name="comment" id="comment"></textarea><br/>
<input type="hidden" name="articleid" value="<? echo $_GET["id"];?>" />
<input type="submit" value="Submit" />
</form>
</body>
</html>
