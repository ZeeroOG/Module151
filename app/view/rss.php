<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>Nexflit</title>
		<description>Articles Nexflit</description>
		<language>fr-ch</language>
		<?php foreach($films->getFilmList() as $film) { ?>
		<item>
			<title><?php echo $film['titre']; ?></title>
			<description><?php echo $film['desc']; ?></description>
			<pubDate><?php echo date('D, d M Y H:i:s', strtotime($film['sortie'])); ?> +0200</pubDate>
		</item>
		<?php } ?>
	</channel>
</rss>
