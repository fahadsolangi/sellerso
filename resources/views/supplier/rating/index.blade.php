@extends('supplier.layout.main')
@section('content')
<section class="main-people-say">
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-xs-12 col-sm-9">
      <div class="carttable">
            <table class="table">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Product Name</th>
                  <th>Customer Name</th>
                  <th>Email</th>
                  <th>Rating</th>
                  <th>Comments</th>
                </tr>
              </thead>
              <tbody>
                @if(count($rating) > 0)
                  @foreach($rating as $rat)
                    <tr>
                      <td> {{ $rat->category_name }} </td>
                      <td>{{ $rat->product_name }}</td>
                      <td> {{ $rat->customer_name }} </td>
                      <td> {{ $rat->rating_email }} </td>
                      <td> {{ $rat->rating_star }} </td>
                      <td> {{ $rat->rating_content }} </td>                      
                    </tr>
                  @endforeach
                @else
                  <tr><td colspan="6"><h1 class="text-center">You don't have review yet</h1></td></tr>
                @endif  
              </tbody>
            </table>
          </div>
    </div>
  </div>
  </div>
</section>
<div class="clearfix"></div>
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection