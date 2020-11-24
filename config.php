<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class config {
    public static function connect(){
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "scheduling_application";
        
        try {
            $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
        return $con;
    }
}