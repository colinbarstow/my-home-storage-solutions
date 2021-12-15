<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\UnitStyle;
use Livewire\Component;

class StorageConfiguratorManager extends Component
{
    public $unitStyles;
    public $materials;
    public $unitStylesPanel = false;
    public $materialsPanel = false;
    public $doorsPanel = false;
    public $hingesPanel = false;
    public $handlesPanel = false;
    public $unitStyleEditForm = false;
    public $materialUploadForm = false;
    public $doorUploadForm = false;
    public $hingeUploadForm = false;
    public $handleUploadForm = false;

    public function mount()
    {
        $this->materials = Material::all();
        $this->unitStyles = UnitStyle::all();
    }

    public function showUnitStylesPanel(){ $this->hideAllPanels(); $this->unitStylesPanel = true; }
    public function showMaterialsPanel(){ $this->hideAllPanels(); $this->materialsPanel = true; }
    public function showDoorsPanel(){ $this->hideAllPanels(); $this->doorsPanel = true; }
    public function showHingesPanel(){ $this->hideAllPanels(); $this->hingesPanel = true; }
    public function showHandlesPanel(){ $this->hideAllPanels(); $this->handlesPanel = true; }
    public function showUnitStyleUploadForm(){ $this->unitStyleEditForm = true; }
    public function showMaterialUploadForm(){ $this->materialUploadForm = true; }
    public function showDoorUploadForm(){ $this->doorUploadForm = true; }
    public function showHingeUploadForm(){ $this->hingeUploadForm = true; }
    public function showHandleUploadForm(){ $this->handleUploadForm = true; }
    public function hideMaterialUploadForm(){ $this->materialUploadForm = false; }
    public function hideDoorUploadForm(){ $this->doorUploadForm = false; }
    public function hideHingeUploadForm(){ $this->hingeUploadForm = false; }
    public function hideHandleUploadForm(){ $this->handleUploadForm = false; }

    private function hideAllPanels()
    {
        $this->unitStylesPanel = false;
        $this->materialsPanel = false;
        $this->doorsPanel = false;
        $this->hingesPanel = false;
        $this->handlesPanel = false;
    }

    public function render()
    {
        return view('livewire.storage-configurator-manager');
    }
}
