@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <h3 class="mb-3">Добавление бренда</h3>
        <form action="{{route('admin.brand.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" >Название бренда</label>
                <input name="name" type="text" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name" >Описание бренда</label>
                <textarea name="description" type="text" class="form-control"  aria-describedby="email-addon"></textarea>
            </div>
            <div class="mb-3">
                <label for="name" >URL логотипа</label>
                <input name="url" type="text" class="form-control" placeholder="url ссылка на логотип" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name" >URL обложки</label>
                <input name="photo" type="text" class="form-control" placeholder="url ссылка на логотип" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name" >Целевая аудитория</label>
                <input name="audience" type="text" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-4">
                <label for="name" >Конкуренты</label>
                <input name="competitors" type="text" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <button type="submit" class="btn bg-gradient-dark mb-0" href="javascript:"><i class="fas fa-plus" aria-hidden="true">
                </i>&nbsp;&nbsp;Добавить бренд</button>
        </form>
    </div>


@endsection
