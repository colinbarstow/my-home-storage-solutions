<button class="accordion" id="finish-button">Finish</button>
<div class="accordion-panel" id="finish-panel">
    @foreach($materials as $material)
    <button class="menu-thumb" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        <div>
            <div class="menu-thumb-image items" style="width: 100px;
                height: 68px;
                background-position: center;
                background-image: url({{$material->colour_map}});
                background-repeat: no-repeat;
                background-size: cover;"></div>
        </div>
        <div>{{ $material->title }}</div>
    </button>
    @endforeach
</div>
