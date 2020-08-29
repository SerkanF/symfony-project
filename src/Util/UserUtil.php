<?php 

namespace App\Util;
use Exception;

class UserUtil {

    public static function isUserExist($doctrine, $userID) {

        $req = 'SELECT id FROM public.accounts where id = ' . $userID . ';';

        $dataFromDbFnAccount = Util::executeSqlRequest($doctrine->getConnection("fnaccount"), $req);

        $req2 = 'SELECT idnum FROM public.tb_user where idnum = ' . $userID . ' ;';

        $dataFromDbFnMember =  Util::executeSqlRequest($doctrine->getConnection("fnmember"), $req2);

        $req3 = 'SELECT id FROM user where id = ' . $userID . ';';

        $dataFromDbSymfony = Util::executeSqlRequest($doctrine->getConnection(), $req3);

        if (!isset($dataFromDbFnAccount[0]['id']) || !isset($dataFromDbFnMember[0]['idnum']) || !isset($dataFromDbSymfony[0]['id'])) {
            return false;
        }

        $idIntFromDbFnAccount = (int) $dataFromDbFnAccount[0]['id'];
        $idIntFromDbFnMember = (int) $dataFromDbFnMember[0]['idnum'];
        $idIntFromDbSymfony = (int) $dataFromDbSymfony[0]['id'];

        $intUserId = (int) $userID;

        if ($intUserId === $idIntFromDbFnAccount && $intUserId === $idIntFromDbFnMember && $intUserId === $idIntFromDbSymfony) {
            return true;
        }

        return false;

    }



}