<?php

namespace App\Support\Tweets\Entities;

class EntityExtractor
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $string;

    const HASHTAG_REGEX = '/(?!\s)#([A-Za-z]\w*)\b/';

    /**
     * Undocumented function
     *
     * @param [type] $string
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getHashtagEntities()
    {
        return $this->buildEntityCollection(
            $this->match(self::HASHTAG_REGEX), 'hashtag'
        );
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $entities
     * @param [type] $type
     * @return void
     */
    protected function buildEntityCollection($entities, $type)
    {
        return array_map(function ($entity, $index) use ($entities, $type) {
            return [
                'body' => $entity[0],
                'body_plain' => $entities[1][$index][0],
                'type' => $type,
                'start' => $start = $entity[1],
                'end' => $start + strlen($entity[0])
            ];
        }, $entities[0], array_keys($entities[0]));
    }

    /**
     * Undocumented function
     *
     * @param [type] $pattern
     * @return void
     */
    protected function match($pattern)
    {
        preg_match_all($pattern, $this->string, $matches, PREG_OFFSET_CAPTURE);
    
        return $matches;
    }
}