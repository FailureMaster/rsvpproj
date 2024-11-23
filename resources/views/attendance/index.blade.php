<x-layout>
    <!-- start admin -->
    <section id="admin">
        <!-- start sidebar -->
        <x-sidenav />
        <!-- end sidebar -->

        <!-- start content -->
        <div class="content">
            <!-- start content head -->
            <div class="head">
                <!-- head top -->
                <x-topnav></x-topnav>
                <!-- end head top -->

            </div>
            <!-- end content head -->

            <!-- start with the real content -->
            <div class="wrap">
                <section class="app-content">
                    <div class="row">
                        <div class="col-md-12">

							<div class="mb-4">
								<h4 class="m-b-lg mb-0">Event Attendance</h4>
                                <p class=" docs">
                                    If you see them and show you the code, Mark them as attended
                                </p>
								{{-- <button type="button" class="btn btn-info mw-md" data-toggle="modal" data-target="#addNewModal">Add New</button> --}}
							</div>

                            
							
                        </div>
                        <div class="col-md-12">
                            <div class="widget p-lg">
                                

                                  <!-- Filter Form -->
                                  <form method="GET" action="{{ route('guest.attendance') }}" class="mb-4">
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($guests as $index => $guest)
                                            <tr id="guest-{{ $guest->id }}" class="{{ $guest->did_come ? 'table-success' : '' }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $guest->firstName }}</td>
                                                <td>{{ $guest->lastName }}</td>
                                                <td>{{ $guest->relationship }}</td>
                                                <td>{{ $guest->role ?? 'Guest' }}</td>
                                                <td>{{ $guest->is_coming ? 'Yes' : 'No' }}</td>
                                                <td>{{ $guest->code }}</td>
                                                <td>
                                                    @if ($guest->did_come)
                                                        <button class="btn btn-warning btn-sm" onclick="toggleAttendance({{ $guest->id }}, 0)">Undo</button>
                                                    @else
                                                        <button class="btn btn-success btn-sm" onclick="toggleAttendance({{ $guest->id }}, 1)">Mark as Attended</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No guests found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- end the real content -->
        </div>
        <!-- end content -->
    </section>

    <!-- end admin -->
    <script>
        function toggleAttendance(guestId, did_come) {
            $.ajax({
                url: "{{ route('guest.toggleAttendance') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    guest_id: guestId,
                    did_come: did_come
                },
                success: function(response) {
                    if (response.success) {
                        // Update the row color
                        const row = $('#guest-' + guestId);
                        if (did_come) {
                            row.addClass('table-success');
                            row.find('button').replaceWith(`<button class="btn btn-warning btn-sm" onclick="toggleAttendance(${guestId}, 0)">Undo</button>`);
                        } else {
                            row.removeClass('table-success');
                            row.find('button').replaceWith(`<button class="btn btn-success btn-sm" onclick="toggleAttendance(${guestId}, 1)">Mark as Attended</button>`);
                        }
                    }
                },
                error: function(xhr) {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    </script>
    <style>
        .table-success {
            background-color: #d4edda !important;
        }

    </style>
</x-layout>
