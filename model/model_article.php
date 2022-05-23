<?php

    class Articles {

        protected $id_art;
        protected $nom_art;
        protected $content_art;



         public function __construct($nom, $content){

          
            $this->nom_art = $nom;
            $this->content_art = $content;


         }

        //  -----------Get & Set------------------------------------

    






        /**
         * Get the value of id_art
         */ 
        public function getIdArt()
        {
                return $this->id_art;
        }

        /**
         * Set the value of id_art
         *
         * @return  self
         */ 
        public function setIdArt($id_art)
        {
                $this->id_art = $id_art;

                return $this;
        }

        /**
         * Get the value of nom_art
         */ 
        public function getNomArt()
        {
                return $this->nom_art;
        }

        /**
         * Set the value of nom_art
         *
         * @return  self
         */ 
        public function setNomArt($nom_art)
        {
                $this->nom_art = $nom_art;

                return $this;
        }

        /**
         * Get the value of content_art
         */ 
        public function getContentArt()
        {
                return $this->content_art;
        }

        /**
         * Set the value of content_art
         *
         * @return  self
         */ 
        public function setContentArt($content_art)
        {
                $this->content_art = $content_art;

                return $this;
        }


        public function addArticle($bdd){
            try{
                $req = $bdd->prepare('INSERT INTO article(nom_art, content_art)
                VALUES(:nom_art, :content_art)');
                $req->execute(array(
                    "nom_art" => $this->getNomArt(),
                    "content_art" => $this->getContentArt()
                    
                ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
        public function showAllArticle($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM article');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    }