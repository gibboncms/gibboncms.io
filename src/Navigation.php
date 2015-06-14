<?php

namespace GibbonCms\GibbonCmsIO;

class Navigation
{
    /**
     * @var array
     */
    protected $docs;

    /**
     * @var array
     */
    protected $docSections = [
        'intro'  => 'intro',
        'gibbon' => 'Gibbon',
        'liana'  => 'Liana',
    ];

    /**
     * Get the items for the docs navigation
     * 
     * @return array
     */
    public function docs()
    {
        if (isset($this->docs)) {
            return $this->docs;
        }

        $pages = array_reduce(liana('pages')->getAll(), function($carry, $page) {
            if (!isset($page->data['nav'])) {
                return $carry;
            }

            $navData = string($page->data['nav']['section']);

            if ((string) $navData->firstSegment('-', 0) !== 'docs') {
                return $carry;
            }

            $carry[$page->id] = $page;

            return $carry;
        }, []);

        uasort($pages, function($a, $b) {
            return strcasecmp($a->data['nav']['section'], $b->data['nav']['section']);
        });

        foreach($pages as $id => $page) {
            $section = (string) string($page->data['nav']['section'])->segment('-', 1);
            $key = $this->docSections[$section];

            if (!isset($nav[$key])) {
                $nav[$key] = [];
            }

            $nav[$key][] = [
                'name' => $page->data['nav']['name'],
                'url'  => url($page->id),
            ];
        }

        $docSections = array_values($this->docSections);
        uksort($nav, function($a, $b) use ($docSections) {
            return array_search($a, $docSections) > array_search($b, $docSections);
        });

        $this->docs = $nav;

        return $this->docs;
    }
}
