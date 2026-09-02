@extends('layouts.app')

@section('title', 'Ремонт и обслуживание мотоциклов')

@section('content')
{{-- 1. Первый экран (Hero) --}}
<section class="bg-dark text-white py-5">
    <div class="container text-center">
        <h1 class="display-4">Ремонт и обслуживание мотоциклов</h1>
        <p class="lead">Профессиональная диагностика, ТО и ремонт любой сложности</p>
        <a href="#booking" class="btn btn-primary btn-lg">Записаться</a>
    </div>
</section>

{{-- 2. Услуги --}}
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Услуги</h2>
        <div class="row g-4">
            @foreach(['ТО', 'Диагностика', 'Тормоза', 'Электрика', 'Карбюраторы', 'Цепь и звёзды'] as $service)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $service }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 3. Почему выбирают нас --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Почему выбирают мастерскую</h2>
        <ul class="list-unstyled text-center">
            <li>Понятная смета</li>
            <li>Фото работ до/после</li>
            <li>Согласование до начала ремонта</li>
        </ul>
    </div>
</section>

{{-- 4. Как проходит ремонт --}}
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Как проходит ремонт</h2>
        <ol class="list-group list-group-numbered">
            <li class="list-group-item">Заявка</li>
            <li class="list-group-item">Диагностика</li>
            <li class="list-group-item">Согласование</li>
            <li class="list-group-item">Работа</li>
            <li class="list-group-item">Выдача</li>
        </ol>
    </div>
</section>

{{-- 5. Примеры работ --}}
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Примеры работ</h2>
        <div class="row g-4">
            {{-- Здесь будут карточки с фото --}}
            <div class="col-md-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300?text=Work+1" class="card-img-top" alt="Работа 1">
                    <div class="card-body">
                        <p class="card-text">Замена цепи и звёзд, регулировка</p>
                    </div>
                </div>
            </div>
            {{-- Добавьте ещё карточки --}}
        </div>
    </div>
</section>

{{-- 6. Контакты и форма записи --}}
<section id="booking" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Записаться на ремонт</h2>
        <form action="{{ route('booking.store') }}" method="POST" class="mx-auto" style="max-width: 500px;">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bike_model" class="form-label">Модель мотоцикла</label>
                <input type="text" class="form-control @error('bike_model') is-invalid @enderror" id="bike_model" name="bike_model" value="{{ old('bike_model') }}" required>
                @error('bike_model')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание проблемы</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Отправить заявку</button>
        </form>
    </div>
</section>

<footer class="bg-dark text-white text-center py-3">
    <small>&copy; 2026 Мотомастерская</small>
</footer>
@endsection