<?php

//session start
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
switch($path){
   
    //route /evalmvc/addArticle -> ./controler/ctrl_add_article.php
    case $path === "/preSynfo/addArticle":
        include './controler/ctrl_add_article.php';
        break ;
    //route /evalmvc/showArticle -> ./controler/ctrl_show_all_article.php
    case $path === "/preSynfo/showArticle":
        include './controler/ctrl_show_all_article.php';
        break ;
    }
?>