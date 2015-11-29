<?php
/** @package    Test::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * PedidoCriteria allows custom querying for the Pedido object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Test::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PedidoCriteriaDAO extends Criteria
{

	public $Id_Equals;
	public $Id_NotEquals;
	public $Id_IsLike;
	public $Id_IsNotLike;
	public $Id_BeginsWith;
	public $Id_EndsWith;
	public $Id_GreaterThan;
	public $Id_GreaterThanOrEqual;
	public $Id_LessThan;
	public $Id_LessThanOrEqual;
	public $Id_In;
	public $Id_IsNotEmpty;
	public $Id_IsEmpty;
	public $Id_BitwiseOr;
	public $Id_BitwiseAnd;
	public $Datacriacao_Equals;
	public $Datacriacao_NotEquals;
	public $Datacriacao_IsLike;
	public $Datacriacao_IsNotLike;
	public $Datacriacao_BeginsWith;
	public $Datacriacao_EndsWith;
	public $Datacriacao_GreaterThan;
	public $Datacriacao_GreaterThanOrEqual;
	public $Datacriacao_LessThan;
	public $Datacriacao_LessThanOrEqual;
	public $Datacriacao_In;
	public $Datacriacao_IsNotEmpty;
	public $Datacriacao_IsEmpty;
	public $Datacriacao_BitwiseOr;
	public $Datacriacao_BitwiseAnd;
	public $Observacao_Equals;
	public $Observacao_NotEquals;
	public $Observacao_IsLike;
	public $Observacao_IsNotLike;
	public $Observacao_BeginsWith;
	public $Observacao_EndsWith;
	public $Observacao_GreaterThan;
	public $Observacao_GreaterThanOrEqual;
	public $Observacao_LessThan;
	public $Observacao_LessThanOrEqual;
	public $Observacao_In;
	public $Observacao_IsNotEmpty;
	public $Observacao_IsEmpty;
	public $Observacao_BitwiseOr;
	public $Observacao_BitwiseAnd;
	public $Dataentrega_Equals;
	public $Dataentrega_NotEquals;
	public $Dataentrega_IsLike;
	public $Dataentrega_IsNotLike;
	public $Dataentrega_BeginsWith;
	public $Dataentrega_EndsWith;
	public $Dataentrega_GreaterThan;
	public $Dataentrega_GreaterThanOrEqual;
	public $Dataentrega_LessThan;
	public $Dataentrega_LessThanOrEqual;
	public $Dataentrega_In;
	public $Dataentrega_IsNotEmpty;
	public $Dataentrega_IsEmpty;
	public $Dataentrega_BitwiseOr;
	public $Dataentrega_BitwiseAnd;
	public $Valorfrete_Equals;
	public $Valorfrete_NotEquals;
	public $Valorfrete_IsLike;
	public $Valorfrete_IsNotLike;
	public $Valorfrete_BeginsWith;
	public $Valorfrete_EndsWith;
	public $Valorfrete_GreaterThan;
	public $Valorfrete_GreaterThanOrEqual;
	public $Valorfrete_LessThan;
	public $Valorfrete_LessThanOrEqual;
	public $Valorfrete_In;
	public $Valorfrete_IsNotEmpty;
	public $Valorfrete_IsEmpty;
	public $Valorfrete_BitwiseOr;
	public $Valorfrete_BitwiseAnd;
	public $Valordesconto_Equals;
	public $Valordesconto_NotEquals;
	public $Valordesconto_IsLike;
	public $Valordesconto_IsNotLike;
	public $Valordesconto_BeginsWith;
	public $Valordesconto_EndsWith;
	public $Valordesconto_GreaterThan;
	public $Valordesconto_GreaterThanOrEqual;
	public $Valordesconto_LessThan;
	public $Valordesconto_LessThanOrEqual;
	public $Valordesconto_In;
	public $Valordesconto_IsNotEmpty;
	public $Valordesconto_IsEmpty;
	public $Valordesconto_BitwiseOr;
	public $Valordesconto_BitwiseAnd;
	public $Valortotal_Equals;
	public $Valortotal_NotEquals;
	public $Valortotal_IsLike;
	public $Valortotal_IsNotLike;
	public $Valortotal_BeginsWith;
	public $Valortotal_EndsWith;
	public $Valortotal_GreaterThan;
	public $Valortotal_GreaterThanOrEqual;
	public $Valortotal_LessThan;
	public $Valortotal_LessThanOrEqual;
	public $Valortotal_In;
	public $Valortotal_IsNotEmpty;
	public $Valortotal_IsEmpty;
	public $Valortotal_BitwiseOr;
	public $Valortotal_BitwiseAnd;
	public $Statuspedido_Equals;
	public $Statuspedido_NotEquals;
	public $Statuspedido_IsLike;
	public $Statuspedido_IsNotLike;
	public $Statuspedido_BeginsWith;
	public $Statuspedido_EndsWith;
	public $Statuspedido_GreaterThan;
	public $Statuspedido_GreaterThanOrEqual;
	public $Statuspedido_LessThan;
	public $Statuspedido_LessThanOrEqual;
	public $Statuspedido_In;
	public $Statuspedido_IsNotEmpty;
	public $Statuspedido_IsEmpty;
	public $Statuspedido_BitwiseOr;
	public $Statuspedido_BitwiseAnd;
	public $Formapagamento_Equals;
	public $Formapagamento_NotEquals;
	public $Formapagamento_IsLike;
	public $Formapagamento_IsNotLike;
	public $Formapagamento_BeginsWith;
	public $Formapagamento_EndsWith;
	public $Formapagamento_GreaterThan;
	public $Formapagamento_GreaterThanOrEqual;
	public $Formapagamento_LessThan;
	public $Formapagamento_LessThanOrEqual;
	public $Formapagamento_In;
	public $Formapagamento_IsNotEmpty;
	public $Formapagamento_IsEmpty;
	public $Formapagamento_BitwiseOr;
	public $Formapagamento_BitwiseAnd;
	public $Vendedor_Equals;
	public $Vendedor_NotEquals;
	public $Vendedor_IsLike;
	public $Vendedor_IsNotLike;
	public $Vendedor_BeginsWith;
	public $Vendedor_EndsWith;
	public $Vendedor_GreaterThan;
	public $Vendedor_GreaterThanOrEqual;
	public $Vendedor_LessThan;
	public $Vendedor_LessThanOrEqual;
	public $Vendedor_In;
	public $Vendedor_IsNotEmpty;
	public $Vendedor_IsEmpty;
	public $Vendedor_BitwiseOr;
	public $Vendedor_BitwiseAnd;
	public $Cliente_Equals;
	public $Cliente_NotEquals;
	public $Cliente_IsLike;
	public $Cliente_IsNotLike;
	public $Cliente_BeginsWith;
	public $Cliente_EndsWith;
	public $Cliente_GreaterThan;
	public $Cliente_GreaterThanOrEqual;
	public $Cliente_LessThan;
	public $Cliente_LessThanOrEqual;
	public $Cliente_In;
	public $Cliente_IsNotEmpty;
	public $Cliente_IsEmpty;
	public $Cliente_BitwiseOr;
	public $Cliente_BitwiseAnd;
	public $Enderecoentrega_Equals;
	public $Enderecoentrega_NotEquals;
	public $Enderecoentrega_IsLike;
	public $Enderecoentrega_IsNotLike;
	public $Enderecoentrega_BeginsWith;
	public $Enderecoentrega_EndsWith;
	public $Enderecoentrega_GreaterThan;
	public $Enderecoentrega_GreaterThanOrEqual;
	public $Enderecoentrega_LessThan;
	public $Enderecoentrega_LessThanOrEqual;
	public $Enderecoentrega_In;
	public $Enderecoentrega_IsNotEmpty;
	public $Enderecoentrega_IsEmpty;
	public $Enderecoentrega_BitwiseOr;
	public $Enderecoentrega_BitwiseAnd;
	public $Itempedido_Equals;
	public $Itempedido_NotEquals;
	public $Itempedido_IsLike;
	public $Itempedido_IsNotLike;
	public $Itempedido_BeginsWith;
	public $Itempedido_EndsWith;
	public $Itempedido_GreaterThan;
	public $Itempedido_GreaterThanOrEqual;
	public $Itempedido_LessThan;
	public $Itempedido_LessThanOrEqual;
	public $Itempedido_In;
	public $Itempedido_IsNotEmpty;
	public $Itempedido_IsEmpty;
	public $Itempedido_BitwiseOr;
	public $Itempedido_BitwiseAnd;

}

?>