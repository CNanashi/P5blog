<?php

class Comments extends Model
{
    private $comment_id;
    private $content;
    private $date_add;
    private $date_edit;
    private $user_id;
    private $article_id;
    private $authors;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function setCommentId($id)
    {
        $id = (int)$id;
        ($id >= 0) ? $this->comment_id = $id : null;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setDateAdd($date)
    {
        $this->date_add = $date;
    }

    public function setDateEdit($date)
    {
        $this->date_edit = $date;
    }

    public function setUserId($id)
    {
        $id = (int)$id;
        ($id >= 0) ? $this->user_id = $id : null;
    }

    public function setArticleId($id)
    {
        $id = (int)$id;
        ($id >= 0) ? $this->article_id = $id : null;
    }

    public function setAuthors(){
        return $this->authors;
    }
    public function getCommentId()
    {
        return $this->comment_id;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getDateAdd()
    {
        return $this->date_add;
    }
    public function getDateEdit()
    {
        return $this->date_edit;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getArticleId()
    {
        return $this->article_id;
    }
    public function getAuthors()
    {
        return $this->authors;
    }
}