<?php
/** @package    Test::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Cliente object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Test::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `cliente` table
	public $CustomFieldExample;

	public $Id;
	public $Nome;
	public $Telefone;
	public $Email;
	public $Referencia;
	public $Tipo;
	public $Docreceitafederal;
	public $Enderecos;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`cliente`.`id` as Id
			,`cliente`.`nome` as Nome
			,`cliente`.`telefone` as Telefone
			,`cliente`.`email` as Email
			,`cliente`.`referencia` as Referencia
			,`cliente`.`tipo` as Tipo
			,`cliente`.`docReceitafederal` as Docreceitafederal
			,`cliente`.`enderecos` as Enderecos
		from `cliente`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `cliente`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>