@extends('admin.layouts.master_view')

@section('header_links')
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card .card-body .card-title{
            color:rgb(18, 34, 51);
        }
        .card .card-body .content{
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card .card-body .content .left h3{
            font-size: 24px;
            color: green;
        }
        .card .card-body .content i{
            font-size: 22px;
            color: #007bff;
            position: relative;
            bottom: 2px;
        }
    </style>
@endsection

@section('main_content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Contact Leads</h5>
                        <div class="content">
                            <div class="left">
                                <h3>10</h3>
                            </div>
                            <div class="right">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Career Leads</h5>
                        <div class="content">
                            <div class="left">
                                <h3>12</h3>
                            </div>
                            <div class="right">
                                <i class="bi bi-person-badge-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Customers</h5>
                        <div class="content">
                            <div class="left">
                                <h3>5</h3>
                            </div>
                            <div class="right">
                                <i class="bi bi-person-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <div class="content">
                            <div class="left">
                                <h3>67</h3>
                            </div>
                            <div class="right">
                                <i class="bi bi-file-post"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_links')
@endsection
