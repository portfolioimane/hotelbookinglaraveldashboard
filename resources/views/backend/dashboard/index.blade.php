@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Dashboard</h1>

        <!-- Dashboard Stats -->
        <div class="row">
            <!-- Add statistics cards here -->
        </div>

        <!-- Booking Trends Chart -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Booking Trends</h5>
                        <canvas id="bookingTrendsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('bookingTrendsChart').getContext('2d');
        var bookingTrendsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months), // Dynamic labels
                datasets: [{
                    label: 'Bookings',
                    data: @json($data), // Dynamic data
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
