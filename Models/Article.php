<?php


class Article
{
    private int $id;
    private string $title;
    private string $content;
    private string $date;
    private int $priority;

    /**
     * Article constructor.
     * @param array
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
     * @param array
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
        if (is_int($id)) {
            $this->id = $id;
        }

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
        if (is_string($title) && strlen($title) > 3 && strlen($title) < 100)
        {
            $this->title = htmlspecialchars($title);
        }

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
        if (is_string($content) && strlen($content) > 10 && strlen($content) < 20000) {
            $this->content = htmlspecialchars($content);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return self
     */
    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return self
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }
}