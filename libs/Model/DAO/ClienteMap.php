<?php
/** @package    Test::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ClienteMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ClienteDAO to the cliente datastore.
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
class ClienteMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","cliente","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Nome"] = new FieldMap("Nome","cliente","nome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Telefone"] = new FieldMap("Telefone","cliente","telefone",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Email"] = new FieldMap("Email","cliente","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Referencia"] = new FieldMap("Referencia","cliente","referencia",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Tipo"] = new FieldMap("Tipo","cliente","tipo",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Docreceitafederal"] = new FieldMap("Docreceitafederal","cliente","docReceitafederal",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Enderecos"] = new FieldMap("Enderecos","cliente","enderecos",false,FM_TYPE_VARCHAR,200,null,false);
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