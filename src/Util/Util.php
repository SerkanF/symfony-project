<?php 

namespace App\Util;

class Util {

    public static function executeSqlRequest($connexion, $req) {
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $connexion->close();
        return $data;
    }

    public static function executeInsertRequest($connexion, $req) {
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        $connexion->close();
    }

}