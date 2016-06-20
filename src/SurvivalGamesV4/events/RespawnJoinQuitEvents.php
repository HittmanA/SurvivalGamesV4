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
class RespawnJoinQuitEvents{
 	public function respawnWithEffects(PlayerRespawnEvent $e){
 		$p = $this->pl;
 		$s = Effect::getEffect(1);
 		$j = Effect::getEffect(8);
		$s->setDuration(2184728365782365723642365723652);
		$j->setDuration(2184728365782365723642365723652); 
		$s->setVisible(true);
		$j->setVisible(true);
		$s->setAmplifier(3);
		$j->setAmplifier(3);
		$p->addEffect($s);
		$p->addEffect($j);
 	}
   	public function giveRandomKit(PlayerJoinEvent $e){
		$config = new Config($this->plugin->getDataFolder() . "/config.yml", Config::YAML);
		if($config->get("RandomKit") === true){	
			$p = $e->getPlayer();
			$kit = rand(1,10);
			switch($kit){
				case 1:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."VIP+".C::DARK_AQUA." Kit!");
					$this->p1 = $p;
				break;
			
				case 2:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Beginnerz".C::DARK_AQUA." Kit!");
					$this->p2 = $p;
				break;
			
				case 3:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Athlete".C::DARK_AQUA." Kit!");
					$this->p3 = $p;
				break;
			
				case 4:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Rabbit".C::DARK_AQUA." Kit!");
					$this->p4 = $p;
				break;
				
				case 5:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Midas".C::DARK_AQUA." Kit!");
					$this->p5 = $p;
				break;
			
				case 6:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Hyper Mongols".C::DARK_AQUA." Kit!");
					$this->p6 = $p;
				break;
				
				case 7:
					$p->getInventory()->addItem(Item::get(311,0,1));
					
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Tank".C::DARK_AQUA." Kit!");
					$this->p7 = $p;
				break;
				
				case 8:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Ninja".C::DARK_AQUA." Kit!");
					$this->p8 = $p;
				break;
				
				case 9:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Ninja".C::DARK_AQUA." Kit!");
					$this->p9 = $p;
				break;
				
				case 10:
					$p->sendMessage(C::DARK_AQUA."You Randomly Got The ".C::YELLOW."Samurai".C::DARK_AQUA." Kit!");
					$this->p10 = $p;
				break;
			}
		}
	}
	
	public function giveKits(){
		$p1 = $this->p1;
		$p2 = $this->p2;
		$p3 = $this->p3;
		$p4 = $this->p4;
		$p5 = $this->p5;
		$p6 = $this->p6;
		$p7 = $this->p7;
		$p8 = $this->p8;
		$p9 = $this->p9;
		$p10 = $this->p10;
		
		$p1->getInventory()->addItem(Item::get(302,0,1));
		$p1->getInventory()->addItem(Item::get(303,0,1));
		$p1->getInventory()->addItem(Item::get(304,0,1));
		$p1->getInventory()->addItem(Item::get(305,0,1));
		$p1->getInventory()->addItem(Item::get(279,0,1));
		
		$p2->getInventory()->addItem(Item::get(298,0,1));
		$p2->getInventory()->addItem(Item::get(299,0,1));
		$p2->getInventory()->addItem(Item::get(300,0,1));
		$p2->getInventory()->addItem(Item::get(301,0,1));
		$p2->getInventory()->addItem(Item::get(268,0,1));
		
		$effect = Effect::getEffect(1);
		$effect->setDuration(2184728365782365723642365723652); 
		$effect->setVisible(true);
		$effect->setAmplifier(2);
		$p3->addEffect($effect);
		$effect2 = Effect::getEffect(8);
		$effect2->setDuration(2184728365782365723642365723652); 
		$effect2->setVisible(true);
		$effect2->setAmplifier(3);
		$p3->addEffect($effect2);
		$p3->getInventory()->addItem(Item::get(311,0,1));
		
		$ef = Effect::getEffect(8);
		$ef->setDuration(2184728365782365723642365723652); 
		$ef->setVisible(true);
		$ef->setAmplifier(4);
		$p4->addEffect($ef);
		$p4->getInventory()->addItem(Item::get(293,0,1));
		
		$p5->getInventory()->addItem(Item::get(314,0,1));
		$p5->getInventory()->addItem(Item::get(315,0,1));
		$p5->getInventory()->addItem(Item::get(316,0,1));
		$p5->getInventory()->addItem(Item::get(317,0,1));
		$p5->getInventory()->addItem(Item::get(283,0,2));
		$p5->getInventory()->addItem(Item::get(322,0,5));
		
		$p6->getInventory()->addItem(Item::get(261,0,1));
		$p6->getInventory()->addItem(Item::get(262,0,64));
		$p6->getInventory()->addItem(Item::get(354,0,5));
		
		$p7->getInventory()->addItem(Item::get(311,0,1));
		
		$p8->getInventory()->addItem(Item::get(293,0,1));
		$p8->getInventory()->addItem(Item::get(298,0,1));
		$p8->getInventory()->addItem(Item::get(299,0,1));
		$p8->getInventory()->addItem(Item::get(300,0,1));
		$p8->getInventory()->addItem(Item::get(301,0,1));
		
		$p9->getInventory()->addItem(Item::get(293,0,1));
		$p9->getInventory()->addItem(Item::get(298,0,1));
		$p9->getInventory()->addItem(Item::get(299,0,1));
		$p9->getInventory()->addItem(Item::get(300,0,1));
		$p9->getInventory()->addItem(Item::get(301,0,1));
		
		
		$p10->getInventory()->addItem(Item::get(306,0,1));
		$p10->getInventory()->addItem(Item::get(307,0,1));
		$p10->getInventory()->addItem(Item::get(308,0,1));
		$p10->getInventory()->addItem(Item::get(309,0,1));
	}
	public function onQuit(PlayerQuitEvent $e){
		$aop = count($level->getPlayers());
		$minusplayer = 1;
		$second = $aop - $minusplayer . "/ 24";
	}
}
