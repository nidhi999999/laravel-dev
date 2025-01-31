<?php

namespace App\Livewire\Pages\Skills;

use Livewire\Component;
use App\Models\Skill;

class Index extends Component
{

    public $skills;
    public $name;
    public $skillId;
    public $isEdit = false;

    public function mount()
    {
        $this->skills = Skill::all();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->skillId = '';
        $this->isEdit = false;
    }

    public function addSkill()
    {
        $this->validate(['name' => 'required']);
        Skill::create(['name' => $this->name]);
        $this->resetFields();
        $this->skills = Skill::all();
        session()->flash('message', 'Skill added successfully!');
    }

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $this->skillId = $skill->id;
        $this->name = $skill->name;
        $this->isEdit = true;
    }

    public function updateSkill()
    {
        $this->validate(['name' => 'required']);
        $skill = Skill::findOrFail($this->skillId);
        $skill->update(['name' => $this->name]);
        $this->resetFields();
        $this->skills = Skill::all();
        session()->flash('message', 'Skill updated successfully!');
    }

    public function deleteSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        $this->skills = Skill::all();
        session()->flash('alert', 'Skill deleted successfully!');

    }

    public function render()
    {
        return view('livewire.pages.skills.index');
    }
}
