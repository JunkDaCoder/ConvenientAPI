# ConvenientAPI
PMMPプラグイン開発初心者向けの便利API

##利用方法<br>

###必ずやること <br>

　作成するプラグインの
  public function on Enable(){
  の中に
  $this->CAPI = $this->getServer()->getPluginManager()->getPlugin("ConvenientAPI");
  と記入してください。

例))
public function on Enable(){
	$this->getServer()->getPluginManager()->registerEvents($this,$this);
	$this->CAPI = $this->getServer()->getPluginManager()->getPlugin("ConvenientAPI");
}


〇使えるようになるコード

 < プレイヤーにアイテムを付与 >
PGiveItem($player, $id, $meta, $amount)

$playerはプレイヤーオブジェクト
$id、$metaはアイテムのidとmeta値を代入
$amountは個数を代入してください。


 < プレイヤーのアイテム没収 >
PTakeItem($player, $id, meta, $amount)

$playerはプレイヤーオブジェクト
$id、$metaはアイテムのidとmeta値を代入
$amountは個数を代入してください。


 < 指定座標にアイテム落とす >
Ditem($item, $x, $y, $z)

$itemにはアイテムオブジェクト
$x$y$zにはそれぞれの座標を代入


 < 称号を付与 >
setShougou($player, $shougou)

$playrはプレイヤーオブジェクト
$shougouにはつけたい称号を代入
※称号は保存されないので、使用するプラグインのconfigに保存するなりしてください。


 < プレイヤーの名前を変更 >
setPName($player, $orgname)

$playerには...ってもうわかるか（笑）
$orgnameにはつけたい名前を代入
※称号と同様に保存されないので、使用するプラグインのconfigに保存するなりしてください。


 < プレイヤーをテレポート >
PTP($player, $x, $y, $z, $level)

$levelにはlevelオブジェクトを代入


< 持っているアイテムを取得 >
PhaveItem($player)


>>new CODE
 < プレイヤーにエフェクトを付与>
PEffect($player, $effectid, $strong, $time)

$effectidにはエフェクトIDを代入
$strongにはエフェクトの強さ(レベル)を代入
$timeには、付与する時間を代入


〇使用例

))プレイヤーにダイヤを1個あげる場合
	
$player = $event->getPlayer();
	$this->CAPI->PGiveItem($player, 264, 0, 1);

