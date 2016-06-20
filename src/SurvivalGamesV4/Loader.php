<?php


#  ad88888ba    ,ad8888ba,  8b           d8      ,d8  
# d8"     "8b  d8"'    `"8b `8b         d8'    ,d888    
# Y8,         d8'            `8b       d8'   ,d8" 88    
# `Y8aaaaa,   88              `8b     d8'  ,d8"   88    
#   `"""""8b, 88      88888    `8b   d8' ,d8"     88    
#         `8b Y8,        88     `8b d8'  8888888888888  
# Y8a     a8P  Y8a.    .a88      `888'            88    
#  "Y88888P"    `"Y88888P"        `8'             88    

namespace SurvivalGamesV4;


use SurvivalGamesV4\events\BlockBreak;
use SurvivalGamesV4\events\Interact;
use SurvivalGamesV4\events\MoveDamageEvents;
use SurvivalGamesV4\events\PlayerChat;
use SurvivalGamesV4\events\PlayerDeath;
use SurvivalGamesV4\events\RemoveEffects;
use SurvivalGamesV4\events\RespawnJoinQuitEvents;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\Listener;
use pocketmine\level\sound\TNTPrimeSound;
use pocketmine\level\sound\PopSound;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\block\Block;
use pocketmine\tile\Sign;
use pocketmine\level\Level;
use pocketmine\item\Item;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\entity\Effect;
use pocketmine\event\entity\EntityLevelChangeEvent ; 
use pocketmine\tile\Chest;
use pocketmine\inventory\ChestInventory;
use pocketmine\event\plugin\PluginEvent;
use pocketmine\entity\Entity;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Loader extends PluginBase{
  public $prefix;
	public $mode = 0;
	public $arenas = array();
	public $currentLevel = "";
	public $pl;
	public $format1;
	
	public function onLoad(){
	  
    $this->getServer()->getPluginManager()->registerEvents($this ,$this);
		$this->saveResource("/ranks.yml");
		$this->saveResource("/config.yml");
		$this->saveResource("/vips.yml");
		@mkdir($this->getDataFolder());
		$config2 = new Config($this->getDataFolder() . "/vips.yml", Config::YAML);
		$config2->save();
		$config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
		if($config2->get("vips") == null){
			$vips = array();
			$config2->set("vips",$vip);
		}
		if($config->get("arenas")!=null)
		{
			$this->arenas = $config->get("arenas");
		}
		foreach($this->arenas as $lev)
		{
			if($lev instanceof Level){
				$this->getServer()->loadLevel($lev);
			}
		}
		$items = array(array(261,0,1),array(262,0,2),array(262,0,3),array(267,0,1),array(268,0,1),array(272,0,1),array(276,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1),array(283,0,1));
		if($config->get("chestitems") == null)
		{
			$config->set("chestitems",$items);
		}
                if($config->get("lightning_effect") == null){
                $config->set("lightning_effect","ON");
                }
		$config->save();
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new GameSender($this), 20);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new RefreshSigns($this), 10);
		$this->prefix = $config->get("SG_Prefix");
		$this->format1 = $config->get("TextMod1");
		$this->getLogger()->info(C::GREEN . "SurvivalGamesV4 (V4.1) Sucessfully Loaded!");
	}
	public function onEnable(){
	  $this->getServer()->getPluginManager()->registerEvents($this ,$this);
	  $this->getLogger()->info(C::GREEN . "SurvivalGamesV4 (V4.1) has Sucessfully Enabled!");
	}
	public function onDisable(){
	  $this->saveResource("/ranks.yml");
		$this->saveResource("/config.yml");
		$this->saveResource("/vips.yml");
		$this->getLogger()->info(C::DARK_RED . "SurvivalGamesV4 (V4.1) has Sucessfully Disabled!")
	}
}
