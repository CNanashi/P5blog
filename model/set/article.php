<?php

class Article extends Hydration
{
        private $article_id;
        private $title;
        private $chapo;
        private $content;
        private $date_add;
        private $date_edit;
        private $author;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function setArticle_id($id)
    {
        $id = (int) $id;
        if(is_int($id) && $id >= 0) {
            $this->article_id = $id;
        }
    }
    public function setDate_add($date)
    {
        if(!empty($date)) {
            $this->date_add = $date;
        }
    }
    public function setDate_edit($date)
    {
        if(!empty($date)) {
            $this->date_edit = $date;
        }
    }
    public function setTitle($title)
    {
        if(is_string($title) && !empty($title)) {
            $this->title = $title;
        }
    }
    public function setChapo($chapo)
    {
        if(is_string($chapo) && !empty($chapo)) {
            $this->chapo = $chapo;
        }
    }
    public function setContent($content)
    {
        if(is_string($content) && !empty($content)) {
            $this->content = $content;
        }
    }

    public function setAuthor($author)
    {
        if(!empty($author) && is_string($author)) {
            $this->author = $author;
        }
    }
    public function getArticle_Id()
    {
        return $this->article_id;
    }
    public function getDate_add()
    {
        return $this->date_add;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getChapo()
    {
        return $this->chapo;
    }
    public function getContent()
    {
        return $this->content;
    }

    public function getDate_edit()
    {
        return $this->date_edit;
    }
    public function getAuthor()
    {
        return $this->author;
    }
}