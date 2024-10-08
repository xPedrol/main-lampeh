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
    {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->nav = [
            [
                'title' => 'O Laboratório',
                'label' => 'laboratorio',
                'show' => true,
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
                'show' => true,
            ],
            [
                'title' => 'Infraestrutura',
                'label' => 'infraestrutura',
                'show' => true,
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
                'show' => true,
            ],
            [
                'title' => 'Publicações',
                'label' => 'publicacoes',
                'show' => true,
            ],
            [
                'title' => 'Estágio Voluntário',
                'label' => 'estagio-voluntario',
                'show' => true,
            ],
            [
                'title' => 'Contato',
                'label' => 'contato',
                'show' => true,
                'children' => [
                    [
                        'title' => 'Endereço e Telefone',
                        'label' => 'contato'
                    ],
                    [
                        'title' => 'Fale conosco',
                        'label' => 'fale-conosco'
                    ]
                ]
            ],
            [
                'title' => 'Administrador',
                'label' => 'adm',
                'show' => auth()->check(),
                'children' => [
                    [
                        'title' => 'Informativos',
                        'label' => 'admin-informativos'
                    ],
                    [
                        'title' => 'Sair',
                        'label' => 'logout'
                    ],
                ]
            ],
            [
                'title' => 'Entrar',
                'label' => 'login',
                'show' => !auth()->check(),
            ],
        ];
        return view('components.navbar', ['nav' => $this->nav]);
    }
}
