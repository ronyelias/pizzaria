<?php
/** @package    Test::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * EnderecoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the EnderecoDAO to the endereco datastore.
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
class EnderecoMap implements IDaoMap, IDaoMap2
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
			self::$FM["Id"] = new FieldMap("Id","endereco","id",true,FM_TYPE_INT,11,null,true);
			self::$FM["Logradouro"] = new FieldMap("Logradouro","endereco","logradouro",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Numero"] = new FieldMap("Numero","endereco","numero",false,FM_TYPE_INT,11,null,false);
			self::$FM["Complemento"] = new FieldMap("Complemento","endereco","complemento",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","endereco","cidade",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Uf"] = new FieldMap("Uf","endereco","uf",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","endereco","cep",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Cliente"] = new FieldMap("Cliente","endereco","cliente",false,FM_TYPE_VARCHAR,10,null,false);
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