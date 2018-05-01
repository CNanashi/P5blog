<?php
class ManagerArticles extends Manager
{
    public function countArticle()
    {
        $query = $this->dbh->prepare("
            SELECT article_id, date_add
            FROM article
        ");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    public function getAllArticle()
    {
        $query = $this->dbh->prepare("
            SELECT  article*,
                    DATE_FORMAT(article date_add, '%d/%m/%y à %Hh%i') as date_add, 
                    DATE_FORMAT(article date_edit, '%d/%m/%y à %Hh%i') as date_edit,
                    username as author
            FROM article
            INNER JOIN users ON article user_id = user_id
            ORDER BY article_id DESC
        ");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    public function getArticleId($id)
    {
        $query = $this->dbh->prepare("
            SELECT article*, username as author,
            DATE_FORMAT(article date_add, '%d/%m/%y à %Hh%i') as date_add, 
            DATE_FORMAT(article date_edit, '%d/%m/%y à %Hh%i') as date_edit,
            FROM article
            INNER JOIN users  ON article user_id = user_id
            WHERE article_id = :id
        ");
        $query->bindValue(":id", $id, \PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }
    public function addArticle(Article $article)
    {
        $query = $this->dbh->prepare("
            INSERT INTO article (title, chapo, user_id) VALUES (:title, :chapo, :author)
        ");
        $query->bindValue(":title", $article->getTitle(), \PDO::PARAM_STR);
        $query->bindValue(":chapo", $article->getChapo(), \PDO::PARAM_STR);
        $query->bindValue(":author", $article->getAuthor(), \PDO::PARAM_STR);
        $query->bindValue(":content", $article->getContent(), \PDO::PARAM_STR);

        try {
            $query->execute();
            return $this->lastArticle();
        } catch (\Exception $e) {
            throw new \Exception("error");
        }
    }
    public function updateArticle(Article $article)
    {
        $prepare = "UPDATE article SET title = :title, chapo = :chapo,";
        $prepare .= " WHERE article_id = :article_id";
        $query = $this->prepare($prepare);
        $query->bindValue(":title", $article->getTitle(), \PDO::PARAM_STR);
        $query->bindValue(":chapo", $article->getChapo(), \PDO::PARAM_STR);
        $query->bindValue(":content", $article->getContent(), \PDO::PARAM_STR);
        $query->bindValue(":article_id", $article->getArticleId(), \PDO::PARAM_INT);
        try {
            $query->execute();
        } catch (\Exception $e) {
            throw new \Exception("error");
        }
    }
    public function deleteArticle($id)
    {
        $query = $this->dbh->prepare("
            DELETE FROM article
            WHERE article_id = :id
        ");
        $query->bindValue(":id", $id, \PDO::PARAM_INT);
        try {
            $query->execute();
        } catch (\Exception $e) {
            throw new \Exception("error");
        }
    }
}