<div>
    <x-slot:title>
        Position
        </x-slot>
        <div class="container">
            <div class="card my-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>{{ __('Position ') }}({{ $total }})</h4>
                        <button wire:click='showForm' class="btn btn-primary">New</button>
                    </div>
                </div>
            </div>
            @if ($showTable == true)
                <input type="text" wire:model="search" class="form-control" placeholder="Search Here...">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                <div class="table-responsive my-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Position</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($positiones) > 0)
                                @foreach ($positiones as $position)
                                    <tr>
                                        <td>{{ $position->id }}</td>
                                        <td>{{ $position->positions }}</td>
                                        <td><button wire:click="edit({{ $position->id }})" class="btn btn-success">Edit</button></td>
                                        <td><button class="btn btn-danger" wire:click.prevent='delete({{ $position->id }})'>Delete</button></td>
                                    </tr>
                                @endforeach
                            @else
                                <h4>Record Not Found</h4>
                            @endif

                        </tbody>
                    </table>
                </div>
            @endif
            @if ($showCreate == true)
                <div class="my-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>Go Back</button>

                    <form wire:submit.prevent='store'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Position:</label>
                            <input type="text" wire:model.lazy="positions" class="form-control"
                                placeholder="Enter positions">
                            @error('positions')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            @endif
            @if ($showUpdate == true)
                <div class="my-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>Go Back</button>

                    <form wire:submit.prevent='update({{ $position_id }})'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Position:</label>
                            <input type="text" wire:model.lazy="edit_position" class="form-control"
                                placeholder="Enter positions">
                            @error('edit_position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            @endif
        </div>
</div>
