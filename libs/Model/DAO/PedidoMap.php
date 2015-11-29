<?php
/** @package    Test::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PedidoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PedidoDAO to the pedido datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Test::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PedidoMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Id"] = new FieldMap("Id","pedido","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Datacriacao"] = new FieldMap("Datacriacao","pedido","datacriacao",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Observacao"] = new FieldMap("Observacao","pedido","observacao",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Dataentrega"] = new FieldMap("Dataentrega","pedido","dataentrega",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Valorfrete"] = new FieldMap("Valorfrete","pedido","valorfrete",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Valordesconto"] = new FieldMap("Valordesconto","pedido","valordesconto",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Valortotal"] = new FieldMap("Valortotal","pedido","valortotal",false,FM_TYPE_DECIMAL,10.2,null,false);
			self::$FM["Statuspedido"] = new FieldMap("Statuspedido","pedido","statuspedido",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Formapagamento"] = new FieldMap("Formapagamento","pedido","formapagamento",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Vendedor"] = new FieldMap("Vendedor","pedido","vendedor",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Cliente"] = new FieldMap("Cliente","pedido","cliente",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Enderecoentrega"] = new FieldMap("Enderecoentrega","pedido","enderecoentrega",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Itempedido"] = new FieldMap("Itempedido","pedido","itempedido",false,FM_TYPE_VARCHAR,10,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>