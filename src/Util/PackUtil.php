<?php 

namespace App\Util;
use Exception;

class PackUtil {

    public static function getAllContentPack($doctrine, $id) {

        $req = 'SELECT 
                    p.id, p.name as name_pack, p.is_activated, from_unixtime(p.created_at) as created_at, from_unixtime(p.expired_at) as expired_at,
                    pifg.id_pack, pifg.id_in_game, pifg.item_quantity,
                    ifg.id_in_game, ifg.name as name_item, ifg.is_stackable
                FROM 
                    `pack` p, 
                    `pack_items_from_game` pifg, 
                    `items_from_game` ifg
                WHERE 
                    p.id = pifg.id_pack
                AND 
                    pifg.id_in_game = ifg.id_in_game';

        if (isset($id)) {
            $req .= ' AND pifg.id_pack = ' . $id . ' ';
        }

        $req .= ' ORDER BY p.id, pifg.id_in_game;';

        $connexion = $doctrine->getConnection();

        $fetchData = [];

        try {
            $fetchData = Util::executeSqlRequest($connexion, $req);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenu, veuillez contacter l'administrateur.");
        }
        
        return PackUtil::formatAllContentPack($fetchData);
    }

    public static function isPackIsSent($doctrine, $userID, $packID) {

        $req = 'SELECT * FROM `packs_users` WHERE id_user = ' . $userID . ' AND id_pack = ' . $packID . ';';

        $connexion = $doctrine->getConnection();

        $fetchData = [];

        try {
            $fetchData = Util::executeSqlRequest($connexion, $req);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenu, veuillez contacter l'administrateur.");
        }

        return $fetchData;

    }

    public static function getPackById($doctrine, $packID) {

        $req = 'SELECT * FROM `pack` WHERE id = ' . $packID . ';';

        $connexion = $doctrine->getConnection();

        $fetchData = [];

        try {
            $fetchData = Util::executeSqlRequest($connexion, $req);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenu, veuillez contacter l'administrateur.");
        }

        return $fetchData;
    }
    
    public static function sendPack($doctrine, $userID, $userName, $packID) {

        $contentPack = PackUtil::getAllContentPack($doctrine, $packID);

        $idItemReceivable = (int) ($packID . '0' . $userID . '00');

        $sql = " INSERT INTO public.item_receivable ";
        $sql .= " (id, state, purchase_time, receivable_time, account_name, item_id, item_quantity, world_id, player_name, point, amount, mail_name, item_color) ";
        $sql .= " VALUES ";

        if (isset($contentPack[$packID]) && isset($contentPack[$packID]['content'])) {
            foreach ($contentPack[$packID]['content'] as $itemID => $item){
                if ($item['is_stackable'] == 1) {
                    $idItemReceivable++;
                    $sql .= " (".$idItemReceivable.", 1, NOW(), NOW(), '". $userName . "', ". (int) $itemID . ", " . (int)$item['item_quantity'] . ", 1010, '', 0, 1, '', 0),";
                } else {
                    for($i = 0; $i < (int)$item['item_quantity']; $i++) {
                        $idItemReceivable++;
                        $sql .= " (" . $idItemReceivable . ", 1, NOW(), NOW(), '" . $userName . "', " . (int) $itemID . ", 1, 1010, '', 0, 1, '', 0),";
                    }
                }
            }
        } else {
            throw new Exception("Une erreur est survenu, veuillez contacter l'administrateur.");
        }

        // Remove last ,
        $sql = substr($sql, 0, -1);

        try {
            Util::executeInsertRequest($doctrine->getConnection("fnaccount"), $sql);
            $req = "INSERT INTO `packs_users` (`id_user`, `id_pack`) VALUES (".$userID.", ".$packID.");";
            Util::executeInsertRequest($doctrine->getConnection(), $req);
        } catch (Exception $e) {
            throw new Exception("Une erreur est survenu pendant l'envoie du pack. Veuillez contacter l'administrateur ");
        }        
        
    }

    private static function formatAllContentPack($datas) {

        $result = [];

        foreach ($datas as $value) {
            
            $idPack = $value['id_pack'];

            if (!isset($result[$idPack])) {
                $result[$idPack] = [];
                $result[$idPack]['is_activated'] = $value['is_activated'];
                $result[$idPack]['created_at'] = $value['created_at'];
                $result[$idPack]['expired_at'] = $value['expired_at'];
                $result[$idPack]['id_pack'] = $value['id_pack'];
                $result[$idPack]['name_pack'] = $value['name_pack'];
                $result[$idPack]['content'] = [];
            }

            $result[$idPack]['content'][$value['id_in_game']]['name_item'] = $value['name_item'];
            $result[$idPack]['content'][$value['id_in_game']]['item_quantity'] = $value['item_quantity'];
            $result[$idPack]['content'][$value['id_in_game']]['is_stackable'] = $value['is_stackable'];

        }

        return $result;

    }

}