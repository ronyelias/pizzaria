<?php
/** @package    Pizzaria Meveana::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Itempedido.php");

/**
 * ItempedidoController is the controller class for the Itempedido object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Pizzaria Meveana::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ItempedidoController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Itempedido objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Itempedido records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ItempedidoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Quantidade,Valorunitario,Produto,Pedido'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$itempedidos = $this->Phreezer->Query('Itempedido',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $itempedidos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $itempedidos->TotalResults;
				$output->totalPages = $itempedidos->TotalPages;
				$output->pageSize = $itempedidos->PageSize;
				$output->currentPage = $itempedidos->CurrentPage;
			}
			else
			{
				// return all results
				$itempedidos = $this->Phreezer->Query('Itempedido',$criteria);
				$output->rows = $itempedidos->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Itempedido record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$itempedido = $this->Phreezer->Get('Itempedido',$pk);
			$this->RenderJSON($itempedido, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Itempedido record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$itempedido = new Itempedido($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $itempedido->Id = $this->SafeGetVal($json, 'id');

			$itempedido->Quantidade = $this->SafeGetVal($json, 'quantidade');
			$itempedido->Valorunitario = $this->SafeGetVal($json, 'valorunitario');
			$itempedido->Produto = $this->SafeGetVal($json, 'produto');
			$itempedido->Pedido = $this->SafeGetVal($json, 'pedido');

			$itempedido->Validate();
			$errors = $itempedido->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$itempedido->Save();
				$this->RenderJSON($itempedido, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Itempedido record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('id');
			$itempedido = $this->Phreezer->Get('Itempedido',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $itempedido->Id = $this->SafeGetVal($json, 'id', $itempedido->Id);

			$itempedido->Quantidade = $this->SafeGetVal($json, 'quantidade', $itempedido->Quantidade);
			$itempedido->Valorunitario = $this->SafeGetVal($json, 'valorunitario', $itempedido->Valorunitario);
			$itempedido->Produto = $this->SafeGetVal($json, 'produto', $itempedido->Produto);
			$itempedido->Pedido = $this->SafeGetVal($json, 'pedido', $itempedido->Pedido);

			$itempedido->Validate();
			$errors = $itempedido->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$itempedido->Save();
				$this->RenderJSON($itempedido, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Itempedido record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$itempedido = $this->Phreezer->Get('Itempedido',$pk);

			$itempedido->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
