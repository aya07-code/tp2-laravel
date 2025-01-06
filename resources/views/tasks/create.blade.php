@extends('layouts.app')

@section('content')
<div id='dd'>
<h1>Créer une nouvelle tâche</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label >Titre:</label>
        <input type="text" name="title" id='cree' required>
        
        <label >Description:</label>
        <textarea name="description" id='cree'  required></textarea>
        
        <label >Statut:</label>
        <select style="padding: 8px;" name="is_completed" id='cree'  >
            <option value="0">Non terminée</option>
            <option value="1">Terminée</option>
        </select>
        <br><br>
        <button id='creer'  type="submit">Créer</button>
    </form>
</div>
    
@endsection

