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

                  <th>Category Name</th>

                  <th>Product By</th>

				          <th>Product Status</th>

                  <th>Action</th>

                </tr>

              </thead>

              <tbody>

                @if(count($products) > 0)

                  @foreach($products as $pro)

                    <tr>

                      <td>{{ $pro->name }}</td>

                      <td> {{ $pro->category_name }} </td>

                      <td> {{ $pro->product_by}}</td>

                      <td> {!! $pro->is_active == 1 ? '<span style="color:green">Approved</span>'  : '<span style="color:red">Not Approved</span>' !!} </td>

                      <td>

                      @if($pro->is_active == 1)

                       <!-- <a href="javascript:void(0)" onclick="getProductDetail(this)" data-productid="{{-- $pro->id --}}"><i class="fa fa-eye" title="view Product"></i></a>-->

                       <a href="{{ route('productdetail',$pro->slug)}}" target="_blank"><i class="zmdi zmdi-eye zmdi-hc-fw" title="view Product Detail"></i></a>

                      | 

                      @endif 

                      <!-- <a href="{{ route('supplier.orders',$pro->id) }}" target="_blank"><i class="zmdi zmdi-receipt zmdi-hc-fw" title="view Orders"></i></a>  

                      |-->

                       <a href="{{ route('supplier.rating',$pro->id) }}" target="_blank"><i class="zmdi zmdi-receipt zmdi-hc-fw" title="View Reviews"></i></a>  

                      |

                      <a href="{{route('supplier.product.addition',[$pro->id])}}"><i class="zmdi zmdi-edit zmdi-hc-fw" title="Edit Product"></i></a>

                      |

                       <a href="{{route('supplier.product.delete',[$pro->id])}}"><i class="zmdi zmdi-delete zmdi-hc-fw" title="Delete Product"></i></a>

                      </td>

                    </tr>

                  @endforeach

                @else

                  <tr><td colspan="6"><h1 class="text-center">You don't have product yet</h1></td></tr>

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