<?php


class PostClass{

    private $userID , $postID;
    private $title , $content;

    public function __construct($userID, $postID , $title , $content){
        $this->userID = $userID;
        $this->postID = $postID;
        $this->title = $title;
        $this->content = $content;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }
    public function getUserID(){
        return $this->userID;
    }

    public function setPostID($postID){
        $this->postID = $postID;
    }
    public function getPostID(){
        return $this->postID;
    }

    public function setTitle($title){
        $this->title = $title;
    }
    public function getTitle(){
        return $this->title;
    }

    public function setContent($content){
        $this->content = $content;
    }
    public function getContent(){
        return $this->content;
    }
}

?>
