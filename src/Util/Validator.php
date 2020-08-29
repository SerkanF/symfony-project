<?php 

namespace App\Util;

use Exception;

class Validator {

    public static $keySecretCaptcha = "6Lc8KL0ZAAAAAKCohu1DKgAYingzrlmylsZyKt9S";

    public static function formRegisterIsValid($array) {

        if (count($array) < 5) {
            throw new Exception("Veuillez remplir tous les champs.");
        }

        if (!isset($array['email']) || trim($array['email']) == "" 
            || !isset($array['username']) || trim($array['username']) == "" 
            || !isset($array['password']) || trim($array['password']) == ""
            || !isset($array['confirm-password']) || trim($array['confirm-password']) == ""
            || !isset($array['captcha']) || trim($array['captcha']) == "") {

            throw new Exception("Veuillez remplir tous les champs.");
        }

        $email = $array['email'];
        $username = $array['username'];
        $password = $array['password'];
        $confirmPassword = $array['confirm-password'];
        $captcha = $array['captcha'];

        $regex = '/^[a-z0-9]+$/';

        $isValid = true;

        $pos1 = strpos($email, "@aeriagame");
        $pos2 = strpos($email, "@aeria");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $pos1 !== false || $pos2 !== false) {
            throw new Exception("L'adresse email est invalide");
        }

        if (!preg_match($regex, $username)) {
            throw new Exception("Les caractères spéciaux et les majuscules ne sont pas autorisés.");
        }

        if ($password != $confirmPassword) {
            throw new Exception("Les mots de passe ne sont pas identique.");
        }

        if (!Validator::isValidCaptcha($captcha)) {
            throw new Exception("Le captcha est invalide.");
        }

        return $isValid;

    }

    public static function isPackIsValide($doctrine, $array, $userID) {

        $captcha = $array['captcha'];

        $isValid = true;

        if (!Validator::isValidCaptcha($captcha)) {
            throw new Exception("Le captcha est invalide.");
        }

        if (!is_integer($array['id_pack'])) {
            throw new Exception("Le pack demandé n'est pas valide.");
        }

        if (!is_integer($userID)) {
            throw new Exception("Le nom de compte n'est pas valide.");
        }

        if (!UserUtil::isUserExist($doctrine, $userID)) {
            throw new Exception("Le nom de compte n'existe pas.");
        }

        $packFromDb = PackUtil::getPackById($doctrine, $array['id_pack']);

        if ($packFromDb == null || empty($packFromDb)) {
            throw new Exception("Le pack demandé n'existe pas.");
        }

        if (!isset($packFromDb[0]) || $packFromDb[0]['is_activated'] == null || $packFromDb[0]['is_activated'] == 0) {
            throw new Exception("Le pack n'est pas activé.");
        }

        $datas = PackUtil::isPackIsSent($doctrine, $userID, (int) $array['id_pack']);

        if (count($datas) > 0) {
            throw new Exception("Le pack a déjà été envoyé.");
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
            . " WHERE u.email = '".$email."' OR u.username = '".$username."'"; // u.email = '".$email."' OR

        $connexion = $doctrine->getConnection();

        $fetchData = [];

        try {
            $fetchData = Util::executeSqlRequest($connexion, $sql);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenu, veuillez contacter l'administrateur.");
        }

        if (count($fetchData) >= 1) {
            throw new Exception("L'adresse mail est déjà prise.");
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
            throw new Exception("Une erreur est survenu, veuillez contacter l'administrateur.");
        }

        if (count($fetchData) >= 1) {
            throw new Exception("Ce nom de compte déjà pris.");
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
            throw new Exception("Une erreur est survenu, veuillez contacter l'administrateur.");
        }

        if (count($fetchData) >= 1) {
            throw new Exception("Ce nom d'utilisateur déjà pris.");
        } else {
            return true;
        }

        return false;
    }

}