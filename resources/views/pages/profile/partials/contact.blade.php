<div class="py-9">
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="font-weight-bold mr-2">Email:</span>
        <a href="#" class="text-muted text-hover-primary">{{ Auth::user()->email }}</a>
    </div>
    <div class="d-flex align-items-center justify-content-between mb-2">
        <span class="font-weight-bold mr-2">Phone:</span>
        <span class="text-muted">{{ Auth::user()->adminProfile->telephone() }}</span>
    </div>
    <div class="d-flex align-items-center justify-content-between">
        <span class="font-weight-bold mr-2">Location:</span>
        <span class="text-muted">{{ Auth::user()->adminProfile->location() }}</span>
    </div>
</div>
