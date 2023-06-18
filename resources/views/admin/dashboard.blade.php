@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <h4 class="mb-3">Краткая статистика</h4>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Общий доход</p>
                                    <h6 class="font-weight-bolder mb-0">
                                        {{$totalIncome}} BYN
                                    </h6>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">География</p>
                                    <h6 class="font-weight-bolder mb-0">
                                        7 регионов
                                    </h6>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Брендов</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{$countBrands}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Поставок</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{$countSupplies}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid py-4">


        <div class="mb-4">
            <a href="{{route('admin.brand.create')}}" type="submit" class="btn bg-gradient-dark mb-0" href="javascript:"><i class="fas fa-plus" aria-hidden="true">
                </i>&nbsp;&nbsp;Добавить бренд</a>
        </div>

        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Список брендов</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th >№</th>
                            <th >Бренд</th>
                            <th >Поставок</th>
                            <th >Целевая аудитория</th>
                            <th >действие</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>
                                    <div class="d-flex px-2">
                                        <p class="text-sm font-weight-bold mb-0">{{$brand->id}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2">
                                        <div>
                                            <img src="{{$brand->url}}" class="avatar avatar-sm rounded-circle me-2" alt="лого">
                                        </div>
                                        <div class="my-auto">
                                            <h6 class="mb-0 text-sm">{{$brand->name}}</h6>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    {{count($brand->supplies)}}
                                </td>
                                <td >
                                   {{$brand->audience}}
                                </td>
                                <td class="align-middle">
                                    <a href="{{route('admin.brand.show', $brand->id)}}" class="btn btn-link text-secondary mb-0">
                                      перейти
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
