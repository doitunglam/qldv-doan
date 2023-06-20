<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý Đoàn viên</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <x-includes.css></x-includes.css>
    <x-includes.js></x-includes.js>

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <!-- Header -->
        <x-commons.header></x-commons.header>
        <x-commons.sidebar></x-commons.sidebar>
        <div class="content-wrapper">
            @yield('content')
        </div>

        {{-- <!-- Sidebar -->
		<?php $this->load->view('partials/sidebar'); ?>
		<!-- Content -->
		<div class="content-wrapper">
			<?php if (isset($mainContent)) {
       $this->load->view($mainContent);
   } else {
       echo 'Chưa thiết lập views cho chức năng này.';
   } ?> --}}
</body>

</html>
