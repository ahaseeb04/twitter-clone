<?php

namespace App\Support\Tweets\Entities;

class EntityExtractor
{
    const HASHTAG_REGEX = '/(?!\s)#([A-Za-z]\w*)\b/';
    const MENTION_REGEX = '/(?=[^\w!])@(\w+)\b/';

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $string;

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
        return $this->buildEntityArray(
            $this->match(self::HASHTAG_REGEX), EntityTypes::HASHTAG
        );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getMentionEntities()
    {
        return $this->buildEntityArray(
            $this->match(self::MENTION_REGEX), EntityTypes::MENTION
        );
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getEntities()
    {
        return array_merge($this->getHashtagEntities(), $this->getMentionEntities());
    }
    
    /**
     * Undocumented function
     *
     * @param [type] $entities
     * @param [type] $type
     * @return void
     */
    protected function buildEntityArray($entities, $type)
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