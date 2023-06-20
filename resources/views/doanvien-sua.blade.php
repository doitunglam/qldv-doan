@extends('components.layouts.main')

@section('content')
<x-doanvien.sua :listcd="$listcd" :listcv="$listcv" :doanvien="$doanvien"></x-doanvien.sua>

@endsection
