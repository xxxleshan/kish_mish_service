@extends('layouts.app')

@section('title', 'Заявки')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Заявки на ремонт</h1>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Мотоцикл</th>
                <th>Проблема</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->bike_model }}</td>
                <td>{{ Str::limit($booking->description, 50) }}</td>
                <td>{{ $booking->created_at->format('d.m.Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $bookings->links() }}
</div>
@endsection