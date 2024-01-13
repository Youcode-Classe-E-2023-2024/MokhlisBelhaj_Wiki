
<?php
class Article
{
    private $db;
    private $tableName = __CLASS__;
    public function __construct()
    {
        $this->db = new Database;

        $this->db->query("SHOW TABLES LIKE '$this->tableName'");
        $result = $this->db->single();

        // debug($result);
        if (empty($result)) {
            $this->createTable();
        }
    }
    public function createTable()
    {
        // Define your table creation SQL here
        $createTableSQL = "
        CREATE TABLE `$this->tableName` (
            `id`          int NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `imageName` VARCHAR(255) NOT NULL,
            `title`       varchar(255) NOT NULL,
            `content`     text NOT NULL,
            `create_at`   timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `edit_at`     timestamp NULL,
            `status`      enum('published', 'archived') NOT NULL,
            `id_user`     int NOT NULL,
            `id_category` int NOT NULL,
            
            CONSTRAINT `FK_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE ,
            CONSTRAINT `FK_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`idCategory`)
        );
           
        ";

        // Execute the table creation query
        $this->db->query($createTableSQL);
        $result =$this->db->execute();
        if ($result){
            $createTableSQL = "
            CREATE TABLE `articles_tags` (
                `id_article` int NOT NULL,
                `id_tag` int NOT NULL,
                KEY `FK_articles` (`id_article`),
                CONSTRAINT `FK_articles` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
                KEY `FK_tags` (`id_tag`),
                CONSTRAINT `FK_tags` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
            ); 
            ";
    
            // Execute the table creation query
            $this->db->query($createTableSQL);
            $this->db->execute();
        }

    }
    public function getAllArticle()
    {
        $this->db->query("SELECT * FROM `$this->tableName` where status='published' and id_user=:id  ");
        $this->db->bind(':id',$_SESSION['user_id']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function getAllArticleadmin()
    {
        $this->db->query("SELECT * FROM `$this->tableName` ");
        $result = $this->db->resultSet();
        return $result;
    }
    public function getArticleByTitle($data)
    {
        $this->db->query("SELECT * FROM `article` WHERE title LIKE '%:title%';");
        $this->db->bind(':title', $data['title']);
        $result = $this->db->resultSet();
        return $result;
    }
    public function getArticleBycategory($data)
    {
        $this->db->query("SELECT 
        article.*, Category.name AS category_name FROM article JOIN Category ON article.id_category = Category.idCategory WHERE Category.name LIKE '%:categoryName%';");
        $result = $this->db->resultSet();
        $this->db->bind(':categoryName', $data['categoryName']);

        return $result;
    }

    public function insertarticle($data)
    {
       
        $this->db->query("INSERT INTO $this->tableName ( `imageName`,`title`,`content`,`status`,`id_user`,`id_category`) VALUES (:imageName,:title,:content,:status,:id_user,:id_category)");
        $this->db->bind(':imageName', $data['image']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':status', 'published');
        $this->db->bind(':id_user', $_SESSION['user_id']);
        $this->db->bind(':id_category', $data['category']);
        if ($this->db->execute()) {
            $lastInsertedId = $this->db->lastInsertId();
            return $lastInsertedId;
        } else {    

            return false;
        }
       
    }
    public function insertTagArticle($data){
        $this->db->query("INSERT INTO `articles_tags` (`id_article`,`id_tag`) VALUES( :id_articles ,:id_tag)");
        $this->db->bind(':id_articles', $data['id_articles']);
        $this->db->bind(':id_tag', $data['id_tag']); 
        $this->db->execute();   
    }
    public function archiveArticle($id)
    {
      
        $this->db->query("UPDATE `$this->tableName` SET `status`='archived' WHERE `id`=:id ");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateArticle($data)
    {
        $this->db->query("UPDATE $this->tableName SET `imageName` = :imageName, `title` = :title, `content` = :content, `edit_at` = CURRENT_TIMESTAMP, `id_category` = :id_category WHERE `id` = :id");
        $this->db->bind(':imageName', $data['image']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':id_category', $data['id_category']);
        $this->db->bind(':id', $data['idArticle']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteArticle($id)
    {
        $this->db->query("DELETE FROM `$this->tableName` WHERE id=:id ");
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
