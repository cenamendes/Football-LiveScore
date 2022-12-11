@push('custom-styles')
<style>

/** DATATABLE **/
.paginate_button {
   margin:5px!important;
}
.current {
   border: 1px solid;
   border-radius: 5px;
   background: #fb503b;
   color: white;
   width: 24px;
   display: inline-block;
   text-align: center;
}

#example_filter
{
   text-align:left;
}
#example_paginate
{
   text-align:left;
}

.previous,
.next {
   color:#fb503b;
   font-size: x-large;
}

.next:hover {
   background-color: #fb503b;
   color: white;
   border-radius: 5px;
   width: 24px;
   display: inline-block;
   text-align: center;
}

.previous:hover {
   background-color: #fb503b;
   color: white;
   border-radius: 5px;
   width: 24px;
   display: inline-block;
   text-align: center;
}

.odd {
   background-color: rgba(251, 80, 59, 0.5)!important;
}

/** **/

/** FLIPCARD **/

.container{
   max-width: 1200px;
   margin:0 auto;
   padding:3rem 2rem;
}

.container .title{
   font-size: 3.5rem;
   color:#444;
   margin-bottom: 3rem;
   text-transform: uppercase;
   text-align: center;
}

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 200px;
  border: 1px solid #f1f1f1;
  perspective: 1000px; 
}


.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}


.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}


.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden; /* Safari */
  backface-visibility: hidden;
}


.flip-card-front {
  background-color: #bbb;
  color: black;
}


.flip-card-back {
  background-color: #fb503b;
  opacity: .7
  color: white;
  transform: rotateY(180deg);
}

/** **/
   
 

</style>
@endpush

@extends('layouts.app')
@section('Title') Countries @endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <table id="example" class="table table-striped" style="width:100% margin-top:20px;">
                <thead>
                    <tr>
                        <th>Flag</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countries["response"] as $country)
                        <tr>
                            <td><img src="{{$country["flag"]}}" width="30"></td>
                            <td><a class="countryClass" href="javascript:void(0)" data-id="{{$country["code"]}}">{{$country["name"]}}</a></td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div class="col-lg-9">
            @livewire('countries.show-leagues')
            <!-- Chama livewire com a rota tipo edit -->
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
<script>
    jQuery(document).ready(function () {
        jQuery('#example').DataTable({
            "dom": 'frtp',
            "language": {
                "info": "Mostrar página _PAGE_ de _PAGES_",
                "zeroRecords": "Country does not exist",
                "search": "Search:",
                "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
               
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            },
        });

        jQuery("#example_wrapper").css("margin-top",'40px');

    });
    jQuery("body").on("click",".countryClass",function(){
        Livewire.emit('Country', jQuery(this).attr("data-id"));
    })

</script>
@endpush