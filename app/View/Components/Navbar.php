<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{
    private $nav = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'O Laboratório',
                'label' => 'laboratorio',
                'children' => [
                    [
                        'title' => 'Quem somos',
                        'label' => 'quem-somos'
                    ],
                    [
                        'title' => 'Histórico',
                        'label' => 'historico'
                    ],
                    [
                        'title' => 'Equipe',
                        'label' => 'equipe'
                    ],
                ]
            ],
            [
                'title' => 'Projetos',
                'label' => 'projetos',
            ],
            [
                'title' => 'Infraestrutura',
                'label' => 'infraestrutura',
                'children' => [
                    [
                        'title' => 'Instalações',
                        'label' => 'instalacoes'
                    ],
                    [
                        'title' => 'Equipamentos',
                        'label' => 'equipamentos'
                    ]
                ]
            ],
            [
                'title' => 'Convênios',
                'label' => 'convenios',
            ],
            [
                'title' => 'Publicações',
                'label' => 'publicacoes',
            ],
            [
                'title' => 'Estágio Voluntário',
                'label' => 'estagio-voluntario',
            ],
            [
                'title' => 'Contato',
                'label' => 'contato'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', ['nav' => $this->nav]);
    }
}
