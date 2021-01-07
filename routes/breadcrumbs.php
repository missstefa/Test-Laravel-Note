<?php

// Home
use App\Models\Note;

Breadcrumbs::for('welcome', function ($trail) {
    $trail->push('Welcome', route('welcome'));
});

// Home > Notes
Breadcrumbs::for('notes.index', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Notes', route('notes.index'));
});

// Home > Notes > {note}
Breadcrumbs::for('notes.show', function ($trail, Note $note) {
    $trail->parent('notes.index');
    $trail->push($note->title, route('notes.show', $note));
});

// Home > Notes > {note} > edit
Breadcrumbs::for('notes.edit', function ($trail, Note $note) {
    $trail->parent('notes.show', $note);
    $trail->push('Edit', route('notes.edit', $note));
});

// Home > Notes > {note}
Breadcrumbs::for('notes.update', function ($trail, Note $note) {
    $trail->parent('notes.index');
    $trail->push($note->title, route('notes.show', $note));

});

// Home > Profile
Breadcrumbs::for('profile.edit', function ($trail) {
    $trail->parent('welcome');
    $trail->push('Profile', route('profile.edit'));
});