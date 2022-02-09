
<?php 

namespace Hub;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\plugin\{PluginOwned, PluginOwnedTrait};
use pocketmine\command\utils\InvalidCommandSyntaxException;
use pocketmine\Server;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

class Main extends PluginBase implements Listener {

protected static $instance;

public function onLoad() : void {
        self::$instance = $this;
    }

public function onEnable() : void {
        $server = $this->getServer();
        $this->getLogger()->info("
██╗░░██╗██╗░░░██╗██████╗░
██║░░██║██║░░░██║██╔══██╗
███████║██║░░░██║██████╦╝
██╔══██║██║░░░██║██╔══██╗
██║░░██║╚██████╔╝██████╦╝
╚═╝░░╚═╝░╚═════╝░╚═════╝░
");
        $name = $this->getConfig()->get("server_name");
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->getServer()->getNetwork()->setName($name);
    }
    
    public function onDisable() : void {
        $this->getLogger()->info("Hub Off");
    }
    
    public static function getInstance() : Main {
        return self::$instance;
    }
}

?>
