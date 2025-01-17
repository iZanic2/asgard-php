<?php
	if (isset($action) && $action != '') {
		$query  = "SELECT * FROM news";
		$query .= " WHERE id=" . $_GET['action'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
			print '
			<div class="Novosti">
				<a href="postimages/' . $row['picture'] . '">
					<img src="postimages/' . $row['picture'] . '" style="float: left; padding: 0.5em; margin: 0 1em 0.5em 0.5em;"width="65" alt=""' . $row['title'] . '" title="' . $row['title'] . '">
				</a>
				<h2><a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">' . $row['title'] . '</a></h2>
				<p>' . $row['description'] . '</p>
				<p><time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time></p>
				<hr>
			</div>';
	}
	else {
		print '<h1>Posts.</h1>';
		$query  = "SELECT * FROM news";
		$query .= " WHERE archive='N'";
		$query .= " ORDER BY date DESC";
		$result = @mysqli_query($MySQL, $query);
		while($row = @mysqli_fetch_array($result)) {
			print '
			<div class="Novosti">
				<a href="postimages/' . $row['picture'] . '">
					<img src="postimages/' . $row['picture'] . '" style="float: left; padding: 0.5em; margin: 0 1em 0.5em 0.5em;"width="65" alt=""' . $row['title'] . '" title="' . $row['title'] . '">
				</a>
				<h2><a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">' . $row['title'] . '</a></h2>';
				if(strlen($row['description']) > 300) {
					echo '<p>' . substr(strip_tags($row['description']), 0, 300) . '... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '" class="more-link">Više...</a></p>';
				} else {
					echo '<p>' . strip_tags($row['description']) . '</p>';
				}
				print '
				<p><time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time></p>
				<hr>
			</div>';
		}
	}
?>