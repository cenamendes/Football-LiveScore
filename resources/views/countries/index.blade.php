@push('custom-styles')
<style>

    .paginate_button {
        margin:5px!important;
    }
    .current {
        border: 1px solid;
        border-radius: 5px;
        background: orangered;
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
        color:orangered ;
        font-size: x-large;
    }

    .next:hover {
        background-color: orangered;
        color: white;
        border-radius: 5px;
        width: 24px;
        display: inline-block;
        text-align: center;
    }

    .previous:hover {
        background-color: orangered;
        color: white;
        border-radius: 5px;
        width: 24px;
        display: inline-block;
        text-align: center;
    }


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

.container .products-container{
   grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
   gap:2rem;
}

.container .products-container .product{
   text-align: center;
   padding:3rem 2rem;
   background: #fff;
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
   outline: .1rem solid #ccc;
   outline-offset: -1.5rem;
   cursor: pointer;
}

.container .products-container .product:hover{
   outline: .2rem solid orangered;
   outline-offset: 0;
}

.container .products-container .product img{
   height: 10rem;
}

.container .products-container .product:hover img{
   transform: scale(.9);
}

.container .products-container .product h3{
   padding:.5rem 0;
   color:#444;
}

.container .products-container .product:hover h3{
   color:orangered;
}

.container .products-container .product .price{
   font-size: 2rem;
   color:#444;
}

.products-preview{
   position: fixed;
   top:0; left:0;
   min-height: 100vh;
   width: 100%;
   background: rgba(0,0,0,.8);
   display: none;
   align-items: center;
   justify-content: center;
}

.products-preview .preview{
   display: none;
   padding:2rem;
   text-align: center;
   background: #fff;
   position: relative;
   margin:2rem;
   width: 40rem;
}

.products-preview .preview.active{
   display: inline-block;
}

.products-preview .preview img{
   height: 30rem;
}

.products-preview .preview .fa-times{
   position: absolute;
   top:1rem; right:1.5rem;
   cursor: pointer;
   color:#444;
   font-size: 4rem;
}

.products-preview .preview .fa-times:hover{
   transform: rotate(90deg);
}

.products-preview .preview h3{
   color:#444;
   padding:.5rem 0;
   font-size: 2.5rem;
}

.products-preview .preview .stars{
   padding:1rem 0;
   font-size: 1.7rem;
}

.products-preview .preview .stars i{
   color:#27ae60;
}

.products-preview .preview .stars span{
   color:#999;
}

.products-preview .preview p{
   line-height: 1.5;
   padding:1rem 0;
   font-size: 1.6rem;
   color:#777;
}

.products-preview .preview .price{
   padding:1rem 0;
   font-size: 2.5rem;
   color:#27ae60;
}

.products-preview .preview .buttons{
   display: flex;
   gap:1.5rem;
   flex-wrap: wrap;
   margin-top: 1rem;
}

.products-preview .preview .buttons a{
   flex:1 1 16rem;
   padding:1rem;
   font-size: 1.8rem;
   color:#444;
   border:.1rem solid #444;
}

   
 

</style>
@endpush

@extends('layouts.app')
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
                "zeroRecords": "Não existe esse país",
                "search": "Pesquisar:",
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