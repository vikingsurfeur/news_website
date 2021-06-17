<?php


class Article extends EntityBase
{
    private string $title;
    private string $content;
    private int $priority;

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