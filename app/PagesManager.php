<?php

namespace App;

use ArrayIterator;
use IteratorAggregate;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

class PagesManager implements IteratorAggregate {

    private $path;

    /**
     * @var array[App\Page]
     */
    private $pages;

    function __construct($path) {
        $this->path = $path;
        $this->pages = [];
    }

    function withTag(array $tags) {
        // code ...
        return $this;
    }

    function getTags() {
        $tags = [];
        $this->readPages();
        foreach ($this->pages as $page) {
            $tags = array_merge($tags, $page->getTags());
        }
        return $tags;
    }

    /**
     * @return ArrayIterator
     */
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
