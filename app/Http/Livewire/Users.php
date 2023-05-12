<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Users extends Component
{

    //Component Properties
    public $users, $name, $email, $user_id, $password, $password_confirmation, $details;
    public $isOpen = 0;
    public $selectedRole = 0;
    public $role;

    //Validation Rules
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'role' => 'required'
    ];

    /**
     * Mount Method
     *
     * @return void
     */
    public function mount()
    {
        $this->loadUsers();
    }

    /**
     * Render Method
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        //Retrieve All Roles
        $roles = Role::pluck('name', 'id');
        return view('livewire.users', compact('roles'));

        // $this->users = User::all();
        // return view('livewire.users');
    }

    /**
     * Load users
     *
     * @return void
     */
    public function loadUsers()
    {
        $this->users = User::all();
    }

    /**
     * Create new user Modal
     *
     * @return void
     */
    public function create()
    {
        $this->resetInputFields();  //Reset the input fields
        $this->openModal(); //Open the modal
    }

    /**
     * Open modal
     *
     * @return void
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * Close modal
     *
     * @return void
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * Reset Input Fields
     *
     * @return void
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->user_id = '';
    }


    /**
     * Store User
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ];

        if ($this->selectedRole) {
            $role = Role::findOrFail($this->selectedRole);
            $user = User::updateOrCreate(['id' => $this->user_id], $userData);
            $user->syncRoles($role);
        } else {
            User::updateOrCreate(['id' => $this->user_id], $userData);
        }

        session()->flash(
            'message',
            $this->user_id ? 'User Updated Successfully.' : 'User Created Successfully.'
        );
        $this->closeModal();
        $this->resetInputFields();
        $this->loadUsers();
    }

    /**
     * Edit User and open the modal
     *
     * @param  int  $id
     * @return void
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->details = $user->detail;

        $this->openModal();
    }

    /**
     * Delete User
     *
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User Deleted Successfully.');
        $this->loadUsers();
    }

    /**
     * Update on property change
     *
     * @param  string  $propertyName
     * @return void
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules);
    }

    /**
     * Refresh the Livewire Datatable
     *
     * @return void
     */
    public function refreshLivewireDatatable()
    {
        $this->loadUsers(); // Refresh the users data
    }
}
