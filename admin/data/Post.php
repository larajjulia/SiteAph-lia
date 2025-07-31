<?php

// GET ALL USERS

function getAll($conn){
   $sql = "SELECT * FROM post";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if($stmt->rowCount() >= 1){
   	   $data = $stmt->fetchAll();
   	   return $data;
   }else {
   	 return 0;
   }
}

// serach
function serach($conn, $key){
   # creating simple search temple :)  
   $key = "%{$key}%";

   $sql = "SELECT * FROM post 
           WHERE publish=1 AND (post_title LIKE ? 
           OR post_text LIKE ?)";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key]);

   if($stmt->rowCount() >= 1){
         $data = $stmt->fetchAll();
         return $data;
   }else {
       return 0;
   }
}

// getById
function getById($conn, $id){
   $sql = "SELECT * FROM post WHERE post_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if($stmt->rowCount() >= 1){
   	   $data = $stmt->fetch();
   	   return $data;
   }else {
   	 return 0;
   }
}

function getUserByID($conn, $id){
   $sql = "SELECT id, fname, username FROM users WHERE id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if($stmt->rowCount() >= 1){
   	   $data = $stmt->fetch();
   	   return $data;
   }else {
   	 return 0;
   }
}

// Delete By ID
function deleteById($conn, $id){
   $sql = "DELETE FROM post WHERE post_id=?";
   $stmt = $conn->prepare($sql);
   $res = $stmt->execute([$id]);

   if($res){
   	   return 1;
   }else {
   	 return 0;
   }
}
