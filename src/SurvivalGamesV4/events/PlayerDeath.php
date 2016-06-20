<?php

#  ad88888ba    ,ad8888ba,  8b           d8      ,d8  
# d8"     "8b  d8"'    `"8b `8b         d8'    ,d888    
# Y8,         d8'            `8b       d8'   ,d8" 88    
# `Y8aaaaa,   88              `8b     d8'  ,d8"   88    
#   `"""""8b, 88      88888    `8b   d8' ,d8"     88    
#         `8b Y8,        88     `8b d8'  8888888888888  
# Y8a     a8P  Y8a.    .a88      `888'            88    
#  "Y88888P"    `"Y88888P"        `8'             88    

namespace SurvivalGamesV4\events;


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

class PlayerDeath{
  public function PlayerDeath(PlayerDeathEvent $event){
          	foreach($this->getServer()->getOnlinePlayers() as $pl){
	  		$config = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
                 	if($config->get("lightning_effect")=="ON"){
              			$p = $event->getEntity();
          			$light = new AddEntityPacket();
          			$light->type = 93;
          			$light->eid = Entity::$entityCount++;
          			$light->metadata = array();
          			$light->speedX = 0;
          			$light->speedY = 0;
          			$light->speedZ = 0;
          			$light->x = $p->x;
          			$light->y = $p->y;
          			$light->z = $p->z;
          			$pl->dataPacket($light);
        			$event->setDeathMessage("§7" . $p->getName() . " was demolished ");
        			if($pl->hasEffect(1) && $pl->hasEffect(8)){
        				$this->pl = $pl;
        			}else{
        				if($pl->hasEffect(1) || $pl->hasEffect(8)){
        					$this->pl = $pl;
        				}
        			}
          		}
 		}
 	}
 }
