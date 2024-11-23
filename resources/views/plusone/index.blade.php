<x-layout>
    <!-- start admin -->
    <section id="admin">
        <x-sidenav />

        <div class="content">
            <div class="head">
                <x-topnav />
            </div>

            <div class="wrap">
                <section class="app-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="m-b-lg">Plus Ones from Guests</h4>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="widget p-lg">
                                <p class="m-b-lg docs">Added guests by your guest lists</p>

                                <!-- Search and Filter Form -->
                                <form method="GET" action="{{ route('plusone.index') }}" class="mb-4">
                                    <div class="row" style=" display: flex; justify-content: space-between;">
                                        <div class="col-md-3 me-3"> <!-- Add spacing between elements -->
                                            <input type="text" name="search" class="form-control" placeholder="Search by name, code, or added by" value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="is_coming" class="form-control">
                                                <option value="">Filter by is coming</option>
                                                <option value="1" {{ request('is_coming') == '1' ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ request('is_coming') == '0' ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary w-100">Search</button>
                                        </div>
                                    </div>
                                </form>
                                
                                
                                

                                <!-- Guests Table -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Added By</th>
                                            <th>Is Coming</th>
                                            <th>Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($additionalGuests as $guest)
                                            <tr>
                                                <td>{{ $guest->id }}</td>
                                                <td>{{ $guest->firstName }}</td>
                                                <td>{{ $guest->lastName }}</td>
                                                <td>{{ $guest->addedByGuest->firstName ?? '' }} {{ $guest->addedByGuest->lastName ?? '' }}</td>
                                                <td>{{ $guest->is_coming ? 'Yes' : 'No' }}</td>
                                                <td>{{ $guest->code }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No additional guests found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</x-layout>
