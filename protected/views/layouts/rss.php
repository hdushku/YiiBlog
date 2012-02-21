<?php echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<rss version="2.0">    
    <channel>
        <title><?php echo $this->conf_array['title']; ?></title>
        <link><?php echo $this->conf_array['baseUrl']; ?></link>
        <description><?php echo $this->conf_array['desc']; ?></description>
        <copyright><?php echo $this->conf_array['copy']; ?></copyright>
        <language>ru</language>
        <?php echo $content; ?>
    </channel>
</rss>