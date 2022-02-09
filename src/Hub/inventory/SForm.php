<?php

namespace Hub\inventory;

use Hub\Main;

use pocketmine\player\Player;

use pocketmine\utils\TextFormat as TE;

use pocketmine\item\Item;

use pocketmine\utils\Config;

final class SForm {

    public static function OpenJuegosUI(Player $player){

        $api = Main::getInstance()->getServer()->getPluginManager()->getPlugin("FormAPI");

        $form = $api->createSimpleForm(function (Player $player, int $data = null) {

            $result = $data;

            if($result === null){

                return true;

            }             

            switch ($result) {

            	case 0:            $ip1 = Main::getInstance()->getConfig()->get("ip1");

            $port1 = Main::getInstance()->getConfig()->get("port1");

            		$player->transfer($ip1, $port1);

            		break;

            	case 1:

            $ip2 = Main::getInstance()->getConfig()->get("ip2");

            $port2 = Main::getInstance()->getConfig()->get("port2");

                    $player->transfer($ip2, $port2);

            		break;

            	case 2:

            $ip3 = Main::getInstance()->getConfig()->get("ip3");

            $port3 = Main::getInstance()->getConfig()->get("port3");

                    $player->transfer($ip3, $port3);

            		break;

            }

        });

        $form->setTitle("§dServer Selector");

        $form->addButton("§dHCF\n§7Competitive",0,"textures/items/fishing_rod_uncast");

        $form->addButton("§dPractice-NA\n§7Competitive",0,"textures/items/potion_bottle_splash_harm");

        $form->addButton("§dKitMap\n§7Entertainment",0,"textures/items/ender_pearl");

        $form->sendToPlayer($player);

    }

}
