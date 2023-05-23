<div>
    <x-slot:title>
        Change password
        </x-slot>
        <div class="container">
            <div class="row">
                @foreach ($candidates as $candidate)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 my-3">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('storage') }}/{{ $candidate->image }}" style="width: 100%; "
                                    alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="my-2">{{ $candidate->fname }} {{ $candidate->lname }}</h5>
                                <button class="btn btn-info" style="width: 100%;">points( {{ $candidate->points }}
                                    )</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>
