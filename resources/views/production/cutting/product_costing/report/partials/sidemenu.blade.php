<?php 
    if ($bagian == 'gelar') {
        $kotak_gelar = 'cards bg-card-active h-95 p-3';
        $tulisan_gelar = 'rc-desc-active';
        $icon_gelar = 'rc-icons-active';
        $angka_gelar = 'rc-count text-white';
    }else {
        $kotak_gelar = 'cards bg-card h-95 p-3';
        $tulisan_gelar = 'rc-desc';
        $icon_gelar = 'rc-icons';
        $angka_gelar = 'rc-count';
    }
    if ($bagian == 'cutting') {
        $kotak_cutting = 'cards bg-card-active h-95 p-3';
        $tulisan_cutting = 'rc-desc-active';
        $icon_cutting = 'rc-icons-active';
        $angka_cutting = 'rc-count text-white';
    }else {
        $kotak_cutting = 'cards bg-card h-95 p-3';
        $tulisan_cutting = 'rc-desc';
        $icon_cutting = 'rc-icons';
        $angka_cutting = 'rc-count';
    }

    if ($bagian == 'numbering') {
        $kotak_numbering = 'cards bg-card-active h-95 p-3';
        $tulisan_numbering = 'rc-desc-active';
        $icon_numbering = 'rc-icons-active';
        $angka_numbering = 'rc-count text-white';
    }else {
        $kotak_numbering = 'cards bg-card h-95 p-3';
        $tulisan_numbering = 'rc-desc';
        $icon_numbering = 'rc-icons';
        $angka_numbering = 'rc-count';
    }

    if ($bagian == 'pressing') {
        $kotak_pressing = 'cards bg-card-active h-95 p-3';
        $tulisan_pressing = 'rc-desc-active';
        $icon_pressing = 'rc-icons-active';
        $angka_pressing = 'rc-count text-white';
    }else {
        $kotak_pressing = 'cards bg-card h-95 p-3';
        $tulisan_pressing = 'rc-desc';
        $icon_pressing = 'rc-icons';
        $angka_pressing = 'rc-count';
    }

    if ($bagian == 'bundling') {
        $kotak_bundling = 'cards bg-card-active h-95 p-3';
        $tulisan_bundling = 'rc-desc-active';
        $icon_bundling = 'rc-icons-active';
        $angka_bundling = 'rc-count text-white';
    }else {
        $kotak_bundling = 'cards bg-card h-95 p-3';
        $tulisan_bundling = 'rc-desc';
        $icon_bundling = 'rc-icons';
        $angka_bundling = 'rc-count';
    }

    if ($bagian == 'analisis') {
        $kotak_analisis = 'cards bg-card-active h-95 p-3';
        $tulisan_analisis = 'rc-desc-active';
        $icon_analisis = 'rc-icons-active';
        $angka_analisis = 'rc-count text-white';
    }else {
        $kotak_analisis = 'cards bg-card h-95 p-3';
        $tulisan_analisis = 'rc-desc';
        $icon_analisis = 'rc-icons';
        $angka_analisis = 'rc-count';
    }
?>
<div class="row">
    <a href="{{ route('report.gelar')}}" class="rc-col-2">
        <div class="{{$kotak_gelar}}">
            <div class="row">
                <div class="col-12 justify-sb">
                    <i class="{{$icon_gelar}} fas fa-scroll"></i>
                    <span class="{{$angka_gelar}}">{{$menubar['gelar']}}</span>
                </div>
                <div class="col-12">
                    <div class="{{$tulisan_gelar}}">Proses Gelar</div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('report.cutting')}}" class="rc-col-2">
        <div class="{{$kotak_cutting}}">
            <div class="row">
                <div class="col-12 justify-sb">
                    <i class="{{$icon_cutting}} fas fa-cut"></i>
                    <span class="{{$angka_cutting}}">{{$menubar['cutting']}}</span>
                </div>
                <div class="col-12">
                    <div class="{{$tulisan_cutting}}">Proses Cutting</div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('report.numbering')}}" class="rc-col-2">
        <div class="{{$kotak_numbering}}">
            <div class="row">
                <div class="col-12 justify-sb">
                    <i class="{{$icon_numbering}} fas fa-sort-numeric-down"></i>
                    <span class="{{$angka_numbering}}">{{$menubar['numbering']}}</span>
                </div>
                <div class="col-12">
                    <div class="{{$tulisan_numbering}}">Proses Numbering</div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{route('report.pressing')}}" class="rc-col-2">
        <div class="{{$kotak_pressing}}">
            <div class="row">
                <div class="col-12 justify-sb">
                    <i class="{{$icon_pressing}} fas fa-sync-alt"></i>
                    <span class="{{$angka_pressing}}">{{$menubar['pressing']}}</span>
                </div>
                <div class="col-12">
                    <div class="{{$tulisan_pressing}}">Proses Pressing</div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('report.bundling')}}" class="rc-col-2">
        <div class="{{$kotak_bundling}}">
            <div class="row">
                <div class="col-12 justify-sb">
                    <i class="{{$icon_bundling}} fas fa-server"></i>
                    <span class="{{$angka_bundling}}">{{$menubar['bundling']}}</span>
                </div>
                <div class="col-12">
                    <div class="{{$tulisan_bundling}}">Proses Bundling</div>
                </div>
            </div>
        </div>
    </a>
    <a href="{{ route('report.analytics')}}" class="rc-col-2">
        <div class="{{$kotak_analisis}}">
            <div class="row">
                <div class="col-12 justify-sb">
                    <i class="{{$icon_analisis}} fas fa-chart-line"></i>
                </div>
                <div class="col-12">
                    <div class="{{$tulisan_analisis}}">Data Analytics</div>
                </div>
            </div>
        </div>
    </a>
</div>