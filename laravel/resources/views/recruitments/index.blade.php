@extends('recruitments.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('recruitments.create') }}"> Criar Novo Recrutamento</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th>Contato</th>
            <th>Endereço de Email</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($recruitments as $recruitment)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $recruitment->name }}</td>
            <td>{{ $recruitment->contact }}</td>
            <td>{{ $recruitment->email_address }}</td>
            <td>
                <form action="{{ route('recruitments.destroy',$recruitment->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('recruitments.show',$recruitment->id) }}">Visualizar</a>

                    <a class="btn btn-primary" href="{{ route('recruitments.edit',$recruitment->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $recruitments->links() !!}

@endsection
