<?php


namespace App\Service\API\models\Status;


class Content
{
    private string $locale;
    private string $content;

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return Content
     */
    public function setLocale(string $locale): Content
    {
        $this->locale = $locale;
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
     * @return Content
     */
    public function setContent(string $content): Content
    {
        $this->content = $content;
        return $this;
    }
}