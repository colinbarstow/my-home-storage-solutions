<div>
    <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="card card-custom">
                <div class="card-body">
                    <ul style="list-style-type: none;">
                        <li style="margin-bottom: 10px">
                            <button wire:click="showUnitStylesPanel" class="btn @if($unitStylesPanel) btn-success @else btn-primary @endif">Materials</button>
                        </li>
                        <li style="margin-bottom: 10px">
                            <button wire:click="showMaterialsPanel" class="btn @if($materialsPanel) btn-success @else btn-primary @endif">Materials</button>
                        </li>
                        <li style="margin-bottom: 10px">
                            <button wire:click="showDoorsPanel" class="btn @if($doorsPanel) btn-success @else btn-primary @endif">Doors</button>
                        </li>
                        <li style="margin-bottom: 10px">
                            <button wire:click="showHingesPanel" class="btn @if($hingesPanel) btn-success @else btn-primary @endif">Hinges</button>
                        </li>
                        <li style="margin-bottom: 10px">
                            <button wire:click="showHandlesPanel" class="btn @if($handlesPanel) btn-success @else btn-primary @endif">Handles</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9">
            <div class="card card-custom" style="display: @if($unitStylesPanel) block @else none @endif">
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Unit styles</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Manage your storage configurator unit styles</span>
                    </div>
                </div>
                <div class="card-body">
                    <p>
                        Your storage configurator uses unit styles to give your customers a base to begin with.
                        <br>
                        Unit styles can be edited but they can not be created, if you wish to add further unit styles please contact Colin.
                        <br>
                    </p>
                    <h6>Unit styles</h6>
                    <div class="row" style="margin-bottom: 10px">
                        @foreach($unitStyles as $unitStyle)
                            <div class="col-lg-3">
                                <h6>{{ $unitStyle->title }}</h6>
                                <img src="{{ Storage::url($unitStyle->image) }}" width="100%">
                            </div>
                        @endforeach
                    </div>
                    <hr>

                    @if($unitStyleEditForm)
                        <div>
                            <h6>Upload a new material</h6>

                            <form class="row" action="{{ route('admin.store-material') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Material Name</label>

                                        <input class="form-control" name="title" type="text" value="{{ old('title') }}">

                                        @error('title')
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Ambient occlusion map</label>

                                        <input class="form-control" name="ambient_occlusion_map" type="file" value="{{ old('ambient_occlusion_map') }}">

                                        @error('ambient_occlusion_map')
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Height map</label>

                                        <input class="form-control" name="height_map" type="file" value="{{ old('height_map') }}">

                                        @error('height_map')
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Normal map</label>

                                        <input class="form-control" name="normal_map" type="file" value="{{ old('normal_map') }}">

                                        @error('normal_map')
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Roughness map</label>

                                        <input class="form-control" name="roughness_map" type="file" value="{{ old('roughness_map') }}">

                                        @error('roughness_map')
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Colour map</label>

                                        <input class="form-control" name="colour_map" type="file" value="{{ old('colour_map') }}">

                                        @error('colour_map')
                                        <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button class="btn btn-primary" style="float:right">Upload Material</button>
                                    <button type="button" class="btn btn-danger" wire:click="hideMaterialUploadForm" style="float:right; margin-right: 10px">Cancel upload</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <button class="btn btn-primary" wire:click="showUnitStyleUploadForm">Upload a new material</button>
                    @endif

                </div>
            </div>
            <div class="card card-custom" style="display: @if($materialsPanel) block @else none @endif">
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Materials</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Manage your storage configurator materials</span>
                    </div>
                </div>
                <div class="card-body">
                    <p>
                        Your storage configurator uses materials to show customers realistic finishes. As you begin to offer different finishes for your storage units. You can also add them to the storage configurator.
                        <br>
                        Materials are a very specific file type and can only be uploaded one way.
                        <br>
                        You must provide the 5 files that build the material using the form below.
                        When the material has successfully been uploaded the user will be able to use the material when using the storage configurator.
                    </p>
                    <h6>Existing Materials</h6>
                    <div class="row" style="margin-bottom: 10px">
                        @forelse($materials as $material)
                            <div class="col-lg-3">
                                <h6>{{ $material->title }}</h6>
                                <img src="{{ Storage::url($material->colour_map) }}" width="100%">
                            </div>
                        @empty
                            <div class="col-lg-3">
                                <small>You haven't uploaded any materials yet</small>
                            </div>
                        @endforelse
                    </div>
                    <hr>

                    @if($materialUploadForm)
                        <div>
                            <h6>Upload a new material</h6>

                            <form class="row" action="{{ route('admin.store-material') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Material Name</label>

                                        <input class="form-control" name="title" type="text" value="{{ old('title') }}">

                                        @error('title')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Ambient occlusion map</label>

                                        <input class="form-control" name="ambient_occlusion_map" type="file" value="{{ old('ambient_occlusion_map') }}">

                                        @error('ambient_occlusion_map')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Height map</label>

                                        <input class="form-control" name="height_map" type="file" value="{{ old('height_map') }}">

                                        @error('height_map')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Normal map</label>

                                        <input class="form-control" name="normal_map" type="file" value="{{ old('normal_map') }}">

                                        @error('normal_map')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Roughness map</label>

                                        <input class="form-control" name="roughness_map" type="file" value="{{ old('roughness_map') }}">

                                        @error('roughness_map')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Colour map</label>

                                        <input class="form-control" name="colour_map" type="file" value="{{ old('colour_map') }}">

                                        @error('colour_map')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button class="btn btn-primary" style="float:right">Upload Material</button>
                                    <button type="button" class="btn btn-danger" wire:click="hideMaterialUploadForm" style="float:right; margin-right: 10px">Cancel upload</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <button class="btn btn-primary" wire:click="showMaterialUploadForm">Upload a new material</button>
                    @endif

                </div>
            </div>
            <div class="card card-custom" style="display: @if($doorsPanel) block @else none @endif">
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Doors</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Manage your storage configurator doors</span>
                    </div>
                </div>
                <div class="card-body">
                    <p>
                        There are three different door types. All of which have their own specific properties.
                        <br><br>
                        The first door type is classed as a sliding door.
                        This type of door features:
                        A sliding animation to open and close the door.
                        The doors are also positioned with the correct recess into the unit to allow for the doors to slide behind and infront of each other.
                        <br><br>
                        The second door type is hinged.
                        This type of door features:
                        A hinge based animation to open and close the door.
                        The ability to have different hinges.
                        These doors are positioned on the outside front edge of the storage unit.
                        <br><br>
                        The third door type is no doors.
                        This type of door is simply empty and does not add any visuals to the storage unit.
                        <br><br>
                        Doors are rendered automatically based on the dimensions of the unit and the door type selected.
                        This means that doors can not be added as physical objects.
                        however you can use this section to configure different types of doors, including edges, cutaways etc.
                    </p>

                    <h6>Existing Doors</h6>
                    <div class="row" style="margin-bottom: 10px">
                        @forelse($materials as $material)
                            <div class="col-lg-3">
                                <h6>{{ $material->title }}</h6>
                            </div>
                        @empty
                            <div class="col-lg-3">
                                <small>You haven't uploaded any doors yet</small>
                            </div>
                        @endforelse
                    </div>
                    <hr>
                    @if($doorUploadForm)
                        <h6>Upload a new door</h6>

                        <form class="row" action="{{ route('admin.store-material') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Material Name</label>

                                <input class="form-control" name="title" type="text" value="{{ old('title') }}">

                                @error('title')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Ambient occlusion map</label>

                                <input class="form-control" name="ambient_occlusion_map" type="file" value="{{ old('ambient_occlusion_map') }}">

                                @error('ambient_occlusion_map')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Height map</label>

                                <input class="form-control" name="height_map" type="file" value="{{ old('height_map') }}">

                                @error('height_map')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Normal map</label>

                                <input class="form-control" name="normal_map" type="file" value="{{ old('normal_map') }}">

                                @error('normal_map')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Roughness map</label>

                                <input class="form-control" name="roughness_map" type="file" value="{{ old('roughness_map') }}">

                                @error('roughness_map')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Colour map</label>

                                <input class="form-control" name="colour_map" type="file" value="{{ old('colour_map') }}">

                                @error('colour_map')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-primary" style="float:right">Upload Material</button>
                            <button type="button" class="btn btn-danger" wire:click="hideDoorUploadForm" style="float:right; margin-right: 10px">Cancel upload</button>
                        </div>
                    </form>
                    @else
                        <button class="btn btn-primary" wire:click="showDoorUploadForm">Upload a new door</button>
                    @endif
                </div>
            </div>
            <div class="card card-custom" style="display: @if($hingesPanel) block @else none @endif">
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Hinges</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Manage your storage configurator hinges</span>
                    </div>
                </div>

                <div class="card-body">
                    <p>
                        As mentioned before the storage configurator dynamically builds the storage unit based on the users inputted details.
                        Hinges are an exception and these are rendered onto the storage configurator using pre-built models.
                        <br>
                        From this section you can manage and upload hinges

                        The file form required for hinges is glTF (GL Transmission Format). Both .GLB and .GLTF versions of the format are supported.
                        Why this format? Because glTF is focused on runtime asset delivery, it is compact to transmit and fast to load.
                        <br><br>
                        Your objects should/can include: meshes, materials, textures.
                        <br><br>
                        It is very important that your objects do not contain lights or cameras else this will effect the way they render in relation
                        to the dynamically built object.
                        <br><br>
                        <b>
                            IMPORTANT! When constructing the model please interpret the unit scale as millimeters, as this is how the system handles size.
                            for example if your model has a scale of 100 x 50 x 5. This will be interpreted by the system as mms.
                            You will also be asked to define a set of rules in regards to hinges, for example what doors they can be applied to.
                            By default they can only be applied to doors that open on a hinge and for obvious reasons they can not be applied to sliding doors.

                        </b>
                        <br><br>
                        You will also be asked to supple positions, for example a hinge that is applied to a door will need to know where it exists in the 3d space.
                        This means things such as how many hinges there will be per door, how far from the top the first hinge will be and the equal space between hinges.
                    </p>
                    <h6>Existing Hinges</h6>
                    <div class="row" style="margin-bottom: 10px">
                        @forelse($materials as $material)
                            <div class="col-lg-3">
                                <h6>{{ $material->title }}</h6>
                            </div>
                        @empty
                            <div class="col-lg-3">
                                <small>You haven't uploaded any hinges yet</small>
                            </div>
                        @endforelse
                    </div>
                    <hr>

                    @if($hingeUploadForm)
                        <h6>Upload a new hinge</h6>

                        <form class="row" action="{{ route('admin.store-material') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Material Name</label>

                                    <input class="form-control" name="title" type="text" value="{{ old('title') }}">

                                    @error('title')
                                    <span class="invalid-feedback">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Ambient occlusion map</label>

                                    <input class="form-control" name="ambient_occlusion_map" type="file" value="{{ old('ambient_occlusion_map') }}">

                                    @error('ambient_occlusion_map')
                                    <span class="invalid-feedback">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Height map</label>

                                    <input class="form-control" name="height_map" type="file" value="{{ old('height_map') }}">

                                    @error('height_map')
                                    <span class="invalid-feedback">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Normal map</label>

                                    <input class="form-control" name="normal_map" type="file" value="{{ old('normal_map') }}">

                                    @error('normal_map')
                                    <span class="invalid-feedback">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Roughness map</label>

                                    <input class="form-control" name="roughness_map" type="file" value="{{ old('roughness_map') }}">

                                    @error('roughness_map')
                                    <span class="invalid-feedback">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Colour map</label>

                                    <input class="form-control" name="colour_map" type="file" value="{{ old('colour_map') }}">

                                    @error('colour_map')
                                    <span class="invalid-feedback">
                                                        <strong>
                                                            {{ $message }}
                                                        </strong>
                                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button class="btn btn-primary" style="float:right">Upload Material</button>
                                <button type="button" class="btn btn-danger" wire:click="hideHingeUploadForm" style="float:right; margin-right: 10px">Cancel upload</button>
                            </div>
                        </form>

                    @else
                        <button class="btn btn-primary" wire:click="showHingeUploadForm">Upload a new hinge</button>
                    @endif
                </div>
            </div>
            <div class="card card-custom" style="display: @if($handlesPanel) block @else none @endif">
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Handles</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Manage your storage configurator handles</span>
                    </div>
                </div>
                <div class="card-body">
                    <p>
                        Handles are another exception and these are rendered onto the storage configurator using pre-built models.
                        <br>
                        From this section you can manage and upload handles

                        The file form required for handles is again glTF (GL Transmission Format). Both .GLB and .GLTF versions of the format are supported.
                        <br><br>
                        Your objects should/can include: meshes, materials, textures.
                        <br><br>
                        It is very important that your objects do not contain lights or cameras else this will effect the way they render in relation
                        to the dynamically built object.
                        <br><br>
                        <b>
                            IMPORTANT! When constructing the model please interpret the unit scale as millimeters, as this is how the system handles size.
                            for example if your model has a scale of 100 x 50 x 5. This will be interpreted by the system as mms.
                            You will also be asked to define a set of rules in regards to handles, for example what doors/drawers they can be applied to.
                        </b>
                        <br><br>
                        You will also be asked to supple positions, for example a handle that is applied to a door will need to know where it exists in the 3d space.
                    </p>
                    <h6>Existing Handles</h6>
                    <div class="row" style="margin-bottom: 10px">
                        @forelse($materials as $material)
                            <div class="col-lg-3">
                                <h6>{{ $material->title }}</h6>
                            </div>
                        @empty
                            <div class="col-lg-3">
                                <small>You haven't uploaded any handles yet</small>
                            </div>
                        @endforelse
                    </div>
                    <hr>

                    @if($handleUploadForm)
                        <h6>Upload a new material</h6>

                        <form class="row" action="{{ route('admin.store-material') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Material Name</label>

                                <input class="form-control" name="title" type="text" value="{{ old('title') }}">

                                @error('title')
                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Ambient occlusion map</label>

                                <input class="form-control" name="ambient_occlusion_map" type="file" value="{{ old('ambient_occlusion_map') }}">

                                @error('ambient_occlusion_map')
                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Height map</label>

                                <input class="form-control" name="height_map" type="file" value="{{ old('height_map') }}">

                                @error('height_map')
                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Normal map</label>

                                <input class="form-control" name="normal_map" type="file" value="{{ old('normal_map') }}">

                                @error('normal_map')
                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Roughness map</label>

                                <input class="form-control" name="roughness_map" type="file" value="{{ old('roughness_map') }}">

                                @error('roughness_map')
                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Colour map</label>

                                <input class="form-control" name="colour_map" type="file" value="{{ old('colour_map') }}">

                                @error('colour_map')
                                <span class="invalid-feedback">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-primary" style="float:right">Upload Handle</button>
                            <button type="button" class="btn btn-danger" wire:click="hideHandleUploadForm" style="float:right; margin-right: 10px">Cancel upload</button>

                        </div>
                    </form>

                    @else
                        <button class="btn btn-primary" wire:click="showHandleUploadForm">Upload a new handle</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
