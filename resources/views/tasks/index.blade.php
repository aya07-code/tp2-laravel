@extends('layouts.app')

@section('content')
    <h1>Liste des Tâches</h1>
    <form method="GET" action="{{ route('tasks.index') }}" style="display:inline;">
        <input type="hidden" name="filter" value="completed">
        <button type="submit" class="filter-button">Tâches terminées</button>
    </form>
    <form method="GET" action="{{ route('tasks.index') }}" style="display:inline;">
        <input type="hidden" name="filter" value="pending">
        <button type="submit" style="background: rgb(241, 156, 0);" class="filter-button">Tâches non terminées</button>
    </form>
    <form method="GET" action="{{ route('tasks.create') }}" style="display:inline;">
        <button type="submit" style="background:  #007bff;" class="create-button">Ajouter une nouvelle tâche</button>
    </form>

    <form method="GET" action="{{ route('tasks.index') }}">
        <div>
        <input id="r1" type="text" name="search" placeholder="Rechercher une tâche" value="{{ request('search') }}">
        <button id="r2" type="submit">Rechercher</button>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>Tâche</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td id="tach"><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
                    <td>
                        @if ($task->is_completed)
                            <span style="color:#218838;;">Terminée</span>
                        @else
                            <span style="color:rgb(205, 18, 18);">Non terminée</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}">Modifier&nbsp;</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="supp-button">Supprimer</button>
                        </form>
                        <a href="{{ route('tasks.show', $task->id) }}">&nbsp;Détail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection