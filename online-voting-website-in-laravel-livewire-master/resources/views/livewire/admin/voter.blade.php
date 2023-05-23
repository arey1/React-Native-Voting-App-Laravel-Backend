<div>
    <x-slot:title>
        Voter
        </x-slot>
        <div class="container">
            <div class="card my-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>{{ __('Voters ') }}({{ $total }})</h4>
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
                                
                                <th>Name</th>
                                <th>Email</th>
                                <th>Vote Id</th>
                                <th>votes</th>
                                <th>voted</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($voters) > 0)
                                @foreach ($voters as $voter)
                                    <tr>
                                        
                                        <td>{{ $voter->name }}</td>
                                        <td>{{ $voter->email }}</td>
                                        <td>{{ $voter->vote_id }}</td>
                                        <td>{{ $voter->vote_limit }}</td>
                                        <td>{{ $voter->voted == 0 ? 'Not Voted' : 'Voted' }}</td>
                                        <td><img src="{{ asset('storage') }}/{{ $voter->image }}"
                                                style="width:70px;height:70px;" alt=""></td>
                                        <td><button wire:click="edit({{ $voter->id }})" class="btn btn-success">Edit</button></td>
                                        <td><button class="btn btn-danger" wire:click.prevent='delete({{ $voter->id }})'>Delete</button></td>
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

                    <form wire:submit.prevent='create'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Name:</label>
                            <input type="text" wire:model.lazy="name" class="form-control" placeholder="Enter Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="pwd" class="form-label">Email:</label>
                            <input type="text" wire:model.lazy="email" class="form-control" placeholder="Enter Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password:</label>
                            <input type="password" wire:model.lazy="password" class="form-control"
                                placeholder="Enter Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Image:</label>
                            <input type="file" wire:model="image" class="form-control" placeholder="Enter Image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            @endif
            @if ($showUpdate == true)
                <div class="my-2">
                    <button class="btn btn-secondary my-2" wire:click='goBack'>Go Back</button>

                    <form wire:submit.prevent='update({{ $voter_id }})'>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Name:</label>
                            <input type="text" wire:model.lazy="edit_name" class="form-control" placeholder="Enter Name">
                            @error('edit_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="pwd" class="form-label">Email:</label>
                            <input type="text" wire:model.lazy="edit_email" class="form-control" placeholder="Enter Email">
                            @error('edit_email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Image:</label>
                            <input type="file" wire:model="new_image" class="form-control" placeholder="Enter Image">

                            @if ($new_image)
                                <img src="{{ $new_image->temporaryUrl() }}" style="width:70px;height:70px;" alt="">
                            @else
                                <img src="{{ asset('storage') }}/{{ $old_image }}"
                                    style="width:70px;height:70px;" alt="">
                                <input type="text" wire:model='old_image'>
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            @endif
        </div>
</div>
