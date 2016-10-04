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
use pocketmine\utils\Config;
class Main extends PluginBase implements Listener{
	public function onLoad(){
		$this->getLogger()->info(TextFormat::WHITE . "RPG has been loaded!");
	}
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		  $this->config = (new Config($this->getDataFolder()."config.yml", Config::YAML))->getAll();
       $this->saveDefaultConfig();
		$this->getLogger()->info(TextFormat::DARK_GREEN . "RPG has offically been enabled!");
    }
	public function onDisable(){
		$this->getLogger()->info(TextFormat::DARK_RED . "RPG has been disabled!");
	}
	
public function addMoney($name,$money){
MassiveEconomyAPI::getInstance()->payPlayer($player->getName(), $money);
}

public function onDeath(EntityDamageEvent $event){
$damage=$event->getDamage();
$health=$event->getDamager()->getHealth();
if($health<=$damage){
$player=$event->getDamager();
 $money = $this->getConfig()->get("money");
$player->sendMessage("You've Earned 8 Coins");
$this->addMoney($player->getName(), $money);
}
}
	
	// RPG CLASSES FLOATINGTEXT START //
	public function onJoin(PlayerJoinEvent $event){
		$p=$event->getPlayer();
		// CLASSES Select Selected //
		
		 $config = new Config($this->getDataFolder() . "/classes.yml", Config::YAML);
    $class="false";
		if($config->get("{$player->getName()}") != null)
		{
       
      $player->sendMessage("§7Choose the same class to Continue!");
      $class="true";
		}
		else{
			
			$player->sendMessage("Â§7Please choose a Class!");
			$class="test";
		}
		if($class=="true"){
				 $config = new Config($this->getDataFolder() . "/class.yml", Config::YAML);
				 //$world=$config->get("{$player}-world");
				//$spawn = $this->getServer()->getLevelByName($world)->getSafeSpawn();
					//$this->getServer()->getLevelByName($world)->loadChunk($spawn->getX(), $spawn->getZ());
					//$player->teleport($spawn,0,0);
						$p=$player->getName();
					$cl = $config->get($p);
               $class = $cl["class"];
				$player->sendMessage("Your Previous class was {$class}");
$clas=$class;
				
			}
		if($class="Wizard"){
			
		$level->addParticle(new FloatingTextParticle(new Vector3(146.5, 72, -1862.5),"", "§l§cSelected"));
		}
		else{$level->addParticle(new FloatingTextParticle(new Vector3(146.5, 72, -1862.5),"", "§l§cSelect"));}

	
	if($class="Warrior"){
			
		$level->addParticle(new FloatingTextParticle(new Vector3(146.5, 72, -1862.5),"", "§l§cSelected"));
		}
		else{$level->addParticle(new FloatingTextParticle(new Vector3(146.5, 72, -1862.5),"", "§l§cSelect"));}
		
		
		if($class="Archer"){
			
		$level->addParticle(new FloatingTextParticle(new Vector3(146.5, 72, -1862.5),"", "§l§cSelected"));
		}
		else{$level->addParticle(new FloatingTextParticle(new Vector3(146.5, 72, -1862.5),"", "§l§cSelect"));}
		
		
		}
	}

