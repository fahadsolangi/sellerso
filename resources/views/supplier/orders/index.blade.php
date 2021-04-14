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

                  <th>Product Name</th>

                  <th>Category</th>

                  <th>Customer Name</th>

                  <th>Price</th>

                  <th>Discount (%)</th>

                  <th>Payment Status</th>
<!-- 
                  <th>Delivery Status</th> -->

                </tr>

              </thead>

              <tbody>

                @if(count($orders) > 0)

                  @foreach($orders as $pro)

                    <tr>

                      <td>{{ $pro->pname }}</td>

                      <td> {{ $pro->cname }} </td>

                      <td> {{ $pro->customer_name }} </td>

                      <td> ${{ number_format($pro->products_price,2) }} </td>

                      <td> {{ number_format($pro->product_discount,2) }} % </td>

                      <td> {!! $pro->payment_status == 1 ? '<span style="color:green">Completed</span>'  : '<span style="color:red">Not Completed</span>' !!} </td>

                      <!-- <td> {!! $pro->delivery_status == 1 ? '<span style="color:green">Delivered</span>'  : '<span style="color:red">Not Deliver</span>' !!} </td> -->

                    </tr>

                  @endforeach

                @else

                  <tr><td colspan="6"><h1 class="text-center">You don't have orders yet</h1></td></tr>

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