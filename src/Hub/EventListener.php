<?php

namespace Hub;

use Hub\Main;

use pocketmine\event\Listener;

use pocketmine\utils\TextFormat as TE;

use Hub\inventory\SForm;

use pocketmine\player\Player;

use pocketmine\Server;

use pocketmine\plugin\Plugin;

use pocketmine\item\ItemFactory;

use pocketmine\item\Item;

use pocketmine\event\block\BlockBreakEvent;

use pocketmine\event\block\BlockPlaceEvent;

use pocketmine\event\entity\EntityDamageEvent;

use pocketmine\item\enchantment\Enchantment;

use pocketmine\item\enchantment\EnchantmentInstance;

use pocketmine\event\player\PlayerExhaustEvent;

use pocketmine\event\player\PlayerMoveEvent;

use pocketmine\event\player\PlayerItemUseEvent;

use pocketmine\event\player\PlayerChatEvent;

use pocketmine\event\player\PlayerDropItemEvent;

use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\event\inventory\InventoryTransactionEvent;

use pocketmine\color\Color;

class EventListener implements Listener {

    

    public static function getPlugin(): Plugin {

        return Server::getInstance()->getPluginManager()->getPlugin("PurePerms");

    }

    

    public function onJoin(PlayerJoinEvent $event) : void {

        $player = $event->getPlayer();

        $event->setJoinMessage("");

        

        $player->teleport($player->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());

        

        $slot1 = ItemFactory::getInstance()->get(347, 0, 1);

        $slot2 = ItemFactory::getInstance()->get(368, 0, 1);

        $slot3 = ItemFactory::getInstance()->get(130, 0, 1);

        

        $slot1->setCustomName("§r§f§dServer Selector");

        $slot2->setCustomName("§r§f§dEnderButt");

        $slot3->setCustomName("§r§f§dCosmetics");

        

        $player->getInventory()->clearAll();

        $player->getInventory()->setItem(0, $slot1);

        $player->getInventory()->setItem(4, $slot2);

        $player->getInventory()->setItem(8, $slot3);

        

        if($this->getRank($player) === "Guest"){

            $player->getArmorInventory()->setContents([

			0 => ItemFactory::getInstance()->get(0),			1 => ItemFactory::getInstance()->get(0),

			2 => ItemFactory::getInstance()->get(0),

			3 => ItemFactory::getInstance()->get(0)

		]);

        }

        

        $rank1 = Main::getInstance()->getConfig()->get("Rank_1");

        if($this->getRank($player) === $rank1){

            $chestplate = ItemFactory::getInstance()->get(299, 0, 1);

            $chestplate->setCustomColor(new Color(249, 255, 255));

          //  $chestplate->addEnchantment(new EnchantmentInstance(17, 3));

            $leggings = ItemFactory::getInstance()->get(300, 0, 1);

            $leggings->setCustomColor(new Color(249, 255, 255));

          //  $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $boots = ItemFactory::getInstance()->get(301, 0, 1);

            $boots->setCustomColor(new Color(249, 255, 255));

          //  $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $player->getArmorInventory()->setContents([

			0 => ItemFactory::getInstance()->get(0),

			1 => $chestplate,

			2 => $leggings,

			3 => $boots

		]);

        }

        

        $rank2 = Main::getInstance()->getConfig()->get("Rank_2");

        if($this->getRank($player) === $rank2){

            $chestplate = ItemFactory::getInstance()->get(299, 0, 1);

            $chestplate->setCustomColor(new Color(255, 216, 61));

          //  $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $leggings = ItemFactory::getInstance()->get(300, 0, 1);

            $leggings->setCustomColor(new Color(255, 216, 61));

          //  $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $boots = ItemFactory::getInstance()->get(301, 0, 1);

            $boots->setCustomColor(new Color(255, 216, 61));

            //$boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $player->getArmorInventory()->setContents([

			0 => ItemFactory::getInstance()->get(0),

			1 => $chestplate,

			2 => $leggings,

			3 => $boots

        ]);

        }

        

        $rank3 = Main::getInstance()->getConfig()->get("Rank_3");

        if($this->getRank($player) === $rank2){

            $chestplate = ItemFactory::getInstance()->get(299, 0, 1);

            $chestplate->setCustomColor(new Color(249, 128, 29));

           // $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $leggings = ItemFactory::getInstance()->get(300, 0, 1);

            $leggings->setCustomColor(new Color(249, 128, 29));

           // $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $boots = ItemFactory::getInstance()->get(301, 0, 1);

            $boots->setCustomColor(new Color(249, 128, 29));

            //$boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $player->getArmorInventory()->setContents([

			0 => ItemFactory::getInstance()->get(0),

			1 => $chestplate,

			2 => $leggings,

			3 => $boots

        ]);

        }

        

        $rank4 = Main::getInstance()->getConfig()->get("Rank_4");

        if($this->getRank($player) === $rank4){

            $chestplate = ItemFactory::getInstance()->get(299, 0, 1);

            $chestplate->setCustomColor(new Color(58, 179, 218));

          //  $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $leggings = ItemFactory::getInstance()->get(300, 0, 1);

            $leggings->setCustomColor(new Color(58, 179, 218));

          //  $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $boots = ItemFactory::getInstance()->get(301, 0, 1);

            $boots->setCustomColor(new Color(58, 179, 218));

           // $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $player->getArmorInventory()->setContents([

			0 => ItemFactory::getInstance()->get(0),

			1 => $chestplate,

			2 => $leggings,

			3 => $boots

        ]);

        }

        

        $rank5 = Main::getInstance()->getConfig()->get("Rank_5");

        if($this->getRank($player) === $rank5){

            $chestplate = ItemFactory::getInstance()->get(299, 0, 1);

            $chestplate->setCustomColor(new Color(198, 79, 189));

           // $chestplate->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $leggings = ItemFactory::getInstance()->get(300, 0, 1);

            $leggings->setCustomColor(new Color(198, 79, 189));

          //  $leggings->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $boots = ItemFactory::getInstance()->get(301, 0, 1);

            $boots->setCustomColor(new Color(198, 79, 189));

           // $boots->addEnchantment(new EnchantmentInstance(Enchantment::getEnchantment(Enchantment::UNBREAKING), 3));

            $player->getArmorInventory()->setContents([

			0 => ItemFactory::getInstance()->get(0),

			1 => $chestplate,

			2 => $leggings,

			3 => $boots

        ]);

        }

        

        $rank6 = Main::getInstance()->getConfig()->get("Rank_6");

        if($this->getRank($player) === $rank6){

            $chestplate = ItemFactory::getInstance()->get(299, 0, 1);

            $chestplate->setCustomColor(new Color(176, 46, 38));

            //$chestplate->addEnchantment(new EnchantmentInstance(17, 3));

            $leggings = ItemFactory::getInstance()->get(300, 0, 1);

            $leggings->setCustomColor(new Color(176, 46, 38));

            //$leggings->addEnchantment(new EnchantmentInstance(17, 3));

            $boots = ItemFactory::getInstance()->get(301, 0, 1);

            $boots->setCustomColor(new Color(176, 46, 38));

          //  $boots->addEnchantment(new EnchantmentInstance(17, 3));

            $player->getArmorInventory()->setContents([

			0 => ItemFactory::getInstance()->get(0),

			1 => $chestplate,

			2 => $leggings,

			3 => $boots

        ]);

        }

    }

    

    public function onNoDrop(PlayerDropItemEvent $event){

        $event->cancel(true);

    }

    

    public function NoBreakEvent(BlockBreakEvent $event){

        $event->cancel(true);

    }

    

    public function MuteChat(PlayerChatEvent $event){

        $mute = Main::getInstance()->getConfig()->get("global_mute");

        $event->cancel($mute);

       if($mute == "true"){

        $event->getPlayer()->sendMessage("§cyou can't talk with muted chat");

        }

    }

    

    public function NoPlaceEvent(BlockPlaceEvent $event){

        $event->cancel(true);

    }

    

    public function NoDamage(EntityDamageEvent $event){

        $cause = $event->getCause();

        $player = $event->getEntity();

        

        if($cause == EntityDamageEvent::CAUSE_VOID){

            $player->teleport($player->getServer()->getWorldManager()->getDefaultWorld()->getSafeSpawn());

        }

        $event->cancel(true);

    }

    

    public function NoHunger(PlayerExhaustEvent $event){

        $event->cancel(true);

    }

    

    public function NoItemMove(InventoryTransactionEvent $event){

        $event->cancel(true);

    }

    

    public function onItemUse(PlayerItemUseEvent $event){

        $player = $event->getPlayer();

        $item = $event->getItem();

        

        if($item->getId() == 368){

               $player->setMotion($player->getDirectionVector()->add(0, 0.2, 0)->multiply(2));

            $event->cancel(true);

            return;

        }

        if($item->getId() == 347){

            SForm::OpenJuegosUI($player);

        }

        if($item->getId() == 130){

            $player->sendMessage("§4Coming soon...");

        }

    }

    

    public static function getRank(Player $player) : string{

        $group = self::getPlugin()->getUserDataMgr()->getGroup($player);

        return $group;

    }

}

?>
