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

    /**
     * @var bool
     */
    private $pageReaded;

    function __construct($path) {
        $this->path = $path;
        $this->pages = [];
        $this->pageReaded = false;
    }

    function withTag(array $tags) {
        $this->readPages();
        foreach ($tags as $tag) {
            $this->pages = array_filter($this->pages, function($item) use ($tag) {
                $tagsPage = $item->getTags();
                $idTagsPage = array_keys($tagsPage);
                return in_array($tag, $idTagsPage);
            });
        }
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
        if (!$this->pageReaded) {
            $files = new RegexIterator(
                    new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($this->path)
                    ), '/^.+\.ya?ml?/i', RegexIterator::GET_MATCH
            );

            foreach ($files as $path) {
                $this->pages[] = new Page($path[0]);
            }
            $this->pageReaded = true;
        }
        return $this;
    }

}
