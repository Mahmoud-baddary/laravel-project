@extends('layouts.app')
@section('content')
<x-dashboard.layout title="Welcome to the Dashboard">
    <div class="row">
        <!-- Widget 1: Sales -->
        <div class="col-md-6">
          <div class="widget">
            <h3>Sales</h3>
            <p>Total Sales: {{ $sales->sales ?? 0 }} EGP</p>
          </div>
        </div>
      </div>
</x-dashboard.layout>
@endsection
