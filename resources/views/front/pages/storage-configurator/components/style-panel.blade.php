<button class="accordion" id="style-button">Unit Style</button>
<div class="accordion-panel" id="style-panel">
    @foreach($unitStyles as $unitStyle)
        <button class="menu-thumb unitStyleSelector" data-id="{{ $unitStyle->id }}" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
            <div>
                <div class="menu-thumb-image items item-1" style="background-image: url({{ Storage::url($unitStyle->image) }});"></div>
            </div>
            <div>{{ $unitStyle->title }}</div>
        </button>
    @endforeach
</div>
