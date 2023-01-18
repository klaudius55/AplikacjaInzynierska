<?php

return[

    'yes'=> 'Tak',
    'no'=> 'Nie',

'attributes'=>[
    'created_at'=>'Utworzono',
    'updated_at'=>'Zmodyfikowano',
    'deleted_at'=>'Usunięto',
    'name'=>'Nazwa',
    'surname'=>'Nazwisko',
    'thickness'=>'Grubość',
    'project'=>'Projekt',
    'worker'=>'Pracownik',
    'date'=>'Data',
    'quantityHours'=>'Ilość godzin',
    'save'=>'Zapisz',
    'back'=>'Powrót',
    'delete' => 'Usuń',

],
    'messages_workers' => [
        'successes' => [
            'stored'=> 'Dodano pracownika :name',
            'updated'=> 'Zaaktualizowano pracownika :name',
            'stored_title'=> 'Dodano pracownika ',
            'updated_title'=> 'Zaaktualizowano pracownika',
            'destroy'=> 'Usunięto pracownika :name',
            'destroy_title'=> 'Usunięto pracownika',
            'restore_title'=> 'Przywrócono pracownika',
            'restore'=> 'Przywrócno pracownika :name'
            ],
        'soft_delete' => [
            'Czy aby na pewno chcesz usunąć pracownika :name',
            ],
        'restore' => [
            'title'=>'Przywrócić pracownika',
            'description' => 'Czy aby na pewno chcesz przywrócić pracownika :name'
        ]
    ],
    'messages_projects' => [
        'successes' => [
            'stored'=> 'Dodano projekt :name',
            'updated'=> 'Zaaktualizowano projekt :name',
            'stored_title'=> 'Dodano projekt ',
            'updated_title'=> 'Zaaktualizowano projekt',
            'destroy'=> 'Usunięto projekt :name',
            'destroy_title'=> 'Usunięto projekt',
            'restore_title'=> 'Przywrócono projekt',
            'restore'=> 'Przywrócno projekt :name'
            ],
        'soft_delete' => [
            'Czy aby na pewno chcesz usunąć projekt :name',
        ],
        'restore' => [
            'title'=>'Przywrócić projekt',
            'description' => 'Czy aby na pewno chcesz przywrócić projekt :name'
        ]
        ],
    'messages_units' => [
        'successes' => [
            'stored'=> 'Dodano jednostkę :name',
            'updated'=> 'Zaaktualizowano jednostkę :name',
            'stored_title'=> 'Dodano jednostkę ',
            'updated_title'=> 'Zaaktualizowano jednostkę',
            'destroy'=> 'Usunięto jednostkę :name',
            'destroy_title'=> 'Usunięto jednostkę',
            'restore_title'=> 'Przywrócono jednostkę',
            'restore'=> 'Przywrócno jednostkę :name'
        ],
        'soft_delete' => [
            'Czy aby na pewno chcesz usunąć jednostkę :name',
        ],
        'restore' => [
            'title'=>'Przywrócić jednostkę',
            'description' => 'Czy aby na pewno chcesz przywrócić jednostkę :name'
        ]
    ],
    'messages_types' => [
        'successes' => [
            'stored'=> 'Dodano typ :name',
            'updated'=> 'Zaaktualizowano typ  :name',
            'stored_title'=> 'Dodano typ  ',
            'updated_title'=> 'Zaaktualizowano typ ',
            'destroy'=> 'Usunięto typ  :name',
            'destroy_title'=> 'Usunięto typ ',
            'restore_title'=> 'Przywrócono typ ',
            'restore'=> 'Przywrócno typ  :name'
        ],
        'soft_delete' => [
            'Czy aby na pewno chcesz usunąć typ  :name',
        ],
        'restore' => [
            'title'=>'Przywrócić typ ',
            'description' => 'Czy aby na pewno chcesz przywrócić typ  :name'
        ]
    ],
];
