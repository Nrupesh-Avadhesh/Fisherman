@extends('backend.layouts.app')
@section('title', ' / Dashboard')
@section('header_link')
@endsection
@section('content')
<div class="row">

    <!-- statustic-card start -->
         
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-white text-black">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5 text-uppercase f-14">Payed Client</p>
                        <h4 class="m-b-0 f-20">0</h4>
                    </div>
                    <div class="col col-auto text-right text-c-white">
                        <i class="feather icon-user shadow-lg f-20 bg-c-blue p-2 text-white rounded-circle "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-white text-black">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5 text-uppercase f-14">Total Client</p>
                        <h4 class="m-b-0 f-20">{{ $data['totalclient'] }}</h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-user shadow-lg f-20 bg-c-yellow p-2 text-white rounded-circle "></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-md-6">
        <div class="card bg-c-white text-black">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5 text-uppercase f-14 ">Total Products</p>
                        <h4 class="m-b-0 f-20">0</h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-shopping-cart shadow-lg f-20 bg-simple-c-pink p-2 text-white rounded-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-xl-3 col-md-6">
        <div class="card bg-c-white text-black">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5 text-uppercase f-14">Active Requirements</p>
                        <h4 class="m-b-0 f-20">&#8377; 5,852</h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-credit-card shadow-lg f-20 bg-simple-c-green p-2 text-white rounded-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-white text-black">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5 text-uppercase f-14">total Blog</p>
                        <h4 class="m-b-0 f-20">{{ $data['blog'] }}</h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="fa fa-book shadow-lg f-20 bg-c-green p-2 text-white rounded-circle""></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-c-white text-black">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5 text-uppercase f-14">today's call</p>
                        <h4 class="m-b-0 f-20">{{ $data['tocall'] }}</h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="fa fa-phone shadow-lg f-20 bg-simple-c-blue p-2 text-white rounded-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    {{-- <div class="col-xl-4 col-md-6">
        <div class="card bg-c-white text-black">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="m-b-5 f-14 text-uppercase">Quantity below Par Level</p>
                        <h4 class="m-b-0 f-20">0</h4>
                    </div>
                    <div class="col col-auto text-right">
                        <i class="feather icon-book shadow-lg f-20 bg-simple-c-yellow p-2 text-white rounded-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
  
    {{-- <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Total Leads</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <p class="text-c-green f-w-500"><i class="feather icon-chevrons-up m-r-5"></i> 18% High than last month</p>
                <div class="row">
                    <div class="col-4 b-r-default">
                        <p class="text-muted m-b-5">Overall</p>
                        <h5>76.12%</h5>
                    </div>
                    <div class="col-4 b-r-default">
                        <p class="text-muted m-b-5">Monthly</p>
                        <h5>16.40%</h5>
                    </div>
                    <div class="col-4">
                        <p class="text-muted m-b-5">Day</p>
                        <h5>4.56%</h5>
                    </div>
                </div>
            </div>
            <canvas id="tot-lead" height="150"></canvas>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Total Vendors</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <p class="text-c-pink f-w-500"><i class="feather icon-chevrons-down m-r-15"></i> 24% High than last month</p>
                <div class="row">
                    <div class="col-4 b-r-default">
                        <p class="text-muted m-b-5">Overall</p>
                        <h5>68.52%</h5>
                    </div>
                    <div class="col-4 b-r-default">
                        <p class="text-muted m-b-5">Monthly</p>
                        <h5>28.90%</h5>
                    </div>
                    <div class="col-4">
                        <p class="text-muted m-b-5">Day</p>
                        <h5>13.50%</h5>
                    </div>
                </div>
            </div>
            <canvas id="tot-vendor" height="150"></canvas>
        </div>
    </div>
    <div class="col-xl-4 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Invoice Generate</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <p class="text-c-green f-w-500"><i class="feather icon-chevrons-up m-r-15"></i> 20% High than last month</p>
                <div class="row">
                    <div class="col-4 b-r-default">
                        <p class="text-muted m-b-5">Overall</p>
                        <h5>68.52%</h5>
                    </div>
                    <div class="col-4 b-r-default">
                        <p class="text-muted m-b-5">Monthly</p>
                        <h5>28.90%</h5>
                    </div>
                    <div class="col-4">
                        <p class="text-muted m-b-5">Day</p>
                        <h5>13.50%</h5>
                    </div>
                </div>
            </div>
            <canvas id="invoice-gen" height="150"></canvas>
        </div>
    </div> --}}
    <!-- income end -->

    <!-- ticket and update start -->
    {{-- <div class="col-xl-6 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Recent Tickets</h5> --}}
                {{-- <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div> --}}
            {{-- </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Subject</th>
                                <th>Department</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label class="label label-success">open</label></td>
                                <td>Website down for one week</td>
                                <td>Support</td>
                                <td>Today 2:00</td>
                            </tr>
                            <tr>
                                <td><label class="label label-primary">progress</label></td>
                                <td>Loosing control on server</td>
                                <td>Support</td>
                                <td>Yesterday</td>
                            </tr>
                            <tr>
                                <td><label class="label label-danger">closed</label></td>
                                <td>Authorizations keys</td>
                                <td>Support</td>
                                <td>27, Aug</td>
                            </tr>
                            <tr>
                                <td><label class="label label-success">open</label></td>
                                <td>Restoring default settings</td>
                                <td>Support</td>
                                <td>Today 9:00</td>
                            </tr>
                            <tr>
                                <td><label class="label label-primary">progress</label></td>
                                <td>Loosing control on server</td>
                                <td>Support</td>
                                <td>Yesterday</td>
                            </tr>
                            <tr>
                                <td><label class="label label-success">open</label></td>
                                <td>Restoring default settings</td>
                                <td>Support</td>
                                <td>Today 9:00</td>
                            </tr>
                            <tr>
                                <td><label class="label label-danger">closed</label></td>
                                <td>Authorizations keys</td>
                                <td>Support</td>
                                <td>27, Aug</td>
                            </tr>
                            <tr>
                                <td><label class="label label-success">open</label></td>
                                <td>Restoring default settings</td>
                                <td>Support</td>
                                <td>Today 9:00</td>
                            </tr>
                            <tr>
                                <td><label class="label label-primary">progress</label></td>
                                <td>Loosing control on server</td>
                                <td>Support</td>
                                <td>Yesterday</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right m-r-20">
                        <a href="#!" class=" b-b-primary text-primary">View all Projects</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-xl-6 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5>Latest Updates</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="latest-update-box">
                    <div class="row p-t-20 p-b-30">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline">2 hrs ago</p>
                            <i class="feather icon-twitter bg-info update-icon"></i>
                        </div>
                        <div class="col">
                            <h6>+ 1652 Followers</h6>
                            <p class="text-muted m-b-0">You’re getting more and more followers, keep it up!</p>
                        </div>
                    </div>
                    <div class="row p-b-30">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline">4 hrs ago</p>
                            <i class="feather icon-briefcase bg-simple-c-pink update-icon"></i>
                        </div>
                        <div class="col">
                            <h6>+ 5 New Products were added!</h6>
                            <p class="text-muted m-b-0">Congratulations!</p>
                        </div>
                    </div>
                    <div class="row p-b-30">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline">1 day ago</p>
                            <i class="feather icon-check bg-simple-c-yellow  update-icon"></i>
                        </div>
                        <div class="col">
                            <h6>Database backup completed!</h6>
                            <p class="text-muted m-b-0">Download the <span class="text-c-blue">latest backup</span>.</p>
                        </div>
                    </div>
                    <div class="row p-b-0">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline">2 day ago</p>
                            <i class="feather icon-facebook bg-simple-c-green update-icon"></i>
                        </div>
                        <div class="col">
                            <h6>+2 Friend Requests</h6>
                            <p class="text-muted m-b-10">This is great, keep it up!</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="b-none">
                                            <a href="#!" class="align-middle">
                                           <img src="files\assets\images\avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                           <div class="d-inline-block">
                                               <h6>Developer</h6>
                                               <p class="text-muted m-b-0">Graphic Designer</p>
                                           </div>
                                       </a>
                                        </td>
                                    </tr>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#!" class="b-b-primary text-primary">View all Projects</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12">
        <div class="card feed-card">
            <div class="card-header">
                <h5>Feeds</h5>
            </div>
            <div class="card-block">
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-bell bg-simple-c-blue feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted f-right f-13">Just Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-shopping-cart bg-simple-c-pink feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">New order received <span class="text-muted f-right f-13">Just Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-file-text bg-simple-c-green feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted f-right f-13">Just Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-shopping-cart bg-simple-c-pink feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">New order received <span class="text-muted f-right f-13">Just Now</span></h6>
                    </div>
                </div>
                <div class="row m-b-30">
                    <div class="col-auto p-r-0">
                        <i class="feather icon-file-text bg-simple-c-green feed-icon"></i>
                    </div>
                    <div class="col">
                        <h6 class="m-b-5">You have 3 pending tasks. <span class="text-muted f-right f-13">Just Now</span></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="col-xl-4 col-md-12">
        <div class="card per-task-card">
            <div class="card-header">
                <h5>Your Tasks</h5>
            </div>
            <div class="card-block">
                <div class="row per-task-block text-center">
                    <div class="col-6">
                        <div data-label="45%" class="radial-bar radial-bar-45 radial-bar-lg radial-bar-primary"></div>
                        <h6 class="text-muted">Finished</h6>
                        <p class="text-muted">642</p>
                        <button class="btn btn-primary btn-round btn-sm">Manage</button>
                    </div>
                    <div class="col-6">
                        <div data-label="30%" class="radial-bar radial-bar-30 radial-bar-lg radial-bar-primary"></div>
                        <h6 class="text-muted">Remaining</h6>
                        <p class="text-muted">495</p>
                        <button class="btn btn-primary btn-outline-primary btn-round btn-sm">Manage</button>
                    </div>
                </div>

            </div>
        </div>
      

    </div> --}}
    <!-- latest activity end -->
</div>
@endsection
@section('footer_script')
@endsection
