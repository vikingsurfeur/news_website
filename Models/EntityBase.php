<?php


abstract class EntityBase
{
    protected int $id;
    protected string $date;

    /**
     * Article / Comment constructor.
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
}