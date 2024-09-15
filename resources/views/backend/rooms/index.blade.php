@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Rooms</h1>
        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary mb-3">Add New Room</a>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Rooms List</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hotel</th>
                            <th>Name</th>
                            <th>Capacity</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->hotel->name }}</td> <!-- Ensure the 'hotel' relationship is defined in the Room model -->
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->capacity }}</td>
                                <td>{{ $room->price }}</td>
                                <td>{{ $room->description }}</td>
                                <td>
                                    @if($room->image_url)
                                        <img src="{{ asset($room->image_url) }}" alt="Room Image" width="100">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
