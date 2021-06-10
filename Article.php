<?php


class Article
{
    private int $id;
    private string $title;
    private string $content;

    /**
     * constructor
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * hydrate method
     * loop on $data array
     * concat the set method
     * look if the method exist
     * and setParameter
     */
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value)
        {
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
}