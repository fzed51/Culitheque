<?php

namespace App;

use const content_path;

class Page {

    private $path;
    private $url;
    private $name;
    private $data;

    function __construct($path) {

        $this->path = $path;
    }

    function getURL() {
        if (!$this->url) {
            $this->url = str_replace(content_path, '', $this->path);
            $this->url = str_replace('.yml', '', $this->url);
            $this->url = str_replace('.yaml', '', $this->url);
            $this->url = str_replace('index', '', $this->url);
            $this->url = str_replace('\\', '/', $this->url);
        }
        return $this->url;
    }

    function getName() {
        if (!$this->name) {
            $this->name = str_replace('/', '.', $this->getURL());
            if ($this->name == '.' || empty($this->name)) {
                $this->name = 'home';
            }
        }
        return $this->name;
    }

    function render() {
        $page = $this;
        ob_start();

        require layout_path . DIRECTORY_SEPARATOR . 'default';

        $contents = ob_get_contents();
        ob_end_clean();
    }

}
