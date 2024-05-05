@extends('layouts.app')

@section('content')
    <h1>Danh sách Căn hộ</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mã căn hộ</th>
                <th scope="col">Mã tòa nhà</th>
                <th scope="col">Mã cư dân</th>
                <th scope="col">Số phòng</th>
                <th scope="col">Diện tích</th>
                <th scope="col">Tình trạng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
                <tr>
                    <td>{{ $apartment->MaCanHo }}</td>
                    <td>{{ $apartment->MaToaNha }}</td>
                    <td>{{ $apartment->MaCuDan }}</td>
                    <td>{{ $apartment->SoPhong }}</td>
                    <td>{{ $apartment->DienTich }}</td>
                    <td>{{ $apartment->TinhTrang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
