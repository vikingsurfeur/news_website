<?php


class Article
{
    private int $id;
    private string $title;
    private string $content;

    /**
     * @param array
     * constructor
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * @param array
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}