<div class="nm404-wrapper">
    <?php if ($error){ ?>
        <h2 style="color:#990000"><?php echo $error; ?></h2>
    <?php }?>
    <h1>NM404 Settings</h1>
    <form method="post" action="">
        <label for="sitemap_url">Sitemap Url (default:/sitemap.xml)</label>
        <br />
        <input name="sitemap_url"
               id="sitemap_url"
               value="<?php echo $settings["sitemap_url"]; ?>">
        <br />
        <br />
        <label for="limit_parsed_entries">Limit parsed entries for each Sitemap. <br />
            For large blogs parsing dynamically generated XML-Sitemaps can take a lot of time.
        Limiting the entries parsed increases speed but lowers quality of result.<br />
        If your sitemap is split into more then one file, the limit is used for each single file.</label>
        <br />
        <input name="limit_parsed_entries"
               id="limit_parsed_entries"
               value="<?php echo (int)$settings["limit_parsed_entries"]; ?>"/>
        <br />
        <br />
        <input type="submit" value="save" />
    </form>
</div>