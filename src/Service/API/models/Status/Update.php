<?php

namespace App\Service\API\models\Status;

class Update
{
    private int $id;
    private string $author;
    private bool $publish;

    /**
     * @var string[]
     */
    private array $publish_locations;
    /**
     * @var Content[]
     */
    private array $translations;
    private string $created_at;
    private string $updated_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Update
     */
    public function setId(int $id): Update
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Update
     */
    public function setAuthor(string $author): Update
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublish(): bool
    {
        return $this->publish;
    }

    /**
     * @param bool $publish
     * @return Update
     */
    public function setPublish(bool $publish): Update
    {
        $this->publish = $publish;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getPublishLocations(): array
    {
        return $this->publish_locations;
    }

    /**
     * @param string[] $publish_locations
     * @return Update
     */
    public function setPublishLocations(array $publish_locations): Update
    {
        $this->publish_locations = $publish_locations;
        return $this;
    }

    /**
     * @return Content[]
     */
    public function getTranslations(): array
    {
        return $this->translations;
    }

    /**
     * @param Content[] $translations
     * @return Update
     */
    public function setTranslations(array $translations): Update
    {
        $this->translations = $translations;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return Update
     */
    public function setCreatedAt(string $created_at): Update
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return Update
     */
    public function setUpdatedAt(string $updated_at): Update
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}
