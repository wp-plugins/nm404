<?php

/*
Plugin Name:    nm404
Plugin URI:     http://www.affiliate-solutions.biz/
Description:    redirect 404 error to the closest matches found in the sitemap.xml
Version:        1.0.0
Author:         Affiliate solutions SLU
Author URI:     http://www.affiliate-solutions.biz/
*/


class Redirector404{

    private $_sitemap ="/sitemap.xml";

    private $prot="http://";
    private $distance=-1;
    private $redirect=null;
    private $url;

    function __construct() {
        add_action('template_redirect', array ($this, 'check'));
    }

    function check(){
        if(is_404()){
            $this->url=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
            $this->setProt();
            $this->redirect=$this->prot.$_SERVER['SERVER_NAME'];
            $this->sitemap=$this->prot.$_SERVER['SERVER_NAME'].$this->_sitemap;
            $this->parseSitemap();
            $this->redirect();
       }
    }


    private function setProt(){
        if (strpos($_SERVER["SCRIPT_URI"],"https")!==false){
            $this->prot ="https://";
        } else {
            $this->prot ="http://";
        }
    }

    private function parseSitemap(){
        $dom = new DOMDocument;
        $dom->load($this->sitemap);
        $sitemaps=$dom->getElementsByTagName('sitemap')->length;
        $urls=$dom->getElementsByTagName('url')->length;
        if($sitemaps >0){
            $submaps=$this->getSubmaps($dom);
            foreach($submaps as $submap){

                $this->getShortest($submap);
            }
        }
        else{
            $this->getShortest($this->sitemap);
        }
    }

    private function getSubmaps($dom){
        foreach($dom->getElementsByTagName('loc') as $sitemap){
            $asitemaps[]=(string)$sitemap->nodeValue;
        }
        return $asitemaps;

    }

    private function getShortest($sitemap){
        $dom = new DOMDocument;
        $dom->load((string)$sitemap);
        foreach($dom->getElementsByTagName('url') as $child){
            foreach($child->getElementsByTagName('loc') as $url){
                $loc=(string)$url->nodeValue;
                $lev = levenshtein($this->url, $loc);

                if ($lev <= $this->distance || $this->distance < 0) {
                    $this->redirect  = $loc;
                    $this->distance = $lev;
                }
            }
        }
    }

    public function redirect(){

        wp_redirect($this->redirect,301);
        exit;
    }
}

$Redirector404 = new Redirector404();

?>
