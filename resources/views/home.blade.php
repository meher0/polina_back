@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>ID</th>
                            <th>VALUE</th>
                        </thead>
                        @foreach ($datas as $item)
                        <tbody>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->value_tem }}</td>
                            
                        </tbody>
                        @endforeach
                    </table>
                  

                  {{ Auth::user()->name }}
                  {{ Auth::user()->email }}
                  {{ Auth::user()->role }}

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
