<?php

namespace App;

class PagesManager implements \IteratorAggregate {

    private $path;
    private $pages;

    public function __construct($path) {
        $this->path = $path;
    }

    public function withTag(array $tags) {

    }

    public function getIterator() {
        return new \ArrayIterator($this->pages);
    }

}
