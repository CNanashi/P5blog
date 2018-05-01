<?php
class ManagerComments extends Manager
{
    public function countComments()
    {
        $query = $this->dbh->prepare("
            SELECT comment_id
            FROM comments
        ");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    public function getAllComments()
    {
        $query = $this->dbh->prepare("
            SELECT  comments,
            DATE_FORMAT(comments date_add, '%d/%m/%y à %Hh%i') as date_add,
                    article_id,
            FROM comments
            INNER JOIN article ON article_id = article_id
            ORDER BY comment_id DESC
        ");
        $query->execute();
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }
    public function getCommentId($id)
    {
        $query = $this->dbh->prepare("
            SELECT  comments*, 
            DATE_FORMAT(comments date_add, '%d/%m/%y à %Hh%i') as date_add,
                    article_id,
            FROM comments
            INNER JOIN article ON article_id = article_id
            WHERE comment_id = :id
        ");
        $query->bindValue(":id", $id, \PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch();
        $query->closeCursor();
        return $result;
    }
    public function addComment(Comments $comments)
    {
        $query = $this->dbh->prepare("
            INSERT INTO comments
            (content, article_id, author)
            VALUES
            (:content, :article_id, :author)
        ");
        $query->bindValue(":content", $comments->getContent(), \PDO::PARAM_STR);
        $query->bindValue(":article_id", $comments->getArticleid(), \PDO::PARAM_INT);
        $query->bindValue(":author", $comments->getAuthors(), \PDO::PARAM_STR);
        try {
            $query->execute();
        } catch (\Exception $e) {
            throw new \Exception("error");
        }
        return $affectedLines = $query->rowCount();
    }
    public function updateComment(Comments $comments)
    {
        $query = $this->dbh->prepare("
            UPDATE comments
            SET content = :content
            WHERE comment_id = :id
        ");
        $query->bindValue(":content", $comments->getContent(), \PDO::PARAM_STR);
        $query->bindValue(":id", $comments->getCommentId(), \PDO::PARAM_INT);
        try {
            $query->execute();
        } catch (\Exception $e) {
            throw new \Exception("error");
        }
    }
    public function deleteComment($id)
    {
        $query = $this->dbh->prepare("
            DELETE FROM comments
            WHERE comment_id = :id
        ");
        $query->bindValue(":id", $id, \PDO::PARAM_INT);
        try {
            $query->execute();
        } catch (\Exception $e) {
            throw new \Exception("error");
        }
    }
}