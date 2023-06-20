@extends('components.layouts.main')

@section('content')
    <x-content.doanvien :listcd="$listcd" :listcv="$listcv" :search="$search" :doanvien="$doanvien"></x-content.doanvien>
@endsection
