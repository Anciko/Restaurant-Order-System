@extends('layouts.master_plain')

@section('title', 'Order Form')

@section('content')

    <div class="row">
        <div class="col-12 col-sm-10">
            <h2>Order Form</h2>
            @if (session('success'))
                <div class="col-md-6 offset-md-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
            @endif
            <div class="card card-success card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                aria-selected="true"> New Order </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
                                aria-selected="false">Order Lists</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                            aria-labelledby="custom-tabs-one-home-tab">
                            <form action="{{ route('order_submit') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @foreach ($dishes as $dish)
                                        <div class="col-md-3">
                                            <div class="card p-3">
                                                <p>{{ $dish->id }}</p>
                                                <img src="{{ url("images/$dish->image") }}" alt="" width="50" height="50">
                                                <br>
                                                <label for=""> {{ $dish->name }} </label>
                                                <input type="number" value="1" name="{{ $dish->id }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="mb-2">
                                    <select name="table" id="" class="form-control col-1">
                                    @foreach ($tables as $table )
                                        <option value="{{ $table->id }}">{{$table->number }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Order</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                            aria-labelledby="custom-tabs-one-settings-tab">
                           <table class="table table-bordered table-striped">
                               <thead>
                                   <tr>
                                       <th>Dish Name</th>
                                       <th>Table Number</th>
                                       <th>Status</th>
                                       <th>Actions</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->dish->name }}</td>
                                        <td>{{ $order->table_id }}</td>
                                        <td>{{ $status[$order->status] }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('order_serve', $order->id) }}" class="btn btn-warning btn-sm">Serve</a>
                                            </div>
                                        </td>
                                    </tr>
                                   @endforeach
                               </tbody>
                           </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
