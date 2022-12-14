@extends('events.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crie seu Evento Viva aqui.</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('events.create') }}"> Criar novo evento</a>
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
        <th width="100px">Número</th>
        <th width="100px">Nome</th>
        <th width="100px">Detalhe</th>
        <th width="100px">Status</th>
        <th width="100px">Local</th>
        <th width="100px">Data</th>


        <th width="380px">Action</th>
    </tr>
    @foreach ($events as $event)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $event->name }}</td>
        <td>{{ $event->detail }}</td>
        <td>{{ $event->status }}</td>
        <td>{{ $event->local }}</td>
        <td>{{ $event->date }}</td>
        <td>
            <form action="{{ route('events.destroy',$event->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Mostrar</a>

                <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Editar</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Encerrar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $events->links() !!}

@endsection
