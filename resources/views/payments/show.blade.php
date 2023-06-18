@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Batches Page</div>
  <div class="card-body">
   
 
    <div class="card-body">
      @foreach($payments as $item)
          <h5 class="card-title">Enrollment No: {{ $enrollment->enroll_no }}</h5>
          <p class="card-text">Paid Date: {{ $item->paid_date }}</p>
          <p class="card-text">Amount: {{ $item->amount }}</p>
          <hr>
      @endforeach
  </div>
  
       
    </hr>
  
  </div>
</div>
@endsection