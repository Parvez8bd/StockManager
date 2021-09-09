@extends('layout.master', ['page' => 'Party'])

@section('title', $meta['title'])

@section('main')
    <div class="container">

        <div class="text-center p-3 fs-6">
            <div class="float-end">
                <a class="p-2" href="{{ route('party.index') }}">Back</a>
                <span>||</span>
                <a class="p-2" href="#" onclick="window.print()">Print</a>
            </div>
            <br>
            
            <div class="p-2">
                <strong>ID :</strong>
                <strong>{{ $recordshow->id }}</strong>
            </div>
            <div>
            <img src="{{ ($recordshow->image != null) ? asset('storage/' . $recordshow->image) : asset('storage/images/default.jpg') }}" alt="Picture not found!" style="max-width: 100%;width:180px;">
            </div>
            <div class="d-flex justify-content-center">
                <table>
                    <tr>
                        <th class="text-start">Name</th>
                        <td class="text-start fs-5"><b>:</b> {{ $recordshow->owner_name }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Company Name</th>
                        <td class="text-start"><b>:</b> {{ $recordshow->company_name }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Phone Number</th>
                        <td class="text-start fs-5"><b>:</b> {{ $recordshow->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Email Address</th>
                        <td class="text-start"><b>:</b> {{ $recordshow->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Party type</th>
                        <td class="text-start"><b>:</b> {{ ($recordshow->party_type == 1) ? 'customer' : 'supplier'}}</td>
                    </tr>
                    <tr>
                        <th class="text-start" >Balance</th>
                        <td class="text-start {{ ($recordshow->balance_type == 1) ? 'text-success' : 'text-danger' }} fs-5">
                            <b>:</b> {{ $recordshow->balance }} {{ ($recordshow->balance_type == 1) ? '   (Receivable)': '   (Payable)' }} 
                        </td>
                    </tr>
                    <tr>
                        <th class="text-start" >Address</th>
                        <td class="text-start"><b>:</b> {{ $recordshow->address }}</td>
                    </tr>
                    <tr>
                        <td> /</td>
                        <td> /</td>
                    </tr>
                    <tr>
                        <td> /</td>
                        <td> /</td>
                    </tr>
                    <tr>
                        <th class="text-start">Description</th>
                        <td class="text-start"><b>:</b> {{ $recordshow->description }}</td>
                    </tr>
                </table>
        </div >
    </div>
@endsection