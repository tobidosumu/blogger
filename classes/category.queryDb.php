<?php 

    class CategoryQueryDb extends DbConnect
    {
        private $id;
        private $addCategory;

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setAddCategory($addCategory)
        {
            $this->addCategory = $addCategory;
            
        }

        public function saveNewCategory() // Insert category into DB
        {
            try {
                // Convert addCategory to uppercase
                $addCategory = ucfirst($this->addCategory);
        
                // Insert new category into the categories table
                $stmt = $this->connect()->prepare("INSERT INTO categories(addCategory, dateCreated) VALUES(?, NOW())");
                $stmt->execute([$addCategory]);
                
                // Select the new category and the formatted dateCreated value
                $stmt = $this->connect()->prepare("SELECT c.addCategory, DATE_FORMAT(c.dateCreated, '%d-%b-%Y') AS formatted_date FROM categories c WHERE c.addCategory = ?");
                $stmt->execute([$addCategory]);
                return $stmt->fetch();
            } 
            catch (Exception $e) 
            {
                return $e->getMessage();
            }
        }        

        public function fetchOneCategory($id) // Fetch one category from DB
        {
            try 
            {
                $stmt = $this->connect()->prepare("SELECT * FROM categories WHERE id=? LIMIT 1");
                $stmt->execute([$id]);
                return $stmt->fetch();
            } 
            catch (Exception $e) 
            {
                return $e->getMessage();
            }
        }

        public function fetchAllCategories() // Fetch all categories from DB
        {
            try 
            {
                $stmt = $this->connect()->prepare("SELECT * FROM categories ORDER BY id DESC");
                $stmt->execute();
                return $stmt->fetchAll();
            } 
            catch (Exception $e) 
            {
                return $e->getMessage();
            }
        }

        public function editCategory($id)
        {
            try {
                // Convert addCategory to uppercase
                $addCategory = ucfirst($this->addCategory);
        
                // Update category in the categories table
                $stmt = $this->connect()->prepare("UPDATE categories SET addCategory = ? WHERE id = ?");
                $stmt->execute([$addCategory, $id]);
        
                return "successful";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }        

        public function deleteCategory($id) // Delete category from DB
        {
            try 
            {
                $stmt = $this->connect()->prepare("DELETE FROM categories WHERE id = ?");
                $stmt->execute([$id]);

                return "successful";
            } 
            catch (Exception $e) 
            {
                return $e->getMessage();
            }
        }
    }
?>