<?php
    require_once('DBConnect.php');

    /**
     * Class Shop
     * Shop service
     */
    class Shop extends DBConnect
    {
        /**
         * @param $data
         * @param null $categoryId
         * @param null $productId
         * @return mixed
         * show product and category
         */
        public function show($data, $categoryId = null, $productId = null) {
            if(($categoryId == null) && ($productId == null)) {
                $sql = "SELECT * FROM $data";
                $row = $this->getQuery($sql);
            } else {
                if($productId == null) {
                    $sql = "SELECT * FROM $data WHERE category_id=$categoryId";
                    $row = $this->getQuery($sql);
                } else {
                    $sql = "SELECT * FROM $data WHERE id=$productId";
                    $row = $this->getQuery($sql);
                }
            }

            return $row;
        }

        /**
         * @param $index
         * @return array
         * array image products
         */
        public function getProductPictures($index) {
            $images = [];

            for($i=0; $i<10; $i++) {
                $filepath = "images/" . $index . "-" . $i . ".png";

                if(file_exists($filepath)) {
                    $images[] = $filepath;
                }
            }

            return $images;
        }
    }