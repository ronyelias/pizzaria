<?php
/** @package    Pizzaria Meveana::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Cliente.php");

/**
 * ClienteController is the controller class for the Cliente object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Pizzaria Meveana::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class ClienteController extends AppBaseController
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
	 * Displays a list view of Cliente objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Cliente records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new ClienteCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Id,Nome,Telefone,Email,Referencia,Tipo,Docreceitafederal,Enderecos'
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

				$clientes = $this->Phreezer->Query('Cliente',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $clientes->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $clientes->TotalResults;
				$output->totalPages = $clientes->TotalPages;
				$output->pageSize = $clientes->PageSize;
				$output->currentPage = $clientes->CurrentPage;
			}
			else
			{
				// return all results
				$clientes = $this->Phreezer->Query('Cliente',$criteria);
				$output->rows = $clientes->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Cliente record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('id');
			$cliente = $this->Phreezer->Get('Cliente',$pk);
			$this->RenderJSON($cliente, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Cliente record and render response as JSON
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

			$cliente = new Cliente($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $cliente->Id = $this->SafeGetVal($json, 'id');

			$cliente->Nome = $this->SafeGetVal($json, 'nome');
			$cliente->Telefone = $this->SafeGetVal($json, 'telefone');
			$cliente->Email = $this->SafeGetVal($json, 'email');
			$cliente->Referencia = $this->SafeGetVal($json, 'referencia');
			$cliente->Tipo = $this->SafeGetVal($json, 'tipo');
			$cliente->Docreceitafederal = $this->SafeGetVal($json, 'docreceitafederal');
			$cliente->Enderecos = $this->SafeGetVal($json, 'enderecos');

			$cliente->Validate();
			$errors = $cliente->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$cliente->Save();
				$this->RenderJSON($cliente, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Cliente record and render response as JSON
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
			$cliente = $this->Phreezer->Get('Cliente',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $cliente->Id = $this->SafeGetVal($json, 'id', $cliente->Id);

			$cliente->Nome = $this->SafeGetVal($json, 'nome', $cliente->Nome);
			$cliente->Telefone = $this->SafeGetVal($json, 'telefone', $cliente->Telefone);
			$cliente->Email = $this->SafeGetVal($json, 'email', $cliente->Email);
			$cliente->Referencia = $this->SafeGetVal($json, 'referencia', $cliente->Referencia);
			$cliente->Tipo = $this->SafeGetVal($json, 'tipo', $cliente->Tipo);
			$cliente->Docreceitafederal = $this->SafeGetVal($json, 'docreceitafederal', $cliente->Docreceitafederal);
			$cliente->Enderecos = $this->SafeGetVal($json, 'enderecos', $cliente->Enderecos);

			$cliente->Validate();
			$errors = $cliente->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$cliente->Save();
				$this->RenderJSON($cliente, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Cliente record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('id');
			$cliente = $this->Phreezer->Get('Cliente',$pk);

			$cliente->Delete();

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
