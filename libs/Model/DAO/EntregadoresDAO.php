<?php
/** @package Test::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("EntregadoresMap.php");

/**
 * EntregadoresDAO provides object-oriented access to the entregadores table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Test::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class EntregadoresDAO extends Phreezable
{
	/** @var int */
	public $Id;

	/** @var string */
	public $Nome;

	/** @var string */
	public $Docreceita;

	/** @var string */
	public $Rg;

	/** @var string */
	public $Telefone;

	/** @var string */
	public $Empresa;



}
?>