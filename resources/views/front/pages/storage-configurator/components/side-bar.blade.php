<div class="side-bar" id="side-bar">
    <div class="toolbar">
        @include('front.pages.storage-configurator.components.style-panel')
        @include('front.pages.storage-configurator.components.size-panel')
        @include('front.pages.storage-configurator.components.partitions-panel')
        @include('front.pages.storage-configurator.components.doors-panel')
        @include('front.pages.storage-configurator.components.components-panel')
        @include('front.pages.storage-configurator.components.finish-panel')
    </div>
    <div class="action-bar">
        <button class="action-button">SAVE</button>
        <button class="action-button">EXPORT</button>
    </div>
</div>
