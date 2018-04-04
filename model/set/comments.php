<?php

class Comments extends Hydration
{
    private $comment_id;
    private $content;
    private $date_add;
    private $date_edit;
    private $user_id;
    private $article_id;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function setComment_id($id)
    {
        $id = (int) $id;
        ($id >= 0) ? $this->comment_id = $id : null;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
    public function setDate_add($date)
    {
        $this->date_add = $date;
    }
    public function setDate_edit($date)
    {
        $this->date_edit = $date;
    }
    public function setUser_id($id)
    {
        $id = (int) $id;
        ($id >= 0) ? $this->user_id = $id : null;
    }
    public function setArticle_id($id)
    {
        $id = (int) $id;
        ($id >= 0) ? $this->article_id = $id : null;
    }
    public function getComment_id()
    {
        return $this->comment_id;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getDate_add()
    {
        return $this->date_add;
    }
    public function getDate_edit()
    {
        return $this->date_edit;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getArticle_id()
    {
        return $this->article_id;
    }

}