<div>
    <x-slot:title>
        Login
        </x-slot>
        <x-slot:image_title>
            Home / Login
            </x-slot>
            <div class="my-5">
                <h1 class="text-center">Login For Voting</h1>
                <div class="container my-4">
                    <div class="row flex justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">

                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif
                            <form wire:submit.prevent='login'>
                                <div class="mb-3 mt-3">
                                    <label for="id" class="form-label">Vote Id:</label>
                                    <input type="text" wire:model='vote_id' class="form-control" id="voteid"
                                        placeholder="Enter Voteid" name="voteid">
                                    @error('vote_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Password:</label>
                                    <input type="password" wire:model='password' class="form-control" id="pwd"
                                        placeholder="Enter password" name="pswd">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
