@extends('Layouts.print-template')
@section('css')
 {{--   <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
--}}
@endsection

@section('content')



    <div class="content" style="margin: 2cm;">
        <h1 class="title">Title</h1>
        <ol type="1">
            <li>Coffee</li>
            <li>Tea</li>
            <li>Milk</li>
        </ol>
        <ol type="A">
            <li>Coffee</li>
            <li>Tea</li>
            <li>Milk</li>
        </ol>
        <ol type="a">
            <li>Coffee</li>
            <li>Tea</li>
            <li>Milk</li>
        </ol>
        <ol type="I">
            <li>Coffee</li>
            <li>Tea</li>
            <li>Milk</li>
        </ol>
        <ol type="i">
            <li>Coffee</li>
            <li>Tea</li>
            <li>Milk</li>
        </ol>
    </div>
@endsection
