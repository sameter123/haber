@if(isset(Auth::user()->id))
    Merhaba {{Auth::user()->name}}, panele hoşgeldin
@else
    İzniniz yok
    @endif
