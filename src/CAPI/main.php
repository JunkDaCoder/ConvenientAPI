<?php
namespace CAPI;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock;
use pocketmine\Player;
use pocketmine\block\Block;
use pocketmine\level\level;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\entity\Effect;
use pocketmine\event\Listener;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\math\Vector3;
use pocketmine\Server;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\level\particle\Particle;

class main extends PluginBase implements Listener{

/*起動時&終了時*/
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getLogger()->info("§aロードしました。");
		$this->getLogger()->info("§6製作者:gigantessbeta(みやりん)");

}

	public function onDisable(){
		$this->getLogger()->info("§a終了しました。");
}


	public function PGiveItem($player, $id, $meta, $amount){
		$item = Item::get($id, $meta, $amount);
		$player->getInventory()->addItem($item);
}

	public function PTakeItem($player, $id, $meta, $amount){
		$item = Item::get($id, $meta, $amount);
		$player->getInventory()->removeItem($item);
}

	public function DItem($item, $x, $y, $z){
		$pos = new Vector3($x, $y, $z);
		$level->dropItem($pos,$item);
}

	public function setShougou($player, $shougou){
		$name = $player->getName();
		$player->setNameTag("§b[".$shougou."§b]§f".$name);
		$player->setDisplayName("§b[".$shougou."§b]§f".$name);
}

	public function setPName($player, $orgname){
		$player->setNameTag("".$orgname."");
		$player->setDisplayName("".$orgname."");
}

	public function PTP($player, $x, $y, $z, $level){
		$pos = new Position($x, $y, $z, $level);
		$player->teleport($pos);
}

	public function PHaveItem($player){
		$item = $player->getInventory()->getItemInHand();
			return $item;
}

	public function PEffect($player, $effectid, $strong, $time){
		$power = $strong - 1;
		$effect = Effect::getEffect($effectid);
		$effect->setDuration($time * 20);
		$effect->setAmplifier($power);
		$effect->setVisible(true);
		$player->addEffect($effect);
}
}