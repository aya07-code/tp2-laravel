@extends('layouts.app')

@section('content')
<div id='dd'>
    <h1>Modifier la Tâche</h1>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <label style="font-weight: bolder; font-family: Arial, sans-serif;" >Titre :</label>
        <input style="font-family: Arial, Helvetica, sans-serif;" type="text" name="title" id='cree' value="{{ $task->title }}" required>
        <br>
        <label style="font-weight: bolder;">Description :</label>
        <textarea style="font-family: Arial, Helvetica, sans-serif;" name="description" id='cree' required>{{ $task->description }}</textarea>
        <br>
        <label style="font-weight: bolder;" >Statut:</label>
        <select style="padding: 8px;" name="is_completed" id='cree'  >
            <option value="0">Non terminée</option>
            <option value="1">Terminée</option>
        </select><br>
        <button id='creer' type="submit">Modifier</button>
    </form>
</div>

@endsection

