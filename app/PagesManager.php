<?php

namespace App;

use ArrayIterator;
use IteratorAggregate;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

class PagesManager implements IteratorAggregate {

    private $path;
    private $pages;

    function __construct($path) {
        $this->path = $path;
        $this->pages = [];
    }

    function withTag(array $tags) {
        $this->pages = array_filter($this->pages, function() use ($tags) {
            $tags_page = $this->get('tags');
        });
    }

    function getIterator() {
        $this->readPages();
        return new \ArrayIterator($this->pages);
    }

    private function readPages() {
        if (empty($this->pages)) {
            $files = new RegexIterator(
                    new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($this->path)
                    ), '/^.+\.ya?ml?/i', RegexIterator::GET_MATCH
            );

            foreach ($files as $path) {
                $this->pages[] = new Page($path[0]);
            }
        }
    }

}
