<?php

$settings = maybe_unserialize(get_option('NM404settings'));
if(empty($settings["sitemap_url"])){
    $settings["sitemap_url"]="/sitemap.xml";
}
if(!empty($_POST["sitemap_url"])){
    $url=parse_url($_POST["sitemap_url"]);
    $options = array(
        'http' => array(
            'method' => 'GET',
            'timeout' => '5'
        )
    );
    $dom = new DOMDocument;
    $context = stream_context_create($options);
    libxml_set_streams_context($context);
    if($url["host"]=="") {
        if(!$dom->load("http://" . $_SERVER['SERVER_NAME'] . $_POST["sitemap_url"])) {
            $error = "Warning! Could not access sitemap:" . htmlentities($_POST["sitemap_url"]);
        }
    }
    else {
        if (!$dom->load($_POST["sitemap_url"])){
            $error = "Warning! Could not access sitemap:" . htmlentities($_POST["sitemap_url"]);
        }
    }
    $settings["sitemap_url"]=htmlentities($_POST["sitemap_url"]);
    $settings["limit_parsed_entries"]=(int)$_POST["limit_parsed_entries"];
    update_option('NM404settings', serialize($settings));
}


require_once("settings_template.php");