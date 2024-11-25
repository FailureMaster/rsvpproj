<x-layout>
    <!-- Admin Section -->
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
                                <h4 class="m-b-lg">Guests List</h4>
                                <button type="button" class="btn btn-info mw-md" data-toggle="modal" data-target="#addNewModal">Add New</button>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="widget p-lg">
                                <p class="m-b-lg docs">You can see all the couple's guests here.</p>
                                
                                <!-- Filter Form -->
                                <form method="GET" action="{{ route('guest.create') }}" class="mb-4">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="search">Search</label>
                                            <input type="text" name="search" id="search" class="form-control" placeholder="Search by name or code" value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="relationship">Relationship</label>
                                            <select name="relationship" id="relationship" class="form-control">
                                                <option value="">All</option>
                                                <option value="Friend" {{ request('relationship') == 'Friend' ? 'selected' : '' }}>Friend</option>
                                                <option value="Family" {{ request('relationship') == 'Family' ? 'selected' : '' }}>Family</option>
                                                <option value="Workmate" {{ request('relationship') == 'Workmate' ? 'selected' : '' }}>Workmate</option>
                                                <option value="Teacher" {{ request('relationship') == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                                                <option value="Other" {{ request('relationship') == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="role">Role</label>
                                            <select name="role" id="role" class="form-control">
                                                <option value="">All</option>
                                                <option value="Flower Girl" {{ request('role') == 'Flower Girl' ? 'selected' : '' }}>Flower Girl</option>
                                                <option value="Ring Bearer" {{ request('role') == 'Ring Bearer' ? 'selected' : '' }}>Ring Bearer</option>
                                                <option value="Groomsman" {{ request('role') == 'Groomsman' ? 'selected' : '' }}>Groomsman</option>
                                                <option value="Bridesmaid" {{ request('role') == 'Bridesmaid' ? 'selected' : '' }}>Bridesmaid</option>
                                                <option value="Guest" {{ request('role') == 'Guest' ? 'selected' : '' }}>Guest</option>
                                                <option value="Other" {{ request('role') == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="is_coming">Is Coming?</label>
                                            <select name="is_coming" id="is_coming" class="form-control">
                                                <option value="">All</option>
                                                <option value="1" {{ request('is_coming') == '1' ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ request('is_coming') == '0' ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary w-100">Filter</button>
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
                                            <th>Relationship</th>
                                            <th>Role</th>
                                            <th>Is Coming</th>
                                            <th>Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($guests as $index => $guest)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $guest->firstName }}</td>
                                                <td>{{ $guest->lastName }}</td>
                                                <td>{{ $guest->relationship }}</td>
                                                <td>{{ $guest->role ?? 'Guest' }}</td>
                                                <td>{{ $guest->is_coming ? 'Yes' : 'No' }}</td>
                                                <td>{{ $guest->code }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No guests found.</td>
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

    <!-- Add New Modal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Guest</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('guest.store') }}">
                    @csrf
                    <div class="modal-body">
                        <!-- First Name Field -->
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" required>
                        </div>
                        
                        <!-- Last Name Field -->
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" required>
                        </div>

                        <!-- Relationship Field -->
                        <div class="form-group">
                            <label for="relationship">Relationship</label>
                            <select id="relationship" class="form-control" name="relationship" required>
                                <option value="">Select relationship</option>
                                <option value="Friend">Friend</option>
                                <option value="Family">Family</option>
                                <option value="Workmate">Workmate</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Role Field -->
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" class="form-control" name="role">
                                <option value="">Select Role</option>
                                <option value="Flower Girl">Flower Girl</option>
                                <option value="Ring Bearer">Ring Bearer</option>
                                <option value="Groomsman">Groomsman</option>
                                <option value="Bridesmaid">Bridesmaid</option>
                                <option value="Guest">Guest</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
