@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <h3 class="mb-3">Редактирование бренда</h3>
        <form action="{{route('admin.brand.update',$brand->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" >Название бренда</label>
                <input value="{{$brand->name}}" name="name" type="text" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name" >Описание бренда</label>
                <textarea name="description" type="text" class="form-control"  aria-describedby="email-addon">{{$brand->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="name" >URL логотипа</label>
                <input value="{{$brand->url}}" name="url" type="text" class="form-control" placeholder="url ссылка на логотип" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name" >URL обложки</label>
                <input value="{{$brand->photo}}" name="photo" type="text" class="form-control" placeholder="url ссылка на логотип" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name" >Целевая аудитория</label>
                <input value="{{$brand->audience}}" name="audience" type="text" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-4">
                <label for="name" >Конкуренты</label>
                <input value="{{$brand->competitors}}" name="competitors" type="text" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <button type="submit" class="btn bg-gradient-dark mb-0" href="javascript:"><i class="fas fa-plus" aria-hidden="true">
                </i>&nbsp;&nbsp; Сохранить изменения</button>
        </form>
    </div>


@endsection
