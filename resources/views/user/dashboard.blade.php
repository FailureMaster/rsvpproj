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
            <div id="real">
                <div class="row">
                    <!-- start analytics -->
                    <div class="col-lg-3">
                        <div class="analytics">
                            <div class="card">
                                <div class="icon"><i class="fas fa-users"></i></div>
                                <div class="text">
                                    <h1>{{$totalGuest}}</h1>
                                    <p>Total Guests</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="analytics">
                            <div class="card">
                                <div class="icon"><i class="fas fa-user-plus"></i></div>
                                <div class="text">
                                    <h1>{{$totalPlusOne}}</h1>
                                    <p>Total Plus One</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="analytics">
                            <div class="card">
                                <div class="icon"><i class="fas fa-user-shield"></i></div>
                                <div class="text">
                                    <h1>{{$totalAdmin}}</h1>
                                    <p>Total Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="analytics">
                            <div class="card">
                                <div class="icon"><i class="fas fa-check-circle"></i></div>
                                <div class="text">
                                    <h1>{{$totalComing}}</h1>
                                    <p>Total Coming</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end analytics -->
                </div>
            </div>
            <!-- end the real content -->
        </div>
        <!-- end content -->
    </section>
    <!-- end admin -->
</x-layout>
