<div class="row">
    <div class="row justify-content-left align-items-center g-2 mb-4">
        @foreach ($folders as $item)
            <div wire:click='openFolder({{ $item->id }})' class="col-md-3 file-card" data-id="{{ $item->id }}"
                data-type="folder">
                <div class="card text-center p-3">
                    <div class="row justify-content-left align-items-center g-2">
                        <div class="col-sm-2 col-4"><i class="fas fa-folder fa-2x text-warning"></i></div>
                        <div class="col-sm-10 col-8 text-left">
                            <p class="mt-2 text-left" style="text-align: left !important;">{{ $item->name }}</p>
                        </div>
                    </div>


                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row justify-content-left align-items-center g-2">
        @foreach ($files as $item)
            <div class="col-md-3 file-card" data-id="{{ $item->id }}" data-type="file">
                <div class="card text-center p-3">
                    @if (in_array($item->mime_type, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/svg+xml']))
                        <img class="w-100" src="{{ Storage::url($item->path) }}" alt="">
                    @else
                        <i class="fas fa-file-alt fa-3x text-primary"></i>
                    @endif
                    <p class="mt-2">
                        @if (in_array($item->mime_type, ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/svg+xml']))
                            <i class="fas fa-image text-success"></i> &thinsp;
                        @endif {{ $item->name }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    {{-- @livewireScripts() --}}

</div>
