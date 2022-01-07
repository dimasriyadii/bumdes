<?php 
	$q = mysql_query("SELECT count(namausaha) as jml FROM kerjasama WHERE status='tunggukonfirmasi' ", $link);
	if(mysql_num_rows($q) > 0) {
		$row = mysql_fetch_assoc($q);
                echo $row['jml'];
	}
?>