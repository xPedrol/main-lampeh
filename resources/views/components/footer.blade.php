<div class="w-100 footer text-light p-3">
    <div class="container">
        <div class="row py-4 w-100">
            <div class="col-12 col-lg-9">
                <div class="row flex-wrap">
                    @foreach ($firstBanners as $b)
                        <div class="col-12 col-lg-6 col-xl-4 footerSection mt-3 mb-5 mb-lg-0">
                            <p class="footerSectionTitle useRobotoCondensed">{{ $b['title'] }}</p>
                            @foreach ($b['itemList'] as $item)
                                @if(isset($item['icon']))
                                    <a title="{{$item['tooltip']}}" href="{{$item['url']}}" target="_blank" class="text-white footerSectionP"><i style="font-size: 30px" @class($item['icon'])></i></a>
                                @else
                                    @if(isset($item['tooltip']))
                                        <p class="footerSectionP" data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           data-bs-title="{{$item['tooltip']}}">
                                    @else
                                        <p class="footerSectionP">
                                            @if (!array_key_exists('url', $item))
                                                {{ $item['title'] }}
                                            @else
                                                @if ($item['isInternal'])
                                                    <a href="{{ route($item['url']) }}">{{ $item['title'] }}</a>
                                                @else
                                                    <a href="{{ $item['url'] }}"
                                                       target="_blank">{{ $item['title'] }}</a>
                                                @endif
                                            @endif
                                        </p>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col align-self-start text-center">
                <a target="_blank" href="{{ $sites[0]['link'] }}"><img
                        src="{{ asset(env('PATH_BASE').'images/logo-lampehCut.webp') }}"
                        alt="Logo Casa Setecentista de Mariana"
                        class="img-fluid"></a>
            </div>

        </div>
        <div class="row mt-4 w-100 align-items-center">
            <div class="col-12 col-lg-5">
                <p class="footerSiteTitle p-3">Acervo Virtual da Casa Setecentista de Mariana</p>
            </div>
            <div class="col footerAnotherSites">
                <div class="d-flex justify-content-center justify-content-lg-end">
                    <a class="p-3 footerAnotherSitesP" href="{{ route('contato') }}">Fale Conosco</a>
                    @foreach ($sites as $site)
                        <a class="p-3 footerAnotherSitesP" target="_blank"
                           href="{{ $site['link'] }}">{{ $site['title'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="justify-content-center justify-content-lg-start mt-5 w-100 copyrightSection">
            <span>Copyright © LAMPEH {{\Carbon\Carbon::now()->year}} — Todos os direitos reservados</span>
        </div>
    </div>
</div>
