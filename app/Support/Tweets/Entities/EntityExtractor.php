<?php

namespace App\Support\Tweets\Entities;

class EntityExtractor
{
    const HASHTAG_REGEX = '/(?!\s)#([A-Za-z]\w*)\b/';
    const MENTION_REGEX = '/(?=[^\w!])@(\w+)\b/';

    /**
     * The text to extract entities from.
     *
     * @var string
     */
    protected $string;

    /**
     * Create a new entity extractor instance.
     *
     * @param string $string
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Get the extracted hashtags.
     *
     * @return array
     */
    public function getHashtagEntities()
    {
        return $this->buildEntityArray(
            $this->match(self::HASHTAG_REGEX), EntityTypes::HASHTAG
        );
    }

    /**
     * Get the extracted mentions.
     *
     * @return array
     */
    public function getMentionEntities()
    {
        return $this->buildEntityArray(
            $this->match(self::MENTION_REGEX), EntityTypes::MENTION
        );
    }

    /**
     * Get the extracted entities.
     *
     * @return array
     */
    public function getEntities()
    {
        return array_merge(
            $this->getHashtagEntities(), 
            $this->getMentionEntities()
        );
    }
    
    /**
     * Build up the entity array.
     *
     * @param array $entities
     * @param string $type
     * @return array
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
     * Match the text against the given pattern.
     *
     * @param string $pattern
     * @return array
     */
    protected function match($pattern)
    {
        preg_match_all($pattern, $this->string, $matches, PREG_OFFSET_CAPTURE);
        
        return $matches;
    }
}