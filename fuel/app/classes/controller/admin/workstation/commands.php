<?php
class Controller_Admin_Workstation_Commands extends Controller_Admin
{

	public function action_index()
	{
		$data['workstation_commands'] = Model_Workstation_Command::find('all');
		$this->template->title = "Workstation_commands";
		$this->template->content = View::forge('admin/workstation/commands/index', $data);

	}

	public function action_view($id = null)
	{
		$data['workstation_command'] = Model_Workstation_Command::find($id);

		$this->template->title = "Workstation_command";
		$this->template->content = View::forge('admin/workstation/commands/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Workstation_Command::validate('create');

			if ($val->run())
			{
				$workstation_command = Model_Workstation_Command::forge(array(
					'command_key' => Input::post('command_key'),
					'workstation_id' => Input::post('workstation_id'),
					'executed' => Input::post('executed'),
					'valid_until' => Input::post('valid_until'),
					'group_key' => Input::post('group_key'),
					'sequence_number' => Input::post('sequence_number'),
					'executed_at' => Input::post('executed_at'),
				));

				if ($workstation_command and $workstation_command->save())
				{
					Session::set_flash('success', e('Added workstation_command #'.$workstation_command->id.'.'));

					Response::redirect('admin/workstation/commands');
				}

				else
				{
					Session::set_flash('error', e('Could not save workstation_command.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Workstation_Commands";
		$this->template->content = View::forge('admin/workstation/commands/create');

	}

	public function action_edit($id = null)
	{
		$workstation_command = Model_Workstation_Command::find($id);
		$val = Model_Workstation_Command::validate('edit');

		if ($val->run())
		{
			$workstation_command->command_key = Input::post('command_key');
			$workstation_command->workstation_id = Input::post('workstation_id');
			$workstation_command->executed = Input::post('executed');
			$workstation_command->valid_until = Input::post('valid_until');
			$workstation_command->group_key = Input::post('group_key');
			$workstation_command->sequence_number = Input::post('sequence_number');
			$workstation_command->executed_at = Input::post('executed_at');

			if ($workstation_command->save())
			{
				Session::set_flash('success', e('Updated workstation_command #' . $id));

				Response::redirect('admin/workstation/commands');
			}

			else
			{
				Session::set_flash('error', e('Could not update workstation_command #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$workstation_command->command_key = $val->validated('command_key');
				$workstation_command->workstation_id = $val->validated('workstation_id');
				$workstation_command->executed = $val->validated('executed');
				$workstation_command->valid_until = $val->validated('valid_until');
				$workstation_command->group_key = $val->validated('group_key');
				$workstation_command->sequence_number = $val->validated('sequence_number');
				$workstation_command->executed_at = $val->validated('executed_at');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('workstation_command', $workstation_command, false);
		}

		$this->template->title = "Workstation_commands";
		$this->template->content = View::forge('admin/workstation/commands/edit');

	}

	public function action_delete($id = null)
	{
		if ($workstation_command = Model_Workstation_Command::find($id))
		{
			$workstation_command->delete();

			Session::set_flash('success', e('Deleted workstation_command #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete workstation_command #'.$id));
		}

		Response::redirect('admin/workstation/commands');

	}

}
