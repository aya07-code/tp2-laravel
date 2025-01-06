@extends('layouts.app')

@section('content')
<div id='dd'>
    <h1>Détails de la Tâche</h1>
    <p><strong>Titre :</strong> {{ $task->title }}</p>
    <p><strong>Description :</strong> {{ $task->description }}</p>
    <p>
        <strong>Statut :</strong>
        {{ $task->is_completed ? 'Terminée' : 'Non terminée' }}
    </p>
    <div>
        <form method="GET" action="{{ route('tasks.edit', $task->id) }}" style="display:inline;">
            <button style="width:20%;margin-bottom: 15px;" type="submit" id='creer'>Modifier</button>
        </form>
        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}"style="display:inline;">
            @csrf
            @method('DELETE')
            <button style="width:20%;margin-bottom: 15px;" id='creer' type="submit">Supprimer</button>
        </form>
    </div>
    <a href="{{ route('tasks.index') }}">Retour à la liste</a>
</div>
@endsection
