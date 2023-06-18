@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Список поставок</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th >№</th>
                            <th >Бренд</th>
                            <th >Покупатель</th>
                            <th >Регион поставки</th>
                            <th >Колличество</th>
                            <th >Цена</th>
                            <th >Дата</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($supplies as $supply)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <p class="text-sm font-weight-bold mb-0">{{$supply->id}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                            <img src="{{$supply->brand->url}}" class="avatar avatar-sm rounded-circle me-2" alt="лого">
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$supply->brand->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td >
                                    {{$supply->client}}
                                </td>
                                <td >
                                    {{$supply->location}}
                                </td>
                                <td >
                                    {{$supply->count}} лит.
                                </td>
                                <td >
                                    {{$supply->price}} руб.
                                </td>
                                <td >
                                    {{$supply->month}} / {{$supply->year}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{$supplies->withQueryString()->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
