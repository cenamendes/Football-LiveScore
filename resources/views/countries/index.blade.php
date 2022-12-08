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
                            <td><a href="countries/{{$country["code"]}}">{{$country["name"]}}</a></td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <div class="col-lg-9">
            <!-- Chama livewire -->
            Hello
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
</script>
@endpush