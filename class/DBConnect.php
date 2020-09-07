<?php
    class DBConnect 
    {
        /**
         * @var array
         * Config data
         */
        protected $_config;

        /**
         * @obj connection
         */
        public $dbc;

        /**
         * DBConnect constructor.
         * @param array $config
         */
        public function __construct(array $config) {
            $this->_config = $config;
            $this->getPDOConnection();
        }

        /**
         * DBConnect destructor
         */
        public function __destruct() {
            $this->dbc = NULL;
        }

        /**
         * Connection with database
         */
        private function getPDOConnection() {
            if($this->dbc == NULL) {
                $dsn = "" . $this->_config['driver'] . ":host=" . $this->_config['host'] . ";dbname=" . $this->_config['dbname'] . ";charset=utf8";

                try {
                    $this->dbc = new PDO($dsn, $this->_config['username'], $this->_config['password']);
                } catch(PDOException $e) {
                    echo __LINE__.$e->getMessage();
                }
            }
        }

        /**
         * @param $sql
         * @return mixed
         */
        public function runQuery($sql) {
            try {
                $count = $this->dbc->exec($sql) or print_r($this->dbc->errorInfo);
            } catch(PDOException $e) {
                echo __LINE__.$e->getMessage();
            }

            return $count;
        }

        /**
         * @param $sql
         * @return mixed
         */
        public function getQuery($sql) {
            $stmt = $this->dbc->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            return $stmt;
        }
    }
