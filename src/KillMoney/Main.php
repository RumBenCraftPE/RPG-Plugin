<?php
namespace KillMoney;
use pocketmine\plugin\PluginBase;
use BlockBreakClimbingFix\NPC;
use pocketmine\entity\Effect;
use pocketmine\event\Listener;
use pocketmine\level\Position;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\level\particle\DustParticle;
use pocketmine\item\Item;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\Server;
use pocketmine\level\sound\BatSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\DoorSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\nbt\tag\ByteTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\ListTag;
use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\IntTag;
use pocketmine\math\Vector3;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\nbt\tag\ShortTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\command\Command;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\TranslationContainer;
use pocketmine\entity\Human;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\entity\Entity;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\protocol\PlayerActionPacket;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\network\protocol\MovePlayerPacket;
use pocketmine\event\entity\EntityLevelChangeEvent;
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

public function onDeath(PlayerDeathEvent $event){
$damage=$event->getDamage();
$health=$event->getDamager()->getHealth();
if($health<=$damage){
$player=$event->getDamager();
 $money = $this->getConfig()->get("money");
$player->sendMessage("You've Earned 8 Coins");
$this->addMoney($player->getName(), $money);
}
}
	
	
public function onRealDeath(PlayerDeathEvent $event)
    {
        $player = $event->getPlayer();
        $cause = $player->getLastDamageCause();
        if ($cause instanceof EntityDamageByEntityEvent) {
            $damager = $cause->getDamager();
            if ($damager instanceof Player) {
                $this->getServer()->getPluginManager()->getPlugin('EconomyAPI')->giveMoney($damager, 8);
            }
        }
    }
	
	public function onCommand(CommandSender $player, Command $cmd, $label, array $args) {
        switch($cmd->getName()){
        case "wizard":
		$p=$player->getName();
        $config = new Config($this->getDataFolder() . "/classes.yml", Config::YAML);
$class="Wizard";
          $config->set($p,$class);
					$config->save();
					$player->sendMessage("You have choosen the Wizard Class");
  return true;
	case "warrior":
			$p=$player->getName();
        $config = new Config($this->getDataFolder() . "/classes.yml", Config::YAML);
$class="Warrior";
          $config->set($p,$class);
					$config->save();
					$player->sendMessage("You have choosen the Warrior Class");
  return true;
	case "archer":
			$p=$player->getName();
        $config = new Config($this->getDataFolder() . "/classes.yml", Config::YAML);
$class="Archer";
          $config->set($p,$class);
					$config->save();
					$player->sendMessage("You have choosen the Archer Class");
  return true;
  case "xyz":
  	 $world=$player->getLevel()->getFolderName();
        $x=round($player->getX());
        $y=round($player->getY());
        $z=round($player->getZ());
			$player->sendMessage("{$world}Â§7, X:Â§9{$x}Â§7, Y:Â§9{$y}Â§7, Z:Â§9{$z}");
			return true;
	
        }}
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
		 $level=$p->getLevel();
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

