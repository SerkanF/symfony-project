<?php 

namespace App\Util;

use Exception;

use App\Services\Logger\AbfLoggerService;

class Validator {

    public static $keySecretCaptcha = "6Lc8KL0ZAAAAAKCohu1DKgAYingzrlmylsZyKt9S";

    public static function formRegisterIsValid($array) {

        if (count($array) < 5) {
            throw new Exception("Parameters missing");
        }

        if (!isset($array['email']) || trim($array['email']) == "" 
            || !isset($array['username']) || trim($array['username']) == "" 
            || !isset($array['password']) || trim($array['password']) == ""
            || !isset($array['confirm-password']) || trim($array['confirm-password']) == ""
            || !isset($array['captcha']) || trim($array['captcha']) == "") {

            throw new Exception("Form input null");
        }

        $email = $array['email'];
        $username = $array['username'];
        $password = $array['password'];
        $confirmPassword = $array['confirm-password'];
        $captcha = $array['captcha'];

        $regex = '/^[\w]+$/';

        $isValid = true;

        if (!preg_match($regex, $username)) {
            throw new Exception("Character not autorized");
        }

        if ($password != $confirmPassword) {
            throw new Exception("Password not match");
        }

        if (!Validator::isValidCaptcha($captcha)) {
            throw new Exception("Captcha invalid");
        }

        return $isValid;

    }

    public static function isValidCaptcha($value) {
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.Validator::$keySecretCaptcha.'&response='.$value);
        $responseData = json_decode($verifyResponse);
        return $responseData->success;
    }

    public static function isAccountIsFree($doctrine, $array) {
        return Validator::isAccountIsFreeInDefault($doctrine, $array['email'], $array['username']) 
            && Validator::isAccountIsFreeInFnAccount($doctrine, $array['username']) 
            && Validator::isAccountIsFreeInFnMember($doctrine, $array['username']);
    }

    public static function isAccountIsFreeInDefault($doctrine, $email, $username) {

        $sql = "SELECT * " 
            . " FROM user u "
            . " WHERE u.email = '".$email."' OR u.username = '".$username."'";

        $connexion = $doctrine->getConnection();

        $isFree = false;

        $fetchData = [];

        try {
            $fetchData = Util::executeSqlRequest($connexion, $sql);
        } catch (Exception $e) {
            throw new Exception("Une erreur interne est intervenu, contacter l'administrateur");
        }

        if (count($fetchData) >= 1) {
            throw new Exception("Compte utilisateur déjà pris");
        } else {
            return true;
        }

        return false;
        
    }

    public static function isAccountIsFreeInFnAccount($doctrine, $username) {
        $sql = "SELECT * "
            . "FROM public.accounts acc "
            . "WHERE acc.username = '" . $username . "';";

        $connexion = $doctrine->getConnection("fnaccount");

        $fetchData = [];

        try {
            $fetchData = Util::executeSqlRequest($connexion, $sql);
        } catch (Exception $e) {
            throw new Exception("Une erreur interne est intervenu, contacter l'administrateur");
        }

        if (count($fetchData) >= 1) {
            throw new Exception("Compte utilisateur déjà pris");
        } else {
            return true;
        }

        return false;
    }

    public static function isAccountIsFreeInFnMember($doctrine, $username) {
        $sql = "SELECT * "
            . "FROM public.tb_user u "
            . "WHERE u.mid = '" . $username . "' ;";

        $connexion = $doctrine->getConnection("fnmember");

        $fetchData = [];

        try {
            $fetchData = Util::executeSqlRequest($connexion, $sql);
        } catch (Exception $e) {
            throw new Exception("Une erreur interne est intervenu, contacter l'administrateur");
        }

        if (count($fetchData) >= 1) {
            throw new Exception("Compte utilisateur déjà pris");
        } else {
            return true;
        }

        return false;
    }

}