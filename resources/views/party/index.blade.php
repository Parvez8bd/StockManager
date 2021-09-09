@extends('layout.master', ['page' => 'Party'])

@section('title', $meta['title'])

@section('main')
    <div class="container">
        
        <div class="d-flex justify-content-between">
            <a class="btn btn-primary" href="{{ route('party.create') }}">Create a new party</a>
            <form action="{{ route('party.index') }}" method="GET" class="d-inline">
                <select name="party_type" style="width: 200px; padding:5px;" >
                    <option selected disabled>Select party type</option>
                    <option value="1">Customer</option>
                    <option value="2">Supplier</option>
                </select>
                {{-- <input type="text" name="party_type" placeholder="Enter '1' for customer oR '2' for suplaier" style="width: 300px;"> --}}
                <input class="btn btn-success" type="submit" name="search" value="Submit">
                @isset(request()->search)
                        <a class="btn btn-primary" href="{{ route('party.index') }}">Show all</a>  
                @endisset
            </form>
        </div>
        <br>

        @if ( count($records) > 0)

        @php
        $receivable = 0;
        $payable = 0;
        @endphp

            <table class="table">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Type</th>
                        <th class="text-end">Amount (BDT)</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $key => $record)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->owner_name}}</td>
                        <td>{{ $record->phone}}</td>
                        <td>{{ ($record->balance_type == 1) ? '   Customer': '   Suplaier' }}</td>
                        <td class="text-end {{ ($record->balance_type == 1) ? '   text-success': 'text-danger' }}">
                            {{ ($record->balance_type == 1) ? (0+$record->balance) : (0-$record->balance) }}
                        </td>
                        <td class="text-end">

                            <a href="{{ route('party.show', $record-> id) }}">Details</a>

                            <a href="{{ route('party.edit', $record-> id) }}">Edit</a>

                            <a href="{{ route('party.show', $record->id) }}" onclick="if(confirm('Are you sure to delete this record?')) {event.preventDefault();document.getElementById('delete-{{ $record->id }}').submit();} else {event.preventDefault();}">Delete</a>
                            <form action="{{ route('party.destroy', $record->id) }}" method="POST" id="delete-{{ $record->id }}">
                                @csrf
                                @method('DELETE')
                            </form>

                        </td>
                    </tr> 
                    @php
                    $receivable += ($record->balance_type == 1) ? $record->balance : 0;
                    $payable += ($record->balance_type == 0) ? $record->balance : 0;
                    
                    @endphp 
                    @endforeach
                    <form action="{{ route('party.index') }}" method="GET" class="d-inline">
                        <select name="party_type" style="width: 200px; padding:5px;" >
                            <option selected disabled>Select Showing results</option>
                            <option value="1">05</option>
                            <option value="2">10</option>
                            <option value="3">10</option>
                            <option value="4">10</option>
                        </select>
                        <input class="btn btn-success" type="submit" name="show" value="Show">
                        
                    </form>
                    {{ $party->links()}}
                    

                    @php
                    $total = $receivable - $payable
                    @endphp
                    <tr>
                        <td colspan="4" class="text-end">Total</td>
                        <td class="text-end {{ ($total  < 0 ) ? 'text-danger': 'text-success' }}">
                            {{-- {{ $record->sum('balance') }}  --}}
                            {{ $total  }}
                            {{ ($total  < 0 ) ? '   (Payable)': '   (Receivable)' }}
                        </td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            @else
            <h4>Records not found!</h4>
        @endif
    </div>

@endsection