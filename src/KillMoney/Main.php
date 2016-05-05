<?php
namespace KillMoney;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use MassiveEconomy\MassiveEconomyAPI;
use pocketmine\Player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
class Main extends PluginBase implements Listener{
	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "KillMoney has been loaded!");
	}
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TextFormat::DARK_GREEN . "KillMoney has offically been enabled!");
    }
	public function onDisable(){
		$this->getLogger()->info(TextFormat::DARK_RED . "KillMoney has been disabled!");
	}
	
public function addMoney($name,$money){
MassiveEconomyAPI::getInstance()->payPlayer($player->getName(), "8");
}

public function onDeath(EntityDamageEvent $event){
$damage=$event->getDamage();
$health=$event->getHealth();
if($health<=$damage){
$player=$event->getDamager();
$money="8";
$player->sendMessage("You've Earned 8 Coins");
$this->addMoney($player->getName(), $money);
}
}
}
