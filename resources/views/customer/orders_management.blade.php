@extends('layouts.main')

@section('content')

</section>

<div class="container-fluid text-center">    

  <h1>Order History</h1>

  <div class="row content">

    @include('customer.sidebar1')

    <div class="col-sm-9"> 

      <div class="stockTable">

        <h6></h6>

        <div class="table-responsive">

          <table class="table">

            <tr>
              <th>Order Id </th>
              <th>Total Amount</th>
              <th>Subscripton Status</th>
              <th>Invoice</th>
          </tr>

            @if(count($orders) > 0)

              @foreach($orders as $ord)

                <tr>

                  <td>{{ $ord->order_id }}</td>

                  <td> {{ number_format($ord->total_amount,2) }} </td>

                  <td> {{ $ord->payment_status_message }} </td>

                  <td><a href="{{ url('thankyou/?oid='.$ord->order_id) }}" style="color:#ea1313">#{{ $ord->invoice_number}}  </a></td>

                </tr>

              @endforeach

            @else

              <tr>You don't have order yet</tr>

            @endif  

            </table>

            @if($total_orders > $perPage)

            <div class="paginationDiv">

              <ul>

                <?php

                 $total_pages = ceil($total_orders / $perPage);

                 if((int)$pageno > 1 ){

                  $decr = $pageno - 1;

                ?>

                <li class="active"><a href="{{ url( url()->current() ) }}">First</a></li>

                <li class="active"><a href="{{ url(url()->current().'?pageno='.$decr) }}">Previous</a></li>

                <?php 

                  }

                  if($pageno>1) { 

                    for($p2=($pageno-5); $p2<($pageno); $p2++) {

                      if($p2>=1) { ?>

                        <li><a href="{{ url(url()->current().'?pageno='.$p2) }}">{{ $p2 }} </a></li>

                        

                <?php } } } ?>

                <li class="active"><a href="javascript:void(0)">{{ $pageno}}</a></li>

                <?php

                  if($pageno<$total_pages) { 

                    for($p1=($pageno+1); $p1<($pageno+6); $p1++) { 

                      if($p1<=$total_pages) { ?>

                        <li><a href="{{ url(url()->current().'?pageno='.$p1) }}">{{ $p1 }}</a></li>

                <?php } } } ?>

                <?php

                  if($pageno < $total_pages){

                    $incr = $pageno + 1;

                ?>

                  <li class="active"><a href="{{ url(url()->current().'?pageno='.$incr) }}">Next</a></li>

                  <li class="active"><a href="{{ url( url()->current().'?pageno='.$total_pages  ) }}">Last</a></li>

                <?php } ?>

              </ul>

            </div>

            @endif

          </div>

        </div>

      <div class="clearfix"></div>

      <hr>

    </div>

  </div>

</div>

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