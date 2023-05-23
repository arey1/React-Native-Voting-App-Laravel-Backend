<div>
    <x-slot:title>
        Dashboard
        </x-slot>

        <div class="container my-4 ">
            <div class="row flex justify-content-center">
                <div class="col-xl-4 my-3 col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h4>Position</h4>
                            <span>{{ $totalPositions }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 my-3 col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h4>Candidates</h4>
                            <span>{{ $totalCandidates }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 my-3 col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h4>Voter</h4>
                            <span>{{ $totalVoter }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4  col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h4>Votes</h4>
                            <span>{{ $totalVotes }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Voted User</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>IsVoted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($isVotedUser) > 0)
                                            @foreach ($isVotedUser as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->voted == 1 ? 'Voted' : '' }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Not Voted User</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>IsVoted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($notVotedUser) > 0)
                                            @foreach ($notVotedUser as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->voted == 0 ? 'NotVoted' : '' }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
