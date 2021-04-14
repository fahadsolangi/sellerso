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

                  <th>Package Name</th>

                  <th>Product Name</th>

                  <th>Price</th>

				          <th>Product Status</th>

                  <th>Action</th>

                </tr>

              </thead>

              <tbody>

                @if(count($package) > 0)

                  @foreach($package as $key=> $pack)

                    <tr>

                      <td>{{ $pack->name }}</td>

                      <td> {{ $pack->pname}} </td>
                      
                      <td> {{ $pack->price}} </td>

                      <td> {!! $pack->is_active == 1 ? '<span style="color:green">Approved</span>'  : '<span style="color:red">Not Approved</span>' !!} </td>

                      <td>

                      @if($pack->is_active == 1)

                       <!-- <a href="javascript:void(0)" onclick="getProductDetail(this)" data-productid="{{-- $pack->id --}}"><i class="fa fa-eye" title="view Product"></i></a>-->

                       <a href="" data-toggle="modal" data-target="#exampleModal{{$key}}"><i class="zmdi zmdi-eye zmdi-hc-fw" title="view Package Detail"></i></a>

                      | 

                      @endif 

                      <!-- <a href="{{ route('supplier.orders',$pack->id) }}" target="_blank"><i class="zmdi zmdi-receipt zmdi-hc-fw" title="view Orders"></i></a>  

                      |-->

                         {{-- <a href="{{ route('supplier.rating',$pack->id) }}" target="_blank"><i class="zmdi zmdi-receipt zmdi-hc-fw" title="View Reviews"></i></a>  

                        | --}}

                      <a href="{{route('supplier.package.addition',[$pack->id])}}"><i class="zmdi zmdi-edit zmdi-hc-fw" title="Edit Package"></i></a>

                      |

                       <a href="{{route('supplier.package.delete',[$pack->id])}}"><i class="zmdi zmdi-delete zmdi-hc-fw" title="Delete Product"></i></a>

                      </td>

                    </tr>

                    <!-- Modal -->

<div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Package Detail</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

          <span aria-hidden="true">&times;</span>

        </button>

      </div>

      <div class="modal-body">

        <div class="row">

<div class="col-md-12">

                   <div class="packageBox">

                      <div class="pName">

                        <ul>

                          <li class="pheader">{{$pack->name}}</li>

                          <li class="pgrey">${{ number_format($pack->price,2)}} / year</li>

                          {!!$pack->detail!!}

                        </ul>

                      </div>

                   </div>

                </div>      

            </div>

      </div>

    </div>

  </div>

</div>

                    <div class="modal fade" id="exampleModalCenter{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                      <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="exampleModalLongTitle">Packages</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">&times;</span>

                            </button>

                          </div>

                          <div class="modal-body">

                            <div class="container">

                                <div class="row">

                                    <div class="col-md-3">

                                        <div class="columns">

                                          <ul class="price">

                                            <li class="header">{{ $pack->name}}</li>

                                            <li class="grey">${{ number_format($pack->price,2)}} / year</li>

                                            {!! $pack->detail !!}

                                            <li class="grey">

                                            </li>

                                          </ul>

                                        </div>

                                    </div>   

                                </div>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

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

.packageBox ul {

    list-style: none;

    margin-left: -40px;

}

.pheader {

    background-color: #3a94ba;

    color: white;

    font-size: 25px;

    border-bottom: 1px solid #eee;

    padding: 20px;

    text-align: center;

}

li.pgrey{

  background-color: #eee;

  font-size: 20px;

  border-bottom: 1px solid #eee;

  padding: 20px;

  text-align: center;

  }

.packageBox p{

  padding: 20px;

  text-align: center;

}

.pName {

    border: 1px solid #ccc;

}

</style>

@endsection

@section('js')

<script type="text/javascript">

(()=>{

  /*in page css here*/

})()

</script>

@endsection