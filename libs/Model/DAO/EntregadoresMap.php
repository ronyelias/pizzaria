<?php
/** @package    Test::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * EntregadoresMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EntregadoresDAO to the entregadores datastore.
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
class EntregadoresMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","entregadores","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Nome"] = new FieldMap("Nome","entregadores","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Docreceita"] = new FieldMap("Docreceita","entregadores","docreceita",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Rg"] = new FieldMap("Rg","entregadores","rg",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","entregadores","telefone",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Empresa"] = new FieldMap("Empresa","entregadores","empresa",false,FM_TYPE_VARCHAR,50,null,false);
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