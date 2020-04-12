<?php
namespace MyOne;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
    public function onEnable(){
        $this->getLogger()->info("Aktiviert");
    }
    public function onCommand(CommandSender $sender, Command $command, $labels, array $args): bool {
        switch($command->getName()) {
            case "info":
            $sender->sendMessage(TextFormat::RED . "Infos:");
            return true;
            case "fly":
                if(!$sender instanceof Player){
                    $sender->sendMessage("[Server]: Du bist Kein Spieler!");
                    return true;
                }
        
                $bool = !$this->fly[$sender->getName()];
                $this->fly[$sender->getName()] = $bool;
        
                $sender->sendMessage("[Server]: Fly wurde " . ($bool ? "Aktiviert" : "Deaktiviert"));
        
                $sender->setAllowFlight($bool);
                $sender->setFlying($bool);
                return true;
                
        }

    }
}