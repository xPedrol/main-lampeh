<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Footer extends Component
{
    public $firstBanners = [
        [
            'title' => 'Casa Setecentista de Mariana',
            'itemList' => [
                [
                    'title' => 'CEP: 35400-000',
                    'isInternal' => false
                ],
                [
                    'title' => 'Telefone: (31) 3849-1000',
                    'isInternal' => false
                ]
            ]
        ],
        [
            'title' => 'Escritório Técnico do IPHAN em Mariana',
            'itemList' => [
                [
                    'title' => 'Rua Direita, nº 7, Centro, Mariana - MG',
                    'url' => 'http://portal.iphan.gov.br/pagina/detalhes/1279',
                    'isInternal' => false
                ],
                [
                    'title' => 'CEP: 35420-000',
                    'url' => 'http://portal.iphan.gov.br/pagina/detalhes/1279',
                    'isInternal' => false
                ],
                [
                    'title' => 'Telefone: (31) 3557-1455',
                    'url' => 'http://portal.iphan.gov.br/pagina/detalhes/1279',
                    'isInternal' => false
                ],
                [
                    'title' => 'Email: escritorio.mariana@iphan.gov.br',
                    'url' => 'http://portal.iphan.gov.br/pagina/detalhes/1279',
                    'isInternal' => false
                ]
            ]
        ],
        [
            'title' => 'Edifício da GeoHistória - UFV',
            'itemList' => [
                [
                    'title' => 'Avenida PH Rolfs, s/nº, Viçosa - MG',
                    'isInternal' => false
                ],
                [
                    'title' => 'Campus Universitário, CEP: 36579-900',
                    'isInternal' => false
                ],
                [
                    'title' => 'Tel.: (31) 3612-7425',
                    'isInternal' => false
                ],
                [
                    'title' => 'Email: dhi@ufv.br',
                    'isInternal' => false
                ]
            ]
        ],
        [
            'title' => 'Acesso',
            'itemList' => [
                [
                    'title' => 'Início',
                    'url' => 'home',
                    'isInternal' => true
                ],
                [
                    'title' => 'Quem somos',
                    'url' => 'quem-somos',
                    'isInternal' => true
                ],
            ]
        ],
        [
            'title' => 'Redes Sociais',
            'itemList' => [
                [
                    'title' => 'Instagram',
                    'url' => 'https://www.instagram.com/laboratorio_lampeh?igsh=MWhuNWd2aTNsOHF6bw%3D%3D&utm_source=qr',
                    'isInternal' => true,
                    'tooltip' => 'Instagram',
                    'icon' => 'fa-brands fa-instagram'
                ]
            ]
        ]
    ];
    public $sites = [
        [
            'title' => 'LAMPEH',
            'link' => 'http://www.lampeh.ufv.br/',
        ],
        [
            'title' => 'UFV',
            'link' => 'https://www.ufv.br/',
        ],
        [
            'title' => 'IPHAN',
            'link' => 'http://portal.iphan.gov.br/',
        ],
        [
            'title' => 'FAPEMIG',
            'link' => 'https://fapemig.br/pt/',
        ],
        [
            'title' => 'CNPq',
            'link' => 'https://cnpq.br/',
        ]
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer', ['sites' => $this->sites, 'firstBanners' => $this->firstBanners]);
    }
}
