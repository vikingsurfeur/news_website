<?php


class Comment extends EntityBase
{
    private string $content;
    private string $article_id;

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
    public function getArticleId(): string
    {
        return $this->article_id;
    }

    /**
     * @param string $article_id
     * @return self
     */
    public function setArticleId(string $article_id): self
    {
        $this->article_id = $article_id;

        return $this;
    }
}