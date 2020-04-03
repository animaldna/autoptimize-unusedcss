<?php

/**
 * Class UnusedCSS
 */
class UnusedCSS_Store {

    use UnusedCSS_Utils;

    public $base = 'cache/uucss';
    public $provider;

    public $url;
    public $args;
    public $purged_files = [];

    /**
     * @var WP_Filesystem_Direct
     */
    public $file_system;


    /**
     * UnusedCSS_Store constructor.
     * @param $provider
     * @param $url
     * @param $args
     */
    public function __construct($provider, $url, $args = [])
    {

        $this->provider = $provider;
        $this->url = $url;
        $this->args = $args;

        // load wp filesystem related files;
        if (!class_exists('WP_Filesystem_Base')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
        }

        global $wp_filesystem;
        $this->file_system = $wp_filesystem;

        $this->purge_css();

    }


    protected function purge_css(){

        $this->log('is caching now : ' . $this->url);
        $uucss_api = new UnusedCSS_Api();
        $this->purged_files = $uucss_api->get($this->url);

        if($this->purged_files && count($this->purged_files) > 0) {
            $this->cache_files();
        }
        
    }


    protected function cache_files() {

        foreach($this->purged_files as $file) {
            
            $file_location = $this->append_cache_file_dir($file->file);
            
            if(!$this->file_system->exists($file_location)) {
                $this->file_system->put_contents($file_location, $file->css, FS_CHMOD_FILE);
            }
        }

        do_action('uucss_cache_completed', $this->args);
        
    }


    public function get_base_dir(){

        $root = $this->file_system->wp_content_dir()  . $this->base;

        $root_with_provider = $root . '/' . $this->provider;

        if(!$this->file_system->exists($root)) {
            $this->file_system->mkdir($root);
        }

        if(!$this->file_system->exists($root_with_provider)) {
            $this->file_system->mkdir($root_with_provider);
        }

        return $root_with_provider;
    }


    protected function get_cache_page_dir()
    {
        $hash = $this->encode($this->url);

        $source_dir = $this->get_base_dir() . '/' . $hash;

        if(!$this->file_system->exists($source_dir)) {
            $this->file_system->mkdir($source_dir);
        }

        return $source_dir;
    }


    protected function append_cache_file_dir($file){
        return $this->get_cache_page_dir() . '/' . $this->file_name($file);
    }

}