@extends('layouts.app')

@section('template_title')
    Create Unidadesmedida
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Unidadesmedida</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('unidadesmedidas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('unidadesmedida.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
