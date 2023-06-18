@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <h3 class="mb-3">Учет поставки напитка под брендом ({{$brand->name}})</h3>
        <form action="{{route('admin.supply.store')}}" method="post">
            @csrf
            <input style="display:none" name="brand_id" value="{{$brand->id}}">
            <div class="mb-3">
                <label for="name">Укажите клиента</label>
                <input name="client" type="text" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name">Укажите регион поставки</label>
                <select name="location" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="Минск">Минск</option>
                    <option value="Минская область">Минская область</option>
                    <option value="Могилевская область">Могилевская область</option>
                    <option value="Брестская область">Брестская область</option>
                    <option value="Гомельская область">Гомельская область</option>
                    <option value="Витебская область">Витебская область</option>
                    <option value="Гродненская область">Гродненская область</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="name" >Колличество поставленных литров напитка</label>
                <input name="count" type="number" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-3">
                <label for="name" >Укажите общую цену</label>
                <input name="price" type="number" class="form-control" aria-label="Name" aria-describedby="email-addon">
            </div>
            <div class="mb-4">
                <label for="name">Укажите месяц и год поставки</label>
                <div style="display:flex">
                    <select style="margin-right: 5px" name="month" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="1">Январь</option>
                        <option value="2">Февраль</option>
                        <option value="3">Март</option>
                        <option value="4">Апрель</option>
                        <option value="5">Май</option>
                        <option value="6">Июнь</option>
                        <option value="7">Июль</option>
                        <option value="8">Август</option>
                        <option value="9">Сентябрь</option>
                        <option value="10">Октябрь</option>
                        <option value="11">Ноябрь</option>
                        <option value="12">Декабрь</option>
                    </select>
                    <select name="year" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn bg-gradient-dark mb-0" href="javascript:"><i class="fas fa-plus" aria-hidden="true">
                </i>&nbsp;&nbsp;Добавить поставку</button>
        </form>
    </div>


@endsection
