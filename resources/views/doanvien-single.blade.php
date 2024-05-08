@extends('components.layouts.main')

@section('content')
    <x-content.doanvien-single :doanvien="$doanvien" :listcd="$listcd" :listcv="$listcv"></x-content.doanvien-single>
@endsection
