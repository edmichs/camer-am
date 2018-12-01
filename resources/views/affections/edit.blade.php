@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Affection
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($affection, ['route' => ['affections.update', $affection->id], 'method' => 'patch']) !!}

                        @include('affections.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection