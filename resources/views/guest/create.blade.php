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

                <!-- start head bottom -->
                <div class="bottom d-flex justify-content-between align-items-center">
                    <div class="left">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="right">
                        <h1>Dashboard /</h1>
                        <a href="#">Page Name</a>
                    </div>
                </div>
                <!-- end head bottom -->
            </div>
            <!-- end content head -->

            <!-- start with the real content -->
            <div class="wrap">
                <section class="app-content">
                    <div class="row">
                        <div class="col-md-12">

							<div class="d-flex justify-content-between align-items-center mb-4">
								<h4 class="m-b-lg">Guests lists</h4>
								<button type="button" class="btn btn-info mw-md" data-toggle="modal" data-target="#addNewModal">Add New</button>
							</div>
							
                        </div>
                        <div class="col-md-12">
                            <div class="widget p-lg">
                                <p class="m-b-lg docs">
                                    You can see here all the couples guests 
                                </p>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Relationship</th>
                                            <th>Is coming</th>
                                            <th>Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>
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

    <!-- Add New Modal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewModalLabel">Add New Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addNewForm">
                        <!-- First Name Field -->
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter first name" required>
                        </div>
                        
                        <!-- Last Name Field -->
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter last name" required>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addNewForm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- end admin -->
</x-layout>
