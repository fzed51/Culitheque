<?php

namespace App;

use VKBansal\FrontMatter\Parser;
use const content_path;
use const layout_path;

class Page {

    private $path;
    private $url;
    private $name;
    private $data;
    private $content;
    private $docParsed;
    private $style;
    private $script;

    function __construct($path) {
        $this->path = $path;
        $this->url = '';
        $this->name = '';
        $this->data = [];
        $this->content = null;
        $this->docParsed = null;
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

    function getContent() {
        if (!$this->content) {
            $parser = new \cebe\markdown\GithubMarkdown();
            $parser->enableNewlines = true;
            $this->content = $parser->parse($this->getDocParse()->getContent());
        }
        return $this->content;
    }

    function render() {
        return $this->renderLayout($this->get('layout'), $this->getContent());
        $contents;
    }

    function addStyle($style) {
        $this->style = $style . PHP_EOL . $this->style;
    }

    function getStyle() {
        return $this->style;
    }

    function addScript($script) {
        $this->script = $script . PHP_EOL . $this->script;
    }

    function getScript() {
        return $this->script;
    }

    private function renderLayout($layout, $content) {
        if (!$layout) {
            $layout = 'defaut';
        }
        $page = $this;
        ob_start();
        include layout_path . DIRECTORY_SEPARATOR . $layout . '.php';
        $content = ob_get_clean();
        if (isset($__layout)) {
            return $this->renderLayout($__layout, $content);
        } else {
            return $content;
        }
    }

    private function getDocParse() {
        if (!$this->docParsed) {
            $this->docParsed = Parser::parse(file_get_contents($this->path));
        }
        return $this->docParsed;
    }

    private function get($property) {
        if (!array_key_exists($property, $this->data)) {
            $this->data[$property] = $this->getDocParse()->getConfig()[$property];
        }
        return $this->data[$property];
    }

}
